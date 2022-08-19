<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $users = User::latest()->search()->paginate($request->get('per_page', 5));
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        User::create($request->all());
        return redirect()->route('users.index')->with('success','create user success');
    }

    public function show(){}

    public function edit(User $user){
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request,User $user){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success','Users updated successfully');
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('users.index')
            ->with('success','Users deleted successfully');
    }
}
