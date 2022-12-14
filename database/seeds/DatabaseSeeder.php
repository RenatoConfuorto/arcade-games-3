<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UserDetailsTableSeeder::class);
        $this->call(WatchedUsersTableSeeder::class);
        $this->call(GamesTableSeeder::class);
        $this->call(GameVersionsTableSeeder::class);
        $this->call(ScoresTableSeeder::class);
    }
}
