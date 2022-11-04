<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $permission;
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
    public function index(){
        $permissions = $this->permission->all();
        return response()->json([
            'code' => 200,
            'data' => $permissions,
            'message' => 'success'
        ]);
    }

    public function store(Request $request){
        try {
            $request->validate([
                'name' => 'required',
                'display_name' => 'required',
            ]);
            $this->permission->create([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update(Permission $permission,Request $request){
        try {
            $this->permission->where('id',$permission->id)->update([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }

    public function destroy(Permission $permission){
        $permission->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ]);
    }
}
