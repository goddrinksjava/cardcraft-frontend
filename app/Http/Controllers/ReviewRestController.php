<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Review::all();
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
            'anime' => 'exists:anime,id',
            'user' => 'exists:users,id',
            'comment' => 'required|min:1|max:8000',
            'score' => 'required|integer|min:1|max:10',
        ]);

        $review = new Review();
        $review->comment = $request->comment;
        $review->score = $request->score;
        $review->anime()->associate($request->anime);
        $review->user()->associate($request->user);
        $review->created_at = Carbon::now();
        $review->updated_at = Carbon::now();
        $review->save();

        return $review;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Review::findOrFail($id);
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
        $review = Review::findOrFail($id);

        $request->validate([
            'anime' => 'exists:anime,id',
            'user' => 'exists:users,id',
            'comment' => 'required|min:1|max:8000',
            'score' => 'required|integer|min:1|max:10',
        ]);

        $review->comment = $request->comment;
        $review->score = $request->score;
        $review->anime()->associate($request->anime);
        $review->user()->associate($request->user);
        $review->updated_at = Carbon::now();
        $review->save();

        return $review;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return "Ok";
    }
}
