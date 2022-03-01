<?php

namespace App\Http\Controllers\Auth\Api;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $usuario = User::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password))
            return response()->json('Dados incorretos para login', 401);

        $token = JWT::encode(['email' => $request->email], env('JWT_KEY'),'HS256');

        return response()->json([
            'data' => [
                'token' => $token
            ]
        ]);
    }

    public function logout()
    {
        return 'coming son';
    }
}
