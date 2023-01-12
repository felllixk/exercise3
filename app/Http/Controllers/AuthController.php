<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\SuccessResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $request->validated();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return $user->id;
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $token = $request->user()->createToken("AuthToken");
        return [
            'access_token' => $token->plainTextToken
        ];
    }

    public function logout(Request $request)
    {
        return $request->user()->currentAccessToken()->delete();
    }
}
