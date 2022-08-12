<?php

use App\Game;
use App\GameVersion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameVersionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('game_versions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = config('gameVersionsData');
        foreach ($data as $key => $value) {
            $game = new GameVersion();
            $game->name = $value['name'];
            $game->text = $value['text'];
            $game->description = $value['description'];
            $game->game_key = $key;
            $game->game_id = Game::where('name', $value['game'])->first()->id;

            $game->save();
        }
    }
}
