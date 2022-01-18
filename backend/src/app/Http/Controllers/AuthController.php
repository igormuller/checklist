<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(UserRegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        return response(
            [
                'status'  => 'Success',
                'message' => 'User created',
                'data'    => [
                    'token' => $user->createToken('Api Cake')->plainTextToken,
                    'user'  => $user,
                ],
            ]
        );
    }

    public function login(UserLoginRequest $request)
    {

        if (! Auth::attempt($request->all())) {
            return response(
                [
                    'status'  => 'Error',
                    'message' => 'Credentials not match',
                ],
                401
            );
        }

        return response(
            [
                'status'  => 'Success',
                'message' => 'User Logged',
                'data'    => [
                    'token' => \auth()->user()->createToken('Api Cake')->plainTextToken,
                    'user'  => \auth()->user(),
                ],
            ]
        );
    }

    public function logout()
    {
        \auth()->user()->tokens()->delete();

        return ['message' => 'Tokens revoked'];
    }
}
