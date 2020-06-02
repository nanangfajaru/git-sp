<?php

use Illuminate\Database\Seeder;

class MstrSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mstr_setting')->delete();
        DB::table('mstr_setting')
        ->insert([
        	[
        	'setting_key' => 'exp_cp',
            'setting_value' => '31',
            'setting_desc' => 'Hari Expire Password',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
            [
        	'setting_key' => 'menu_seq',
            'setting_value' => '1',
            'setting_desc' => 'Menu Sequence',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
        	[
        	'setting_key' => 'menu_seq',
            'setting_value' => '2',
            'setting_desc' => 'Menu Sequence',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
        	[
        	'setting_key' => 'menu_seq',
            'setting_value' => '3',
            'setting_desc' => 'Menu Sequence',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
    	]);
    }
}
