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
        $dataCheckLogin = [
            'email'=> $request->email,
            'password'=>$request->password,
        ];
        if (\auth()->attempt($dataCheckLogin)){
            $accessToken = $request->user()->createToken('accessToken')->accessToken;
            return response()->json([
                'code' => 200,
                'message' => 'true',
                'token' => $accessToken,
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
