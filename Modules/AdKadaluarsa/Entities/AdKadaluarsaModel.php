<?php

namespace Modules\AdKadaluarsa\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdKadaluarsaModel extends Model
{
      public $timestamps = false;
    
    protected $table = 'tr_serikat_pekerja';

    protected $guarded = [
        'id'
    ];

    public static function getData()
    {
    	$query = DB::table('tr_serikat_pekerja AS a')
    			->select(DB::raw('a.*, b.tgl_berlaku_ad'))
    			->leftJoin('tr_anggaran_dasar AS b', 'a.serikat_pekerja_id', '=', 'b.serikat_pekerja_id')
    			->WhereIn('a.status', [3,4,5,6])
                ->orderBy('b.tgl_berlaku_ad', 'ASC')
                ->get();

        return $query ;
    }
}
