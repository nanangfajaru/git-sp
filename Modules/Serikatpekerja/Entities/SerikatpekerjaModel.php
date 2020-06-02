<?php

namespace Modules\Serikatpekerja\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SerikatpekerjaModel extends Model
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
                ->where('kategori','sp')
                ->orderBy('a.kirim_date', 'DESC')
                ->get();

        return $query ;
    }

    public static function getDetail()
    {
        $query = DB::table('tr_serikat_pekerja AS a')
                ->select('a.*', 'b.url_ad','b.tgl_pembuatan_ad','b.tgl_berlaku_ad', 'b.keterangan','c.nama_provinsi', 'd.nama_kabupaten', 'e.nama_kecamatan', 'f.nama_desa', 'g.nama_pejabat','g.nama_jabatan')
                // ->leftJoin('tr_anggaran_dasar AS b', 'a.serikat_pekerja_id', '=', 'b.serikat_pekerja_id')
                ->leftJoin('tr_anggaran_dasar AS b', function($join)
                         {
                             $join->on('a.serikat_pekerja_id', '=', 'b.serikat_pekerja_id')
                                     ->where('b.created_date', '=', DB::raw("(select max(`created_date`) from tr_anggaran_dasar)"));
                                     // ->limit(1);
                         })
                ->leftJoin('tr_pejabat AS g', function($join)
                         {
                             $join->on('a.id_kabupaten', '=', 'g.id_kabupaten') ;
                                     // ->where('b.created_date', '=', DB::raw("(select max(`created_date`) from tr_anggaran_dasar)"));
                                     // ->limit(1);
                         })
                ->leftJoin('ref_provinsi AS c', 'a.id_provinsi', '=', 'c.id_provinsi')
                ->leftJoin('ref_kabupaten AS d', 'a.id_kabupaten', '=', 'd.id_kabupaten')
                ->leftJoin('ref_kecamatan AS e', 'a.id_kecamatan', '=', 'e.id_kecamatan')
                ->leftJoin('ref_desa AS f', 'a.id_desa', '=', 'f.id_desa')
                // ->Where('b.uke_level','2')
                ->orderBy('a.id', 'DESC')
                ->get();

        return $query ;
    }

    public static function get6()
    {
        $query = DB::select("
                            SELECT RIGHT(a.no_catat,6) As 'kode' FROM tr_serikat_pekerja a ORDER BY RIGHT(a.no_catat,6) DESC LIMIT 1
                            ");

        // dd($query);
        if ($query['0']->kode == NULL ) {
            $kode = '000001' ;
        } else {
            $kode = $query['0']->kode+1 ;
        }
        
        return str_pad($kode,6,"0",STR_PAD_LEFT) ;

    }
}
