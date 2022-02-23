<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    public function genres()
    {
        $this->belongsToMany(Genre::class, 'series_genres');
    }

    public function episodes()
    {
        $this->hasMany(Episode::class);
    }

    public function reviews()
    {
        $this->hasMany(Review::class);
    }

    protected $table = 'series';
}
