<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function info($id)
    {
        $anime = Anime::findOrFail($id);
        return view('anime.info', ['anime' => $anime]);
    }

    public function characters($id)
    {
        $anime = Anime::findOrFail($id);
        return view('anime.characters', ['anime' => $anime]);
    }

    public function reviews($id)
    {
        $anime = Anime::findOrFail($id);
        return view('anime.reviews', ['anime' => $anime]);
    }
}
