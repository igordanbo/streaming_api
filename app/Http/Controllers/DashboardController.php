<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //$series = Serie::where('status', 'ativo')->count();
        $series = Serie::count();
        $seasons = Season::count();
        $episodes = Episode::count();

        return response()->json([
            'data' => [
                'series' => $series,
                'seasons' => $seasons,
                'episodes' => $episodes
            ],
            'message' => 'Sucesso'
        ], 200);
    }
}
