<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.review.table', ['reviews' => Review::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.create', [
            'anime' => Anime::all('id', 'title'),
            'users' => User::all('id', 'email')
        ]);
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

        return view('admin.review.table', ['reviews' => Review::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::findOrFail($id);
        return view('admin.review.view', ['review' => $review]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);

        $anime = Anime::all()->where('id', '!=', $review->anime->id);
        $users = User::all()->where('id', '!=', $review->user->id);

        return view('admin.review.edit', ['review' => $review, 'anime' => $anime, 'users' => $users]);
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

        return view('admin.review.view', ['review' => $review]);
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
        return redirect('/admin/reviews');
    }
}
