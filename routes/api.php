<?php

use App\Http\Controllers\AnimeRestController;
use App\Http\Controllers\CharacterRestController;
use App\Http\Controllers\ReviewRestController;
use App\Http\Controllers\UserRestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resource('/anime', AnimeRestController::class);
Route::resource('/characters', CharacterRestController::class);
Route::resource('/reviews', ReviewRestController::class);
Route::resource('/users', UserRestController::class);
