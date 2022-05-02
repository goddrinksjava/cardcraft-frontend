<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserRestController extends Controller
{
    /**
     * Create a new UserRestController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $root = $request->root();

        $users = User::all()->map(function ($user) use (&$root) {
            $user->avatar =  "$root/storage/avatars/$user->id";
            return $user;
        });

        return $users->toJson(JSON_UNESCAPED_SLASHES);
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

        $user = User::findOrFail($user->id);
        return $user;
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

        $user = User::findOrFail($id);
        $user->avatar =  "$root/storage/avatars/$user->id";
        return $user->toJson(JSON_UNESCAPED_SLASHES);
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

        $roles = Role::all()->map(function ($r) {
            return (object)['name' => $r->name, 'checked' => false];
        });

        foreach ($roles as $role) {
            $role->checked = $user->roles->contains($role->name);
        }

        $user = User::findOrFail($user->id);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return "Ok";
    }
}
