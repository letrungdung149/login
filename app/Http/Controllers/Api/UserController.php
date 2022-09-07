<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController
{
    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role->all();
        $users = User::latest()->search()->paginate();
        return response()->json([
            'code' => 200,
            'role' => $roles,
            'user' => $users,
            'message' => 'success'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $userCreate = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $userCreate->roles()->attach($request->display_name);
        return response()->json([
            'code' => 200,
            'data' => $userCreate,
            'message' => 'success'
        ], 200);
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);

            $this->user->where('id', $user->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            DB::table('roles_user')->where('user_id', $user->id)->delete();
            $userCreate = $this->user->find($user->id);
            $userCreate->roles()->attach($request->display_name);
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'update success',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);

        $user->delete();
        return \response()->json([
            'code'=> 200,
            'message' => 'success'
        ]);
    }


    function search($name)
    {
        $result = User::where('name', 'LIKE', '%' . $name . '%')->get();
        if (count($result)) {
            return Response()->json([
                'code' => '200',
                'data' => $result,
                'message' => 'success'
            ]);
        } else {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
    }

}
