<?php
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
$routes = [
    [
        'name' => 'login', //per debug
        'text' => 'tris',
    ],
];

Route::get('/', function() use($routes)  {
    return view('home', compact('routes'));
})->name('home');

Auth::routes();
// Route::middleware('auth')->get('/home', 'HomeController@index')->name('home');
// Route::middleware('is_admin')->get('/admin', function(){
// })->name('admin');
