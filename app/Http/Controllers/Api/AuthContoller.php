<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rules;

class AuthContoller extends Controller
{
    //function login
    public function login(Request $request){
        if(auth()->attempt($request->all())){
            return response([
                'user'          =>   auth()->user(),
                'access_token'  =>   auth()->user()->createToken('authToken')->accessToken
            ],Response::HTTP_OK);
        }
        return response([
            'message'    =>     'This is does not exist'
        ],Response::HTTP_UNAUTHORIZED);
    }
    //function register
    public function register(Request $request){
        $request->validate([
            'name'    =>    'required|string|max:255',
            'email'   =>    'required|email|max:255|unique:users',
            'password'=>    ['required','confirmed',Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name'    =>  $request->name,
            'email'   =>  $request->email,
            'password'=>  Hash::make($request->password)
        ]);
    }
}
