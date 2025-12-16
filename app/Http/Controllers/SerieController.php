<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieRequest;
use App\Models\Serie;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Serie::with('seasons.episodes')->get(),
            'message' => 'Sucesso'
        ], 200);
    }

    public function show($id)
    {
        $serie = Serie::find($id);

        if (!$serie) {
            return response()->json(["message" => "Nenhuma série encontrada"], 404);
        }

        return response()->json([
            'data' => Serie::with('seasons.episodes')->find($id),
            'message' => 'Sucesso'
        ], 200);
    }

    public function store(SerieRequest $request)
    {
        $user = $request->user();

        if (! $user->tokenCan('is_admin')) {
            return response()->json([
                'message' => 'Acesso não autorizado'
            ], 403);
        }

        $serie = Serie::create($request->validated());

        return response()->json([
            'message' => 'Série criada com sucesso',
            'data' => $serie
        ], 201);
    }


    public function update(SerieRequest $request, $id)
    {
        //Resumido
        //Series::where(‘id’, $series)->update($request->all());

        $user = $request->user();

        if (! $user->tokenCan('is_admin')) {
            return response()->json([
                'message' => 'Acesso não autorizado'
            ], 403);
        }

        $serie = Serie::with('seasons.episodes')->find($id);

        if (!$serie) {
            return response()->json(["message" => "Nenhuma série encontrada"], 404);
        }

        $serie->update($request->all());

        return response()->json([
            'message' => 'Série atualizada com sucesso',
            'data' => $serie
        ], 200);

        return 0;
    }
}
