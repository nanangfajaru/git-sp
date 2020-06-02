<?php 

namespace Modules\Serikatpekerja\Helper;

use Illuminate\Support\Facades\DB;
use Request;
use Carbon\Carbon;

class HelperSerikatPekerja 
{

  public static function getApprove()
  {
      $approve  = array('SYS','KL');
      return $approve ;
  }

	public static function getStatus($parm1)
  { 
      if ($parm1 == 1) {
        return '<span class="badge bg-orange-300">OPEN</span>' ;
      }elseif ($parm1 == 2) {
        return '<span class="badge bg-blue-300">PROSES</span>' ;
      }elseif ($parm1 == 3) {
        return '<span class="badge badge-success">DICATAT</span>' ;
      }elseif ($parm1 == 4) {
        return '<span class="badge badge-secondary">DITANGGUHKAN</span>' ;
      }elseif ($parm1 == 5) {
        return '<span class="badge badge-danger">PENCABUTAN SEMENTARA</span>' ;
      }elseif ($parm1 == 6) {
        return '<span class="badge badge-danger">PENCABUTAN PENCATATAN</span>' ;
      }else{
        return '<span class="badge">ERROR</span>' ;
      }
  }

  public static function getKategori($parm1)
  { 
      if ($parm1 == 'sp') {

        return 'Serikat Pekerja' ;
      
      }elseif ($parm1 == 'fd') {
      
        return 'Federasi' ;
      
      }elseif ($parm1 == 'kd') {
      
        return 'Konfederasi' ;
      
      }else{
      
        return 'ERROR' ;
      
      }
  }

  public static function getPerusahaan($parm1)
  { 
      if ($parm1 == 'luar') {

        return 'Di Luar Perusahaan' ;
      
      }elseif ($parm1 == 'dalam') {
      
        return 'Di Dalam Perusahaan' ;
      
      }else{
      
        return 'Tidak Terdaftar Dalam Perusahaan' ;
      
      }
  }

  public static function getTitle()
  { 
      if (Request::segment(1) == 'serikatpekerja') {

        return 'Serikat Pekerja' ;
      
      }elseif (Request::segment(1) == 'federasi') {
      
        return 'Federasi' ;
      
      }else{
      
        return 'Title Error' ;
      
      }
  }

  public static function getStatusAD( $parm1)
  { 
      $skrg = Carbon::now() ;
      $tgl_ad = Carbon::parse($parm1);

      $diff = $skrg->diffInDays($tgl_ad, false);

      if ( $diff >= 0) {
        return '<span class="badge bg-success">'. $diff .' Hari Akan Terakhir</span>' ;
      } else {
        return '<span class="badge bg-danger">'. $diff .' Hari Telah Terakhir</span>' ;
      }
      

      // return date_diff($tgl_ad, $skrg) ;
      // if ($parm1 == 1) {
      //   return '<span class="badge bg-orange-300">OPEN</span>' ;
      // }elseif ($parm1 == 2) {
      //   return '<span class="badge bg-blue-300">PROSES</span>' ;
      // }elseif ($parm1 == 3) {
      //   return '<span class="badge badge-success">DICATAT</span>' ;
      // }elseif ($parm1 == 4) {
      //   return '<span class="badge badge-secondary">DITANGGUHKAN</span>' ;
      // }elseif ($parm1 == 5) {
      //   return '<span class="badge badge-danger">PENCABUTAN SEMENTARA</span>' ;
      // }elseif ($parm1 == 6) {
      //   return '<span class="badge badge-danger">PENCABUTAN PERMANEN</span>' ;
      // }else{
      //   return '<span class="badge">ERROR</span>' ;
      // }
  }

  public static function memberFederasi($parm)
  {
          $query = DB::table('tr_member_federasi AS a')
                ->where('serikat_pekerja_id', $parm)
                ->count();

          return $query ;
  }

  public static function memberKonfederasi($parm)
  {
          $query = DB::table('tr_member_konfederasi AS a')
                ->where('serikat_pekerja_id', $parm)
                ->count();

          return $query ;
  }

  public static function memberSerikat($parm)
  {
          $query = DB::table('tr_anggota AS a')
                ->where('serikat_pekerja_id', $parm)
                ->count();

          return $query ;
  }

}