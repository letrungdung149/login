<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role,Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }


    public function index(Request $request)
    {
        $roles = $this->role->all();
        $permissions = $this->permission->all();
        return response()->json([
            'code' => 200,
            'role' => $roles,
            'permission' => $permissions,
            'message' => 'success'
        ]);
    }

    public function store(Request $request){
        try {
            $permissionNumber = $request->permission;
            $permissionArr  = array_map('intval', str_split($permissionNumber));
            $request->validate([
                'name' => 'required',
                'display_name' => 'required',
            ]);
            $roleCreate = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
            $roleCreate->permissions()->attach($permissionArr);
            return response()->json([
                'code' => 200,
                'data' => $roleCreate,
                'message' => 'success'
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }

    public function update(Role $role,Request $request){
        try {
            $permissionNumber = $request->permission;
            $permissionArr  = array_map('intval', str_split($permissionNumber));
            $this->role->where('id',$role->id)->update([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);
            DB::table('role_permissions')->where('role_id',$role->id)->delete();
            $roleCreate = $this->role->find($role->id);
            $roleCreate->permissions()->attach($permissionArr);
            return response()->json([
                'code' => 200,
                'message' => 'update success',
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }

    public function destroy(Role $role){
        $role = Role::findOrFail($role->id);
        $role->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ]);
    }
}
