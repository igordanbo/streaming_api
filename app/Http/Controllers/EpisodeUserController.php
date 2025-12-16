<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EpisodeUserController extends Controller
{
    public function markAsWatched(Request $request, $episodeId)
    {
        $user = $request->user();

        $user->watchedEpisodes()->syncWithoutDetaching([
            $episodeId => [
                'watched' => true,
                'progress' => 100,
                'watched_at' => now()
            ]
        ]);

        return response()->json([
            'message' => 'Episódio marcado como assistido'
        ], 200);
    }

    public function checkWatched(Request $request, $episodeId)
    {
        $user = $request->user();

        $watched = $user->watchedEpisodes()
            ->wherePivot('episode_id', $episodeId)
            ->wherePivot('watched', true)
            ->exists();


        return response()->json([
            'watched' => $watched
        ], 200);
    }
}
