<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle user registration.
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        logger()->info('New user registered: ' . $user->token);
        return response()->json([
            'success' => true,
            'message' => 'User registered successfully.',
            'token'   => $token,
            'user'    => $user,
        ], 201);

    }

    /**
     * Handle user login.
     */
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();

        if(! $user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials.',
            ], 401);
        }

         // delete old tokens ( best practice)
        $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'User logged in successfully.',
            'token'   => $token,
            'user'    => $user,
        ], 200);
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully.',
        ], 200);
    }

    /**
     * Get the authenticated user's profile.
     */
    public function profile(Request $request)
    {
        return response()->json([
            'success' => true,
            'user'    => $request->user(),
        ], 200);
    }
}
