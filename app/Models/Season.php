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
}
