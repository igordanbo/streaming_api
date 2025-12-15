<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author',
        'status',
        'rating'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function seasons()
    {
        return $this->hasMany(Season::class, 'serie_id');
    }

    //busca todos os epidodeos da series através (through) de Season
    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Season::class);
    }
}
