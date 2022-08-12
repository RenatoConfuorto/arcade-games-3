<?php

use App\GameVersion;
use App\Score;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('scores')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $users = User::all();
        $game_versions = GameVersion::all();

        $scores_count = rand(0, 1500);
        for ($i = 0; $i < $scores_count; $i++) {
            $score = new Score();
            //relativo utente e versione di gioco
            $user = $users[rand(0, $users->count() - 1)];
            $game_version = $game_versions[rand(0, $game_versions->count() - 1)];
            $score->game_version_id = $game_version->id;
            $score->user_id = $user->id;

            $score->score = rand(0, 16777215);
            $score->level = rand(0, 65535);
            $score->time_s = rand(0, 65535);

            //in determinati casi rendere le variabili di controllo diverse da quelle standard
            $conditions = ($i % 7 == 0) || ($i % 13 == 0) || ($i % 29 == 0);

            $score->score_ck = $conditions ? rand(0, 16777215) : $score->score;
            $score->level_ck = $conditions ? rand(0, 65535) : $score->level;
            $score->time_s_ck = $conditions ? rand(0, 65535) : $score->time_s;
            
            $score->save();

        }
    }
}
