<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.table', ['users' => User::all()]);
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

        return view('admin.user.create', ['roles' => Role::all()->map($func)]);
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
            'imageUpload' => ['nullable', 'mimes:jpeg,png', 'max:16384']
        ]);

        $user = new User();
        $user->password = Hash::make($request->newPpasswordassword);
        $user->email = $request->email;

        if ($request->has('verifiedEmail')) {
            $user->email_verified_at = Carbon::now();
        }
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();

        $user->save();

        $roles = Role::whereIn('name', $request->roles ?? [])->pluck('id')->toArray();
        $user->roles()->sync($roles);

        if ($request->file('imageUpload')) {
            $request->file('imageUpload')->storeAs(
                'avatars',
                $user->id,
                'public'
            );
        } else {
            Storage::copy('public/default-avatar.png', 'public/avatars/' . $user->id);
        }

        return view('admin.user.table', ['users' => User::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.view', ['user' => $user]);
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
            foreach ($user->roles as $u_role) {
                $role->checked = $role->name == $u_role->name;
            }
        }

        return view('admin.user.edit', ['user' => $user, 'roles' => $roles]);
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
            'roles.*' => 'exists:roles,name|distinct',
            'email' => "required|email|unique:users,email,$id|max:40",
            'password' => 'nullable|min:6|max:60|same:confirmPassword',
            'imageUpload' => ['nullable', 'mimes:jpeg,png', 'max:16384']
        ]);

        $func = function ($r) {
            return (object)['name' => $r->name, 'checked' => false];
        };

        $user = User::find($id);

        $user->email = $request->email;

        if ($request->has('password')) {
            $user->password = Hash::make($request->newPpasswordassword);
        }

        $roles = Role::whereIn('name', $request->roles ?? [])->pluck('id')->toArray();
        $user->roles()->sync($roles);

        if ($request->file('imageUpload')) {
            $request->file('imageUpload')->storeAs(
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

        return view('admin.user.view', ['user' => User::findOrFail($user->id)]);
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
        return redirect('/admin/users');
    }
}
