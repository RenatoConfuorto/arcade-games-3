<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //svuotare la tabella
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //password uguale per tutti gli utenti per il debug
        $password = 'password';

        //creare 50 utenti + admin

        //ADMIN
        $admin = new User();
        $admin->name = 'Admin';
        $admin->code = $admin->generateUserCode($faker);
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make($password);
        $admin->is_admin = 1; //impostato manualmente perchè il valore di default è 0;

        $admin->save();

        //utenti
        for ($i=1; $i < 51; $i++) { 
            $user = new User();
            $user->name = 'User-' . $i;
            $user->code = $user->generateUserCode($faker);
            $user->email = 'user-' . $i . '@gmail.com';
            $user->password = Hash::make($password);

            $user->save();
        }
    }
}

