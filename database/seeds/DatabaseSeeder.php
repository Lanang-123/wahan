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
        $this->call(RemoveDataTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ConfigTableSeeder::class);
        // $this->call(InitTableSeeder::class);
    }
}
