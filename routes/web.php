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

Route::get('/tournament/{tournament?}', [TournamentsController::class, 'tournament'])->name('tournament');
Route::get('/players', [PlayersController::class, 'index'])->name('players');
Route::get('/player', [PlayersController::class, 'form'])->name('player');
Route::post('/storePlayer', [PlayersController::class, 'store'])->name('storePlayer');
Route::get('/players/delete/{player}', [PlayersController::class, 'destroy'])->name('deletePlayer');
Route::get('/playTournament/{tournament}', [TournamentsController::class, 'playTournament']);
//Route::delete('/tournaments/delete/{tournament}', [TournamentsController::class, 'destroy'])->name('deleteTournament');
