<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\SessionUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request){
        dd(1);
        $dataCheckLogin = [
            'email'=> $request->email,
            'password'=>$request->password,
        ];
        if (\auth()->attempt($dataCheckLogin)){
            $token = Str::random(60);
            $request->user()->forceFill([
                'api_token' => hash('sha256', $token),
            ])->save();
            return response()->json([
                'code' => 200,
                'message' => 'true',
                'token' => $token,
            ]);
        }else{
            return response()->json([
                'code' => 400,
                'message' => 'fail'
            ]);
        }

    }

    public function user(Request $request){
        $request->user();
    }

    public function logout(){
        {
            Auth::user()->tokens->each(function($token, $key) {
                $token->revoke();
            });
            return response()->json([
                'code' => 200,
                'message' => 'logout'
            ]);
        }
    }
}
