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

    public static function getDataJenisPelatihan()
    {
    	$query = DB::table('pelatihan')
                     ->select(DB::raw('count(*) as count_jenis_pelatihan, id_balai, jenis_pelatihan'))
                     // ->where('status', '<>', 1)
                     ->groupBy('id_balai','jenis_pelatihan')
                     ->get();
        return $query ;
    }

    public static function getYkJk()
    {
        $query = DB::table('peserta_pelatihan')
                     ->select(DB::raw('count(*) as count_jk'))
                     ->where('balai', 'yogyakarta')
                     ->groupBy('jk')
                     ->get();
        return $query ;
    }
    public static function getYkKerja()
    {
        $query = DB::table('peserta_pelatihan')
                     ->select(DB::raw('count(*) as count_prov, prov'))
                     ->where('balai', 'yogyakarta')
                     ->groupBy('prov')
                     ->get();
        return $query ;
    }

    public static function getBjJk()
    {
        $query = DB::table('peserta_pelatihan')
                     ->select(DB::raw('count(*) as count_jk'))
                     ->where('balai', 'banjarmasin')
                     ->groupBy('jk')
                     ->get();
        return $query ;
    }
    public static function getBjKerja()
    {
        $query = DB::table('peserta_pelatihan')
                     ->select(DB::raw('count(*) as count_prov, prov'))
                     ->where('balai', 'banjarmasin')
                     ->groupBy('prov')
                     ->get();
        return $query ;
    }
}


