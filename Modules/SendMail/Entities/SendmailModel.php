<?php

namespace Modules\SendMail\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SendmailModel extends Model
{
    public $timestamps = false;
    
    protected $table = 'tr_serikat_pekerja';

    protected $guarded = [
        'id'
    ];

    public static function getSP()
    {
        $query = DB::table('tr_serikat_pekerja AS a')
                // ->select('a.*', 'b.uke_desc')
                // ->leftJoin('mstr_uke AS b', 'a.dari_uke2', '=', 'b.uke_id')
                ->where('serikat_pekerja_id','20190627082027')
                // ->whereIn('status',$parm2)
                // ->where('kategori','kd')
                // ->orderBy('a.id', 'DESC')
                ->get();

        return $query ;
    }
}
