<?php

use App\User;
use App\UserDetail;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('user_details')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        //prelevare gli utenti
        $users = User::all();

        foreach ($users as $user) {
            // per ogni utente generare dei dettagli
            $user_details = new UserDetail();
            //elementi necessari al record
            $user_details->user_id = $user->id;
            $user_details->name = $user->name;

            //elementi che possono essere null
            //usera rand(0, 1) per stabilire casualmente quali campi riempire
            $user_details->last_name = rand(0, 1) ? $faker->lastName : null;
            $user_details->username = rand(0, 1) ? $faker->userName : null;
            $user_details->country = rand(0, 1) ? $faker->country : null;
            $user_details->city = rand(0, 1) ? $faker->city : null;
            $user_details->date_of_birth = rand(0, 1) ? $faker->date() : null;

            $user_details->save();
        }
    }
}
