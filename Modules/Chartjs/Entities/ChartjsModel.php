<?php

namespace Modules\Chartjs\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChartjsModel extends Model
{
    protected $fillable = [];

    public static function getData()
    {
    	$query = DB::table('tr_serikat_pekerja AS a')
                     ->select(DB::raw('count(*) as count_provinsi, b.nama_provinsi as nama_provinsi'))
                     ->where('a.status', 2)
                     ->where('a.kategori', 'sp')
                     // ->whereNotNull('status', '<>', 'NULL')
                     ->leftJoin('ref_provinsi AS b', 'a.id_provinsi', '=', 'b.id_provinsi')
                     ->whereNotNull('a.id_provinsi')
                     ->groupBy('a.id_provinsi','b.nama_provinsi')
                     ->get();
        return $query ;
    }

}


