<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GamesController extends Controller
{

    public function tris_sp(){
        return view('games.tris.sp');
    }

    public function tris_mp(){
        return view('games.tris.mp');
    }
}
