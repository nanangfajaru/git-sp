<?php

namespace Modules\Serikatpekerja\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnggaranDasarModel extends Model
{
    public $timestamps = false;
    
    protected $table = 'tr_anggaran_dasar';

    protected $guarded = [
        'id'
    ];

    public static function getData()
    {
    	$query = DB::table('tr_anggaran_dasar AS a')
                // ->select(DB::raw("(CASE WHEN a.jabatan = 'ketua' THEN 1 ELSE 0 END) AS is_jabatan"))
                // ->select('a.*', 'b.uke_desc')
                // ->leftJoin('mstr_uke AS b', 'a.dari_uke2', '=', 'b.uke_id')
                // ->Where('b.uke_level','2')
                // ->orderByRaw("CASE WHEN a.jabatan = 'ketua' THEN 1 ELSE 0 END DESC")
                ->get();

        return $query ;
    }
    

}
