<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $func = function ($r) {
            return $r->name;
        };

        return view('forms.user_create', ['roles' => Role::all()->map($func)]);
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
            'roles.*' => 'exists:roles,name|distinct',
            'email' => 'required|email|unique:users|max:40',
            'password' => 'required|min:6|max:60|same:confirmPassword',
            'imageUrl' => 'nullable|url'
        ]);

        $user = new User();
        $user->password = Hash::make($request->newPpasswordassword);
        $user->email = $request->email;

        Storage::copy('default-avatar.png', 'public/avatars/' . $user->id);

        if ($request->has('verifiedEmail')) {
            $user->email_verified_at = Carbon::now();
        }
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->roles = $request->roles;

        $user->save();

        // return view('forms.user_create', ['submitted' => 'ok']);
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
        $func = function ($r) {
            return (object)['name' => $r->name, 'checked' => false];
        };

        $user = User::find($id);
        $roles = Role::all()->map($func);

        foreach ($roles as $role) {
            $role->checked = $user->roles->contains($role->name);
        }

        return view('forms.user_edit', ['user' => $user, 'roles' => $roles]);
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
            'password' => 'nullable|min:6|max:60|same:confirmPassword',
            'imageFile' => ['nullable', 'mimes:jpeg,png', 'max:8192']
        ]);

        $func = function ($r) {
            return (object)['name' => $r->name, 'checked' => false];
        };

        $user = User::find($id);

        $user->email = $request->email;

        if ($request->has('password')) {
            $user->password = Hash::make($request->newPpasswordassword);
        }

        if ($request->file('imageFile')) {
            $extension = $request->file('imageFile')->extension();

            $request->file('imageFile')->storeAs(
                'avatars',
                $id,
                'public'
            );
        }

        if ($request->has('verifiedEmail')) {
            $user->email_verified_at = Carbon::now();
        }

        $user->updated_at = Carbon::now();
        $user->update();

        $roles = Role::all()->map($func);
        foreach ($roles as $role) {
            $role->checked = $user->roles->contains($role->name);
        }

        return view('forms.user_edit', ['user' => User::find($id), 'roles' => $roles, 'submitted' => 'ok']);
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
