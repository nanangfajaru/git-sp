<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SettingModel extends Model
{
    public $timestamps = false;
    
    protected $table = 'mstr_setting';

    protected $guarded = [
        'id'
    ];

    public static function getData()
    {
    	$query = DB::table('mstr_setting AS a')
                ->orderBy('a.setting_desc', 'ASC')
                ->get();

        return $query ;
    }

}
