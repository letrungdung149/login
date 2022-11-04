<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
//    private $role;
//    private $permission;
//
//    public function __construct(Role $role, Permission $permission)
//    {
//        $this->role = $role;
//        $this->permission = $permission;
//    }

    public function index()
    {
//        $permissions = $this->permission->all();
        return view('permissions.index');
    }

//    public function create()
//    {
//        return view('permissions.create');
//    }
//
//    public function store(Request $request)
//    {
//        try {
//            $this->permission->create([
//                'name' => $request->name,
//                'display_name' => $request->display_name,
//            ]);
//            return redirect()->route('permissions.index')
//                ->with('success', 'permissions create successfully');
//        } catch (\Exception $e) {
//            dd($e);
//        }
//    }
//
//    public function edit(Permission $permission){
//        return view('permissions.edit',compact('permission'));
//    }
//
//    public function update(Permission $permission,Request $request){
//        try {
//            $this->permission->where('id',$permission->id)->update([
//                'name' => $request->name,
//                'display_name' => $request->display_name
//            ]);
//            return redirect()->route('permissions.index')
//                ->with('success', 'permissions updated successfully');
//        }catch (\Exception $e){
//            dd($e);
//        }
//    }
//
//    public function destroy(Permission $permission){
//        $permission->delete();
//        return redirect()->route('roles.index')
//            ->with('success', 'permissions deleted successfully');
//    }

}
