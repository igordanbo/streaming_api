<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'error' => 'Usuário não encontrado'
            ], 401);
        }

        $passwordCheck = Hash::check($request->password, $user->password);

        if (!$passwordCheck) {
            return response()->json([
                'error' => 'Senha incorreta'
            ], 401);
        }

        $token = $user->createToken('api-token', 'is_admin')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {
        if (!$request->user()) {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }

        $request->user()->currentAccessToken()->delete();

        return ['message' => 'Logout realizado com sucesso'];
    }
}
