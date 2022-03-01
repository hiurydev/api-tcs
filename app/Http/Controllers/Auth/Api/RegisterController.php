<?php

namespace App\Http\Controllers\Auth\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request, User $user)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'name'     => 'required',
            'password' => 'required'
        ]);

        $userData = $request->only('name', 'email', 'password');
        $userData['password'] = Hash::make($userData['password']);

        if (!$user = $user->create($userData))
            abort(500, 'Erro ao criar novo usuário');

        return response()->json([
            'data' => [
                'user' => $user
            ]
        ]);
    }
}
