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
        $this->call(MstrMenuTableSeeder::class);
        $this->call(MstrRoleTableSeeder::class);
        $this->call(MstrSettingTableSeeder::class);
        $this->call(TrMenuTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
