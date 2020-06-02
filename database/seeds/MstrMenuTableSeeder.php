<?php

use Illuminate\Database\Seeder;

class MstrMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mstr_menu')->delete();
        DB::table('mstr_menu')
        ->insert([
        	[
            'menu_id' => 'M1',
            'menu_desc' => 'Master',
            'menu_seq' => '1',
            'menu_url' => '#',
            'menu_parent' => null,
            'menu_icon' => 'icon-cogs',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
        	[
            'menu_id' => 'M2',
            'menu_desc' => 'Transaksi',
            'menu_seq' => '1',
            'menu_url' => 'transaksi',
            'menu_parent' => null,
            'menu_icon' => 'icon-stack3',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
        	[
            'menu_id' => 'M3',
            'menu_desc' => 'Report',
            'menu_seq' => '1',
            'menu_url' => 'reports',
            'menu_parent' => null,
            'menu_icon' => 'icon-newspaper',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
        	[
            'menu_id' => 'SM1',
            'menu_desc' => 'Users',
            'menu_seq' => '2',
            'menu_url' => 'users',
            'menu_parent' => 'M1',
            'menu_icon' => 'icon-users2',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
        	[
            'menu_id' => 'SM2',
            'menu_desc' => 'Menu',
            'menu_seq' => '2',
            'menu_url' => 'menus',
            'menu_parent' => 'M1',
            'menu_icon' => 'icon-cog',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
        	[		
            'menu_id' => 'SM3',
            'menu_desc' => 'Roles',
            'menu_seq' => '2',
            'menu_url' => 'roles',
            'menu_parent' => 'M1',
            'menu_icon' => 'icon-stack-star',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
        	],
            [       
            'menu_id' => 'SM4',
            'menu_desc' => 'Setting',
            'menu_seq' => '2',
            'menu_url' => 'setting',
            'menu_parent' => 'M1',
            'menu_icon' => 'icon-equalizer',
            'created_by' => 'USR1',
            'created_date' => date('Y-m-d H:i:s')
            ]
        	// ,[
         //    'menu_id' => 'SM4',
         //    'menu_desc' => 'Company',
         //    'menu_seq' => '2',
         //    'menu_url' => 'ctr_comp',
         //    'menu_parent' => 'M1',
         //    'menu_icon' => 'la la-cogs',
         //    'created_by' => 'USR1',
         //    'created_date' => date('Y-m-d H:i:s')
        	// ],
        	// [
         //    'menu_id' => 'SM5',
         //    'menu_desc' => 'Site',
         //    'menu_seq' => '2',
         //    'menu_url' => 'ctr_site',
         //    'menu_parent' => 'M1',
         //    'menu_icon' => 'la la-cogs',
         //    'created_by' => 'USR1',
         //    'created_date' => date('Y-m-d H:i:s')
        	// ],
        	// [
         //    'menu_id' => 'SM6', 	 			
         //    'menu_desc' => 'Divisi',
         //    'menu_seq' => '2',
         //    'menu_url' => 'ctr_div',
         //    'menu_parent' => 'M1',
         //    'menu_icon' => 'la la-cogs',
         //    'created_by' => 'USR1',
         //    'created_date' => date('Y-m-d H:i:s')
        	// ],
        	// [		
         //    'menu_id' => 'SM7',
         //    'menu_desc' => 'Department',
         //    'menu_seq' => '2',
         //    'menu_url' => 'ctr_dept',
         //    'menu_parent' => 'M1',
         //    'menu_icon' => 'la la-cogs',
         //    'created_by' => 'USR1',
         //    'created_date' => date('Y-m-d H:i:s')
        	// ],
            
         //    [
         //    'menu_id' => 'SM10',              
         //    'menu_desc' => 'Report User',
         //    'menu_seq' => '2',
         //    'menu_url' => 'rpt_user',
         //    'menu_parent' => 'M3',
         //    'menu_icon' => 'la la-bar-chart',
         //    'created_by' => 'USR1',
         //    'created_date' => date('Y-m-d H:i:s')
         //    ],
         //    [
         //    'menu_id' => 'SM11',
         //    'menu_desc' => 'Timbang',
         //    'menu_seq' => '2',
         //    'menu_url' => 'ctr_timb',
         //    'menu_parent' => 'M2',
         //    'menu_icon' => 'la la-cogs',
         //    'created_by' => 'USR1',
         //    'created_date' => date('Y-m-d H:i:s')
         //    ],
         //    [
         //    'menu_id' => 'SM12',
         //    'menu_desc' => 'Kota Indonesia',
         //    'menu_seq' => '2',
         //    'menu_url' => 'ctr_kota',
         //    'menu_parent' => 'M2',
         //    'menu_icon' => 'la la-cogs',
         //    'created_by' => 'USR1',
         //    'created_date' => date('Y-m-d H:i:s')
         //    ],
        	// [
         //    'menu_id' => 'SM13',
         //    'menu_desc' => 'Juru Lokasi',
         //    'menu_seq' => '2',
         //    'menu_url' => 'ctr_jurlok',
         //    'menu_parent' => 'M1',
         //    'menu_icon' => 'la la-cogs',
         //    'created_by' => 'USR1',
         //    'created_date' => date('Y-m-d H:i:s')
        	// ]
    	]);

    }
}
