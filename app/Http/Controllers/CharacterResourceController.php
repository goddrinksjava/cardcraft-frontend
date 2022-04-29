<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Character;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CharacterResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.character.table', ['characters' => Character::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.character.create', ['anime' => Anime::all()]);
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

        return view('admin.character.table', ['characters' => Character::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $character = Character::findOrFail($id);
        return view('admin.character.view', ['character' => $character]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $character = Character::find($id);

        $anime = Anime::all()->where('id', '!=', $character->anime->id);

        return view('admin.character.edit', ['character' => $character, 'anime' => $anime]);
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


        return view('admin.character.view', ['character' => Character::findOrFail($character->id)]);
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
        return redirect('/admin/characters');
    }
}
