<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class LoginModel extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id','password','remember_token'
    ]; 

    public static function getMenuM1($parm1){
        $query = DB::table('tr_menu AS a')
                ->leftJoin('mstr_menu AS b', 'a.menu_id', '=', 'b.menu_id')
                ->where('a.role_id', $parm1)
                ->where('b.status', 1)
                ->where('b.menu_seq', 1)
                ->orderBy('b.menu_desc', 'ASC')
                ->get();

        return $query ;
    }

    public static function getMenuM2($parm1, $parm2){
        $query = DB::table('tr_menu AS a')
                ->leftJoin('mstr_menu AS b', 'a.menu_id', '=', 'b.menu_id')
                ->where('a.role_id', $parm1)
                ->where('b.menu_parent', $parm2)
                ->where('b.status', 1)
                ->where('b.menu_seq', 2)
                ->orderBy('b.menu_desc', 'ASC')
                ->get();

        return $query ;
    }

    public static function getMenuM3($parm1, $parm2){
        $query = DB::table('tr_menu AS a')
                ->leftJoin('mstr_menu AS b', 'a.menu_id', '=', 'b.menu_id')
                ->where('a.role_id', $parm1)
                ->where('b.menu_parent', $parm2)
                ->where('b.status', 1)
                ->where('b.menu_seq', 3)
                ->orderBy('b.menu_desc', 'ASC')
                ->get();

        return $query ;
    }

    public static function checkOpenSM2($parm1,$parm2,$parm3){
        $query = DB::table('tr_menu AS a')
                ->leftJoin('mstr_menu AS b', 'a.menu_id', '=', 'b.menu_id')
                ->where('a.role_id', $parm1)
                ->where('b.menu_parent', $parm2)
                ->where('b.menu_url', $parm3)
                ->where('b.status', 1)
                ->where('b.menu_seq', 2)
                ->orderBy('b.menu_desc', 'ASC')
                ->count();

        return $query ;

    }

    public static function checkOpenSM23($parm1){
        $query = DB::select(
                    " SELECT menu_parent FROM mstr_menu 
                        WHERE menu_seq = 2 
                        and menu_id = (
                                SELECT menu_parent FROM mstr_menu WHERE menu_url = '".$parm1."' AND menu_seq = '3'
                            )"
                    );
        $data = collect($query)->pluck('menu_parent')->toArray() ;
        return $data;

    }

    public static function checkOpenSM3($parm1,$parm2,$parm3){
        $query = DB::table('tr_menu AS a')
                ->leftJoin('mstr_menu AS b', 'a.menu_id', '=', 'b.menu_id')
                ->where('a.role_id', $parm1)
                ->where('b.menu_parent', $parm2)
                ->where('b.menu_url', $parm3)
                ->where('b.status', 1)
                ->where('b.menu_seq', 3)
                ->orderBy('b.menu_desc', 'ASC')
                ->count();

        return $query ;

    }
}