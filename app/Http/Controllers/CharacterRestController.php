<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Character;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CharacterRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $root = $request->root();

        $characters = Character::all()->map(function ($character) use (&$root) {
            $character->picture = "$root/storage/characters/$character->id";
            return $character;
        });

        return $characters->toJson(JSON_UNESCAPED_SLASHES);
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
            'name' => 'required|min:1|max:40',
            'description' => 'required|min:1|max:4000',
            'anime' => 'required|exists:anime,id',
            'imageUpload' => ['mimes:jpg,jpeg,png', 'max:16384'],
        ]);

        $character = new Character();
        $character->name = $request->name;
        $character->description = $request->description;
        $character->anime()->associate($request->anime);
        $character->created_at = Carbon::now();
        $character->updated_at = Carbon::now();
        $character->save();

        $request->file('imageUpload')->storeAs(
            'characters',
            $character->id,
            'public'
        );

        $character = Character::findOrFail($character->id);
        return $character;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $root = $request->root();

        $character = Character::findOrFail($id);
        $character->picture = "$root/storage/characters/$character->id";
        return $character->toJson(JSON_UNESCAPED_SLASHES);
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
        $request->validate([
            'name' => 'required|min:1|max:40',
            'description' => 'required|min:1|max:4000',
            'anime' => 'required|exists:anime,id',
            'imageUpload' => ['nullable', 'mimes:jpg,jpeg,png', 'max:16384'],
        ]);

        $character = Character::find($id);
        $character->name = $request->name;
        $character->description = $request->description;
        $character->anime()->associate($request->anime);
        $character->updated_at = Carbon::now();
        $character->save();

        if ($request->file('imageUpload')) {
            $request->file('imageUpload')->storeAs(
                'characters',
                $character->id,
                'public'
            );
        }


        $character = Character::findOrFail($character->id);
        return $character;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $character = Character::find($id);
        $character->delete();
        return "Ok";
    }
}
