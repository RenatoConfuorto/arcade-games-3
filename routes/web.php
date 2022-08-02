<?php

use App\GameVersion;
use App\Score;
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

Route::get('/', function () {
    return view('welcome');
})->name('start');

Auth::routes();

Route::middleware('auth')->get('/home', 'HomeController@index')->name('home');
Route::middleware('is_admin')->get('/admin', function(){
    $score = Score::where('id', 25)->first();
    $data = $score->gameVersion;
    dd($data);
})->name('admin');
