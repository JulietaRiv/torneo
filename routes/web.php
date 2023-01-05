<?php

use App\Http\Controllers\PlayersController;
use App\Http\Controllers\TournamentsController;
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

Route::get('/', function () {
	return view('welcome');
});

Route::get('/players', [PlayersController::class, 'index']);
Route::get('/player', [PlayersController::class, 'form,']);
Route::post('/player', [PlayersController::class, 'store']);

Route::get('/tournaments', [TournamentsController::class, 'index']);
Route::get('/tournament', [TournamentsController::class, 'form,']);
Route::post('/tournament', [TournamentsController::class, 'store']);
