<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nanang Fajar Untoro',
            'email' => 'nanangfajaru@gmail.com',
            'password' => bcrypt('123'),
            'user_id' => 'USR1',
            'username' => 'nanang',
            'role_id' => 'SYS',
        ],
        [
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123'),
            'user_id' => 'USR2',
            'username' => 'user',
            'role_id' => 'User',
        ]);
    }
}
