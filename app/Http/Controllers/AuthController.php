<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        $token = $user->createToken('api-token', ['post:read', 'post:create']);

        return response()->json(['ok' => true, 'user' => $user, 'token' => $token]);
    }

    function login(Request $request) {

    }

    function logout(Request $request) {

    }
}
