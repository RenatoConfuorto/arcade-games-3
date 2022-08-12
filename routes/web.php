<?php

use App\Game;
use App\GameVersion;
use App\Http\Controllers\Games\GamesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function() use($routes)  {
    $games = Game::all();
    return view('home', compact('games'));
})->name('home');

Auth::routes();

Route::get('versions/{name}', function(Request $request){
    // $id = $request->id;
    $name = $request->name;
    $game = Game::where('name', $name)->first();
    $game_versions = $game->versions;
    // dd($game->versions);
    return view('games.list', compact('game_versions'));
})->name('games.versions');

Route::namespace('Games')
    ->prefix('games')
    ->name('games.')
    ->group( function(){

        //TRIS
        Route::prefix('tris')
            ->name('tris.')
            ->group( function(){
                Route::get('/', 'GamesController@tris')->name('list');
                Route::get('tris_sp', 'GamesController@tris_sp')->name('tris_sp');
                Route::get('tris_mp', 'GamesController@tris_mp')->name('tris_mp');
            });
    });
// Route::middleware('auth')->get('/home', 'HomeController@index')->name('home');
// Route::middleware('is_admin')->get('/admin', function(){
// })->name('admin');
