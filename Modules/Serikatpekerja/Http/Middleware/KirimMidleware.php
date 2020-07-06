<?php

namespace Modules\Serikatpekerja\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Crypt;

use Illuminate\Http\Response;
use Modules\Serikatpekerja\Entities\AnggotaModel;
use Modules\Serikatpekerja\Entities\PengurusModel;
use Modules\Serikatpekerja\Entities\SerikatpekerjaModel;
use Modules\Serikatpekerja\Helper\HelperSerikatPekerja;


class KirimMidleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {       
            $id = Crypt::decrypt($request->seq); 

            $model = SerikatpekerjaModel::where('serikat_pekerja_id', $id)->first();

            $totAnggota = AnggotaModel::totData($id) ;
            $totPengurus = PengurusModel::totData($id) ;
            $total = $totPengurus+$totAnggota;

            $memberFederasi = HelperSerikatPekerja::memberFederasi($id);
            $total_federasi = $memberFederasi+$totPengurus;

            $memberKonfederasi = HelperSerikatPekerja::memberKonfederasi($id);
            $total_konfederasi = $memberKonfederasi+$totPengurus;
            
            // dd($total_federasi);
            $role_id  = Auth::user()->role_id ;

            if ($model->status == 1) {
             
                if(in_array($role_id, \Modules\Serikatpekerja\Helper\HelperSerikatPekerja::getApprove())) {

                    Session::flash('notif', 'SYS / KL tidak dapat kirim');
                    return redirect('home');

                }elseif ($role_id == 'SP') {
                    if ($total <2) {

                        Session::flash('alert', 'Data tidak memenuhi syarat. Total Anggota dan Pengurus Kurang Dari 10 !');
                        return redirect('serikatpekerja');
                    }
                }elseif ($role_id == 'FD') {
                    if ($total_federasi <5) {

                        Session::flash('alert', 'Data tidak memenuhi syarat. Total Serikat Pekerja / Serikat Buruh Anggota Kurang Dari 5 !');
                        return redirect('federasi');
                    }
                }elseif ($role_id == 'KD') {
                    if ($total_konfederasi <0) {

                        Session::flash('alert', 'Data tidak memenuhi syarat. Total Federasi Anggota Kurang Dari 3 !');
                        return redirect('konfederasi');
                    }
                }else{
                    Session::flash('notif', 'Roles tidak terdaftar');
                    return redirect('home');
                }

            }else{
                Session::flash('notif', 'Data Sudah di Kirim');
                return redirect('home');
            }

            return $next($request);
    }
}
