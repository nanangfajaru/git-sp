<?php

namespace Modules\Menus\Entities;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenusModel extends Model
{
    public $timestamps = false;
    
    protected $table = 'mstr_menu';

    protected $guarded = [
        'id'
    ];

    public static function getData()
    {
    	$query = DB::table('mstr_menu AS a')
                ->orderBy('a.menu_desc', 'ASC')
                ->get();

        return $query ;
    }
    public static function getMenuM1(){
        $query = DB::table('mstr_menu AS a')
                ->where('a.status', 1)
                ->where('a.menu_seq', 1)
                ->orderBy('a.menu_desc', 'ASC')
                ->get();

        return $query ;
    }

    public static function getMenuM2($parm2){
        $query = DB::table('mstr_menu AS a')
                ->where('a.menu_parent', $parm2)
                ->where('a.status', 1)
                ->where('a.menu_seq', 2)
                ->orderBy('a.menu_desc', 'ASC')
                ->get();

        return $query ;
    }

    public static function getMenuM3($parm2){
        $query = DB::table('mstr_menu AS a')
                ->where('a.menu_parent', $parm2)
                ->where('a.status', 1)
                ->where('a.menu_seq', 3)
                ->orderBy('a.menu_desc', 'ASC')
                ->get();

        return $query ;
    }
}
