<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AnimeResourceController;
use App\Http\Controllers\AnimeRestController;
use App\Http\Controllers\CharacterResourceController;
use App\Http\Controllers\ReviewResourceController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignoutController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserResourceController;
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

Route::view('/', 'index');
Route::view('/about', 'about');
Route::view('/login', 'sign_in')->name('login');
Route::view('/signup', 'sign_up');
Route::view('/profile', 'profile');

Route::view('/admin', 'admin.index')->middleware('auth');
Route::resource('/admin/users', UserResourceController::class)->middleware('auth');
Route::resource('/admin/anime', AnimeResourceController::class)->middleware('auth');
Route::resource('/admin/characters', CharacterResourceController::class)->middleware('auth');
Route::resource('/admin/reviews', ReviewResourceController::class)->middleware('auth');

Route::post('/auth/sign-up', SignupController::class);
Route::post('/auth/sign-in', SigninController::class);
Route::get('/auth/sign-out', SignoutController::class);

Route::get('/anime/{id}/info', [AnimeController::class, 'info']);
Route::get('/anime/{id}/characters', [AnimeController::class, 'characters']);
Route::get('/anime/{id}/reviews', [AnimeController::class, 'reviews']);
