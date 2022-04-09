<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimeInfoController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('admin.user.view', ['user' => User::findOrFail($user->id)]);
    }
}
