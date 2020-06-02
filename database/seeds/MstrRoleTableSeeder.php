<?php

use Illuminate\Database\Seeder;

class MstrRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mstr_role')->delete();
        DB::table('mstr_role')
        ->insert([
        	[
            'role_id' => 'SYS',
            'role_desc' => 'Administrator',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
        	[
            'role_id' => 'User',
            'role_desc' => 'User',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	]
    	]);
    }
}
