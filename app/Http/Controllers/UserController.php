<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tables.user_table', ['users' => User::all()]);
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
        $user->password = Hash::make($request->newPpasswordassword);
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
        return view('tables.user_table', ['users' => [User::find($id)]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('forms.user_edit', ['user' => User::find($id)]);
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
            'email' => "required|email|unique:users,email,$id|max:40",
            'password' => 'required|min:6|max:60|same:confirmPassword',
            'imageUrl' => 'nullable|url'
        ]);

        $user = User::find($id);
        $user->password = Hash::make($request->newPpasswordassword);
        $user->email = $request->email;
        $user->profile_pic_url = $request->imageUrl;
        if ($request->has('verifiedEmail')) {
            $user->email_verified_at = Carbon::now();
        }
        $user->updated_at = Carbon::now();
        $user->update();
        return view('forms.user_edit', ['user' => User::find($id), 'submitted' => 'ok']);
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
