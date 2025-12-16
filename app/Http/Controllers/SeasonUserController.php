<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeasonUserController extends Controller
{
    public function markAsWatched(Request $request, $seasonId)
    {
        $user = $request->user();

        $user->watchedSeasons()->syncWithoutDetaching([
            $seasonId => [
                'watched' => true,
                'progress' => 100,
                'watched_at' => now()
            ]
        ]);

        return response()->json([
            'message' => 'Temporada marcada como assistida.'
        ], 200);
    }

    public function checkWatched(Request $request, $seasonId)
    {
        $user = $request->user();

        $watched = $user->watchedSeasons()
            ->wherePivot('season_id', $seasonId)
            ->wherePivot('watched', true)
            ->exists();

        return response()->json([
            'watched' => $watched
        ], 200);
    }
}

/*
syncWithoutDetaching() 
Cria a ligação se não existir
Atualizar os dados da pivot se já existir
Não remover outras ligações
*/