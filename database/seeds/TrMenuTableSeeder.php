<?php

use Illuminate\Database\Seeder;

class TrMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tr_menu')->delete();
        DB::table('tr_menu')
        ->insert([
        	[
        	'role_id' => 'SYS',
            'menu_id' => 'M1',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
        	[
        	'role_id' => 'SYS',
            'menu_id' => 'M2',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
        	[
        	'role_id' => 'SYS',
            'menu_id' => 'M3',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
        	[
            'role_id' => 'SYS',
            'menu_id' => 'SM1',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
            ],
            [
            'role_id' => 'SYS',
            'menu_id' => 'SM2',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
            ],
            [
            'role_id' => 'SYS',
            'menu_id' => 'SM3',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
            ],
            [
            'role_id' => 'SYS',
            'menu_id' => 'SM4',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
            ]
            // ,[
            // 'role_id' => 'ROLE1',
            // 'menu_id' => 'SM5',
            // 'created_by' => 'USR1',
            // 'created_date' => date('Y-m-d H:i:s')
            // ],
            // [
            // 'role_id' => 'ROLE1',
            // 'menu_id' => 'SM6',
            // 'created_by' => 'USR1',
            // 'created_date' => date('Y-m-d H:i:s')
            // ],
            // [
            // 'role_id' => 'ROLE1',
            // 'menu_id' => 'SM7',
            // 'created_by' => 'USR1',
            // 'created_date' => date('Y-m-d H:i:s')
            // ],

            // [
            // 'role_id' => 'ROLE1',
            // 'menu_id' => 'SM10',
            // 'created_by' => 'USR1',
            // 'created_date' => date('Y-m-d H:i:s')
            // ],
            // [
            // 'role_id' => 'ROLE1',
            // 'menu_id' => 'SM11',
            // 'created_by' => 'USR1',
            // 'created_date' => date('Y-m-d H:i:s')
            // ],
            // [
            // 'role_id' => 'ROLE1',
            // 'menu_id' => 'SM12',
            // 'created_by' => 'USR1',
            // 'created_date' => date('Y-m-d H:i:s')
            // ]
    	]);
    }
}
