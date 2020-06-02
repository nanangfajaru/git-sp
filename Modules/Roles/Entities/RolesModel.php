<?php

namespace Modules\Roles\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RolesModel extends Model
{
    public $timestamps = false;
    
    protected $table = 'mstr_role';

    protected $guarded = [
        'id'
    ];

    public static function getData()
    {
    	$query = DB::table('mstr_role AS a')
                ->orderBy('a.role_desc', 'ASC')
                ->get();

        return $query ;
    }
}
