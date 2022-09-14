<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DashboardController
{
    public function home(){
        return view('admin.dashboard');
    }
    public function getLogin()
    {
        return view('admin.login');
    }
}
