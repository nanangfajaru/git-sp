<?php

namespace Modules\Serikatpekerja\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnggotaModel extends Model
{
    public $timestamps = false;
    
    protected $table = 'tr_anggota';

    protected $guarded = [
        'id'
    ];

    public static function getData()
    {
    	$query = DB::table('tr_anggota AS a')
                // ->select('a.*', 'b.uke_desc')
                // ->leftJoin('mstr_uke AS b', 'a.dari_uke2', '=', 'b.uke_id')
                // ->Where('b.uke_level','2')
                ->orderBy('a.id', 'DESC')
                ->get();

        return $query ;
    }
    public static function totData($parm1)
    {
        $query = DB::table('tr_anggota AS a')
                // ->select('a.*', 'b.uke_desc')
                // ->leftJoin('mstr_uke AS b', 'a.dari_uke2', '=', 'b.uke_id')
                ->Where('a.serikat_pekerja_id', $parm1)
                // ->orderBy('a.id', 'DESC')
                ->get();
        $count = $query->count();
        return $count ;
    }
}
