<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\User\UserRepository;

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
        $users = $this->user->latest()->search()->paginate();
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
        $this->userRepository->createUser($request->only([
            'name',
            'email'
        ]));
    }

    public function update(Request $request, User $user)
    {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);
            $this->userRepository->updateUser($user,$request->only([
                'name',
                'email'
            ]));

    }

    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);

        $user->delete();
        return \response()->json([
            'code' => 200,
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
