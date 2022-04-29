<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'anime_genres');
    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    protected $table = 'anime';
}
