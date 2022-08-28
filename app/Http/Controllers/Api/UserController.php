<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController
{
    public function index(){
        $users = User::latest()->search()->paginate();
        return response()->json($users, 200);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        return User::create($request->all());
    }

    public function update(Request $request,User $user){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        return $user->update($request->all());
    }

    public function destroy(User $user){
        return $user->delete();
    }
//    public function delete($id){
//        $user = User::findOrFail($id);
//
//        $user->delete();
//        echo"success delete user";
//    }

    function search($name)
    {
        $result = User::where('name', 'LIKE', '%'. $name. '%')->get();
        if(count($result)){
            return Response()->json([
                'code'=>'200',
                'data'=>$result,
                'message'=>'success'
            ]);
        }
        else
        {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
    }

}
