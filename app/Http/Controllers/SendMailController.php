<?php

namespace App\Http\Controllers;

use App\Mail\Mail;
use App\Models\User;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function sendMail(Request $request){
        $user = User::where('email', $request->email)->first();
        $mailable = new Mail($user);
        \Illuminate\Support\Facades\Mail::to('dungltph19371@fpt.eud.vn')->queue($mailable);
        return redirect()->route('login')->with('success', 'send email success');
    }
}
