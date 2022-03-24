<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|unique:users|max:40',
            'password' => 'required|min:6|max:60',
        ]);

        $user = new User();
        $user->password = Hash::make($credentials["password"]);
        $user->email = $credentials["email"];
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();

        $user->save();

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], true)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            '_' => 'Internal error',
        ]);
    }
}
