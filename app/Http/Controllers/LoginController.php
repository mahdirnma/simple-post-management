<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $myData=$request->only('email', 'password');
        if (!Auth::attempt($myData)) {
            return response()->json(['error' => 'invalid credentials'], 401);
        }
        $user = Auth::user();
        $token = $user->createToken('MyApp')->accessToken;
        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }
}
