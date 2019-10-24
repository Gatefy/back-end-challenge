<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Models\User;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(Request $request)
    {
//        $request->validate([
//            'name' => 'required|string',
//            'email' => 'required|string|email|unique:users',
//            'password' => 'required|string|confirmed'
//        ]);
//        $user = new User([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => bcrypt($request->password)
//        ]);
//        $user->save();
//        return response()->json([
//            'message' => 'Successfully created user!'
//        ], 201);
    }

    /**
     * Login user and create token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials, $request->get('remember_me'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        $user = $request->user();
        $token = $user->createToken();
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_at' => null
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->revokeToken();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
