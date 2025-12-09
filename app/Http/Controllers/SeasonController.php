<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeasonRequest;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        return response()->json([Season::with('seasons'), 'message' => 'Sucesso'], 200);
    }

    public function show($id)
    {
        $serie = Season::find($id);

        if (!$serie) {
            return response()->json(["message" => "Nenhuma série encontrada"], 404);
        }

        return response()->json([$serie], 200);
    }

    public function store(SeasonRequest $request)
    {
        return response()->json([
            'mesage' => 'Série criada com sucesso',
            'data' => Season::create($request->all())
        ], 201);
    }

    public function update(SeasonRequest $request, $id)
    {
        $serie = Season::find($id);

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
