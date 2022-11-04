<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
//    private $role;
//    private $permission;
//    public function __construct(Role $role,Permission $permission)
//    {
//        $this->role = $role;
//        $this->permission = $permission;
//    }

    public function index(){
        return view('roles.index');
    }

//    public function create(){
//        $permissions = $this->permission->all();
//        return view('roles.create',compact('permissions'));
//    }
//
//    public function edit(Role $role){
//        $permissions = $this->permission->all();
//        $role = $this->role->findOrfail($role->id);
//        $permissionOfRole = DB::table('role_permissions')->where('role_id',$role->id)->pluck('permission_id');
//        return view('roles.edit',compact('permissions','role','permissionOfRole'));
//    }
//
//
//    public function update(Role $role,Request $request){
//        try {
//            $this->role->where('id',$role->id)->update([
//                'name' => $request->name,
//                'display_name' => $request->display_name
//            ]);
//            DB::table('role_permissions')->where('role_id',$role->id)->delete();
//            $roleCreate = $this->role->find($role->id);
//            $roleCreate->permissions()->attach($request->permission);
//            return redirect()->route('roles.index')
//                ->with('success', 'Roles updated successfully');
//        }catch (\Exception $e){
//            dd($e);
//        }
//    }
//
//
//
//    public function store(Request $request){
//        try {
//            $roleCreate = $this->role->create([
//                'name' => $request->name,
//                'display_name' => $request->display_name,
//            ]);
//
//            $roleCreate->permissions()->attach($request->permission);
//            return redirect()->route('roles.index')
//                ->with('success', 'Roles create successfully');
//        }catch (\Exception $e){
//            dd($e);
//            DB::rollBack();
//        }
//    }
//
//    public function destroy(Role $role){
//        $role->delete();
//        return redirect()->route('roles.index')
//            ->with('success', 'Roles deleted successfully');
//    }
}
