<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
class DashboardController
{
    public function home(){
        return view('admin.home');
    }
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('backend/dashboard');
        }
        return view('admin.login');

    }

    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
        ];
        if (Auth::attempt($login)) {
            return redirect('backend/dashboard');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
