<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieRequest;
use App\Models\Serie;
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
        return response()->json([
            'mesage' => 'Série criada com sucesso',
            'data' => Serie::create($request->all())
        ], 201);
    }

    public function update(SerieRequest $request, $id)
    {
        //Resumido
        //Series::where(‘id’, $series)->update($request->all());

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
