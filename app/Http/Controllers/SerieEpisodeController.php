<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieEpisodeController extends Controller
{
    public function index(int $id)
    {
        if (!$id) return response()->json([
            'message' => 'ID não informado'
        ]);

        $serie = Serie::find($id);

        return response()->json([
            'data' => $serie->episodes,
            'message' => 'Sucesso'
        ], 200);
    }
}
