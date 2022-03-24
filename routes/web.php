<?php

use App\Http\Controllers\SigninController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SignoutController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');
Route::view('/admin', 'admin_panel');
Route::view('/anime/1', 'anime_info');
Route::view('/about', 'about');
Route::view('/sign-in', 'sign_in');
Route::view('/sign-up', 'sign_up');
Route::view('/profile', 'profile')->middleware('auth');

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::post('/auth/sign-up', SignupController::class);
Route::post('/auth/sign-in', SigninController::class);
Route::get('/auth/sign-out', SignoutController::class);
