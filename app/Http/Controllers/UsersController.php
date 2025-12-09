<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {

        return response()->json(User::all(), 200);
    }

    public function store(UserRequest $request)
    {
        return response()->json(User::create($request->all()), 201);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(["Usuário não encontrado para visualização"], 404);
        }

        return response()->json($user, 200);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $user->update($request->all());

        return response()->json([
            'message' => 'Usuário atualizado com sucesso',
            'data' => $user
        ], 200);
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(["Usuário não encontrado para inativação"], 404);
        }

        $user->status = 'inactive';
        $user->save();

        return response()->json([
            'message' => 'Usuário inativado com sucesso',
            'data' => $user
        ], 200);
    }
}