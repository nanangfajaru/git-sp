<?php

namespace Modules\Users\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersModel extends Model
{
    public $timestamps = false;
    
    protected $table = 'users';

    protected $guarded = [
        'id'
    ];

    public static function getData()
    {
    	$query = DB::table('users AS a')
    			// ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY a.name ASC) as idx, a.*, b.role_desc'))
                ->leftJoin('mstr_role AS b', 'a.role_id', '=', 'b.role_id')
                ->where('a.role_id','!=', 'SYS')
                ->orderBy('a.created_date', 'DESC')
                ->get();

        return $query ;
    }

    public static function getDataSys()
    {
        $query = DB::table('users AS a')
                // ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY a.name ASC) as idx, a.*, b.role_desc'))
                ->leftJoin('mstr_role AS b', 'a.role_id', '=', 'b.role_id')
                ->orderBy('a.created_date', 'DESC')
                ->get();

        return $query ;
    }
}
