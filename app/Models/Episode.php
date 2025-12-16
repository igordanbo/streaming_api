<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author',
        'status',
        'rating',
        'season_id'
    ];

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }

    public function viewers () {
        return $this->belongsToMany([
            User::class,
            'episode_user',
            'episode_id',
            'user_id',
            'id',
            'id'
        ])->withPivot([
            'watched',
            'progress',
            'watched_at'
        ]);
    }
}