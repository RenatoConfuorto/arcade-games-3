<?php

use App\Game;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->truncate();

        $data = config('gameData');

        foreach($data as $game){
            $new_game = new Game();
            $new_game->name = $game;

            $new_game->save();
        }
    }
}
