<?php

use App\Http\Controllers\GamesController;
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


/* Route::view('/','home.index')-> name('home.index'); */


// No home
Route::redirect('/','/login');

// games

Route::resource('games',GamesController::class)
    ->middleware('auth')
    ->except(['index']);


Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');
