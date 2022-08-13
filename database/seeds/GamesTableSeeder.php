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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('games')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = config('gameData');

        foreach($data as $game){
            $new_game = new Game();
            $new_game->name = $game['name'];
            $new_game->prefix = $game['prefix'];

            $new_game->save();
        }
    }
}
