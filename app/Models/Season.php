<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author',
        'status',
        'rating',
        'serie_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class, 'serie_id');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class, 'season_id');
    }

    public function viewers()
    {
        return $this->belongsToMany([
            User::class,
            'season_user',
            'season_id',
            'user_id',
            'id',
            'id'
        ])->withPivot([
            'watched',
            'progress',
            'watched_at'
        ])->withTimestamps();
    }
}
