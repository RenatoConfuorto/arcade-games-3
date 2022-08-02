<?php

use App\User;
use App\WatchedUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WatchedUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('watched_users')->truncate();
        //prendere il totale degli utenti e calcolare quante combianzioni ci sono
        $users = User::all();
        $users_count = $users->count();
        $total_combinations = $users_count * ($users_count - 1);

        //generare un numero casuale di collegamenti
        $count = 0;
        $total = rand(0, $total_combinations);
        while ($count < $total) {
            $watched_user = new WatchedUser();
            $watched_user->user_id = $users[rand(0, $users_count - 1)]->id;
            $watched_user->watched_user_id = $users[rand(0, $users_count - 1)]->id;

            $relative_user = WatchedUser::where('user_id', $watched_user->user_id)->where('watched_user_id', $watched_user->watched_user_id)->first();
            
            if($watched_user->user_id != $watched_user->watched_user_id && !$relative_user){
                $count++;
                $watched_user->save();
            }
        }
    }
}
