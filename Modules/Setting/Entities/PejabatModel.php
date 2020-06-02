<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PejabatModel extends Model
{
    public $timestamps = false;
    
    protected $table = 'tr_pejabat';

    protected $guarded = [
        'id'
    ];

    public static function getData()
    {
    	$query = DB::table('tr_pejabat AS a')
                ->orderBy('a.created_date', 'DESC')
                ->get();

        return $query ;
    }

}
