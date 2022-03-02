<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('tables.user_table', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.user_create');
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
            'email' => 'required|email|unique:users|max:40',
            'password' => 'required|min:6|max:60|same:confirmPassword',
            'imageUrl' => 'nullable|url'
        ]);

        $user = new User();
        $user->password = $request->password;
        $user->email = $request->email;
        $user->profile_pic_url = $request->imageUrl;
        if ($request->has('verifiedEmail')) {
            $user->email_verified_at = Carbon::now();
        }
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->save();

        return view('forms.user_create', ['submitted' => 'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id)->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $user = User::find($id);
        $user->password = $request->password;
        $user->email = $request->email;
        $user->profile_pic_url = $request->imageUrl;
        if ($request->has('verifiedEmail')) {
            $user->email_verified_at = Carbon::now();
        }
        $user->updated_at = Carbon::now();
        $user->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = User::find($id);
        $alumno->delete();
    }
}
