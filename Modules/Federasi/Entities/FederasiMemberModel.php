<?php

namespace Modules\Federasi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FederasiMemberModel extends Model
{
    public $timestamps = false;
    
    protected $table = 'tr_member_federasi';

    protected $guarded = [
        'id'
    ];

    public static function getData($parm1)
    {
    	$query = DB::table('tr_member_federasi AS a')
                ->select('a.id As idx','b.*')
                ->leftJoin('tr_serikat_pekerja AS b', 'a.member_id', '=', 'b.serikat_pekerja_id')
                ->where('a.serikat_pekerja_id','like', "%{$parm1}%")
                // ->whereIn('status',$parm2)
                // ->where('kategori','fd')
                ->orderBy('a.id', 'DESC')
                ->get();

        return $query ;
    }

}
