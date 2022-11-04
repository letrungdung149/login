<?php

namespace App\Http\Controllers;

use App\Mail\Mail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;

class ForgotPasswordController
{
    public function forgetPass()
    {
        return view('auth.forgetPass');
    }

    public function postForgetPass(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $token = strtoupper(Str::random(10));
        $user->update([
            'api_token' => $token
        ]);
        \Illuminate\Support\Facades\Mail::send('auth.check_email_forget', compact('user'), function ($email) use ($user) {
            $email->subject('change password');
            $email->to($user->email, $user->name);
        });
        return redirect()->route('login')->with('yes', 'pleas check email');
    }

    public function getPass(User $user, $token)
    {
        if ($user->api_token === $token) {
            return view('auth.getPass');
        }
        return abort(404);
    }

    public function postGetPass(User $user,Request $request)
    {
        $password = bcrypt($request->password);
        $user->update([
            'password' => $password,
        ]);
        return redirect()->route('login')->with('yes', 'change password success');
    }
}
