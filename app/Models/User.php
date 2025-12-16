<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function series()
    {
        return $this->hasMany(Serie::class, 'author');
    }

    public function watchedEpisodes()
    {
        return $this->belongesToMany([
            Episode::class,
            'episode_user',     // tabela pivot
            'user_id',          // FK do User na pivot
            'episode_id',       // FK do Episode na pivot
            'id',               // PK do User
            'id'                // PK do Episode
        ])
            ->withPivot([ //colunas da tabela pivot que quero acesso
                'watched',
                'progress',
                'watched_at'
            ])->withTimestamps(); //preenche time automaticamente
    }

    public function watchedSeasons() {
        return $this->belongsToMany([
            Season::class,
            'season_user',
            'user_id',
            'season_id',
            'id',
            'id'
        ])->withPivot([
            'watched',
            'progess',
            'watched_at'
        ])->withTimestamps();
    }
}
