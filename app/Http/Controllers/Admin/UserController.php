<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Table;

class UserController extends Controller
{
    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index(Request $request)
    {
        $users = User::latest()->search()->paginate($request->get('per_page', 10));
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $userCreate = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $userCreate->roles()->attach($request->roles);


//        $roles = $request->roles;
//
//        foreach ($roles as $roleId){
//            DB::table('roles_user')->insert([
//                'user_id'=> $userCreate->id,
//                'role_id' => $roleId,
//
//            ]);
//        }


        return redirect()->route('users.index')->with('success', 'create user success');
    }

    public function show()
    {
    }

    public function edit(User $user)
    {

        $roles = $this->role->all();
        $listRoleUser = DB::table('roles_user')->where('user_id', $user->id)->pluck('role_id');
        return view('admin.users.edit', compact('user', 'roles', 'listRoleUser'));
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
            $roles = $request->roles;

            foreach ($roles as $roleId) {
                DB::table('roles_user')->insert([
                    'user_id' => $userCreate->id,
                    'role_id' => $roleId,

                ]);
            }
            DB::commit();
            return redirect()->route('users.index')
                ->with('success', 'Users updated successfully');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Users deleted successfully');
    }
}
