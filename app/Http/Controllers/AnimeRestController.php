<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnimeRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anime = Anime::with('genres')->get();
        return $anime;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'genres.*' => 'exists:genres,name|distinct|min:1',
            'title' => 'required|unique:anime|min:1|max:40',
            'synopsis' => 'required|min:1|max:8000',
            'episodes' => 'required|integer|min:1',
            'imageUpload' => ['mimes:jpg,jpeg,png', 'max:16384'],
            'videoUpload' => ['nullable', 'mimes:mp4', 'max:122880'],
        ]);

        $anime = new Anime();
        $anime->title = $request->title;
        $anime->synopsis = $request->synopsis;
        $anime->episodes = $request->episodes;
        $anime->release_date = $request->release_date;
        $anime->created_at = Carbon::now();
        $anime->updated_at = Carbon::now();
        $anime->save();

        $genres = Genre::whereIn('name', $request->genres ?? [])->pluck('id')->toArray();
        $anime->genres()->sync($genres);

        if ($request->file('videoUpload')) {
            $request->file('videoUpload')->storeAs(
                'trailers',
                $anime->id,
                'public'
            );
        }

        $request->file('imageUpload')->storeAs(
            'posters',
            $anime->id,
            'public'
        );

        $anime = Anime::findOrFail($anime->id);
        return $anime;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anime = Anime::findOrFail($id);
        return $anime;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $anime = Anime::find($id);

        $request->validate([
            'genres.*' => 'exists:genres,name|distinct|min:1',
            'title' => ($anime->title == $request->title ? '' : 'required|unique:anime|min:1|max:40'),
            'synopsis' => 'required|min:1|max:8000',
            'episodes' => 'required|integer|min:1',
            'imageUpload' => ['nullable', 'mimes:jpg,jpeg,png', 'max:16384'],
            'videoUpload' => ['nullable', 'mimes:mp4', 'max:122880'],
        ]);

        $anime->title = $request->title;
        $anime->synopsis = $request->synopsis;
        $anime->episodes = $request->episodes;
        $anime->release_date = $request->release_date;
        $anime->updated_at = Carbon::now();
        $anime->save();

        $genres = Genre::whereIn('name', $request->genres ?? [])->pluck('id')->toArray();
        $anime->genres()->sync($genres);

        if ($request->file('videoUpload')) {
            $request->file('videoUpload')->storeAs(
                'trailers',
                $anime->id,
                'public'
            );
        }

        if ($request->file('imageUpload')) {
            $request->file('imageUpload')->storeAs(
                'posters',
                $anime->id,
                'public'
            );
        }


        $anime = Anime::findOrFail($anime->id);
        return $anime;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anime = Anime::find($id);
        $anime->delete();
        return "Ok";
    }
}
