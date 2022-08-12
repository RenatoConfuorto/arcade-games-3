<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function tris(){
        $list = [
            [
                'key' => 'tris_sp',  //key versione del gioco
                'name' => 'games.tris.tris_sp',  //nome della rotta
                'text' => 'SinglePlayer'  //testo del link
            ],
            [
                'key' => 'tris_mp',
                'name' => 'games.tris.tris_mp',
                'text' => 'MultiPlayer',
            ]
        ];
        return view('games.tris.list', compact('list'));
    }

    public function tris_sp(){
        return view('games.tris.sp');
    }

    public function tris_mp(){
        return view('games.tris.mp');
    }
}
