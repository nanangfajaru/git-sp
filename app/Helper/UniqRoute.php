<?php 

namespace App\Helper;

use Illuminate\Support\Facades\DB;

class UniqRoute
{
  
    public static function getUniq($parm)
    {

      $query = DB::table('mstr_setting')
        ->select('setting_value')
        ->where('setting_key', 'uniq') 
        ->first();

      $data = $query->setting_value ; 
      return md5($data.$parm) ; 
      // md5()
    }
    
}