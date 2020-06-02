<?php

namespace Modules\Federasi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FederasiModel extends Model
{
    
    public $timestamps = false;
    
    protected $table = 'tr_serikat_pekerja';

    protected $guarded = [
        'id'
    ];

    public static function getData($parm1, $parm2, $parm3)
    {
    	$query = DB::table('tr_serikat_pekerja AS a')
                // ->select('a.*', 'b.uke_desc')
                // ->leftJoin('mstr_uke AS b', 'a.dari_uke2', '=', 'b.uke_id')
                ->where('created_by','like', "%{$parm1}%")
                ->where('id_kabupaten','like', "%{$parm3}%")
                ->whereIn('status',$parm2)
                ->where('kategori','fd')
                ->orderBy('a.kirim_date', 'DESC')
                ->get();

        return $query ;
    }

    public static function getTotal($parm1)
    {
        $query = DB::table('tr_serikat_pekerja AS a')
                ->whereIn('serikat_pekerja_id',$parm1)
                ->get();

        return $query ;
    }
}

