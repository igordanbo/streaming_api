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
}
