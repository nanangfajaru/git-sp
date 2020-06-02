<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;

use DataTables;
use Auth;
use Session;
use Crypt;
use Illuminate\Support\Facades\DB;
use CustomHelper;
Use Storage;
use Excel;
use PDF;

use Modules\Serikatpekerja\Entities\SerikatpekerjaModel;
use Modules\Serikatpekerja\Entities\AnggaranDasarModel;
use Modules\Serikatpekerja\Entities\AnggotaModel;
use Modules\Serikatpekerja\Entities\PengurusModel;
use Modules\Serikatpekerja\Entities\HistoryModel;
use Modules\Users\Entities\UsersModel;
use Modules\Serikatpekerja\Helper\HelperSerikatPekerja;


class DaftarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function daftar()
    {
        
        return view('daftarIndexView');
    }

    public function daftarSave(Request $request){
        $this->validate($request, [
            'serikat_pekerja_desc' => 'required|string|max:255|unique:tr_serikat_pekerja,serikat_pekerja_desc',
            'nama_singkat' => 'max:255|unique:tr_serikat_pekerja,nama_singkat',
            // 'afiliasi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'url_logo' => 'required|mimes:jpg,png,jpeg,pdf|max:5000'
        ], 
        [
            'required' => 'Harus di isi.',
            'mimes' => 'Upload file dengan extention .jpg .jpeg',
            'unique' => 'Data sudah ada'
        ]);

        // $username = hexdec(uniqid());
        $username = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
        $user_id = CustomHelper::getAutoNumberUsr('users','USR');
        // dd($username);

        $date = date('Y-m-d');
        $file_logo = $request->file('url_logo');
        // $path_logo = $file_logo->store('public/logo/'.$date);   
        $path_logo = $file_logo->move("upload/logo/".$date."/", $file_logo->getClientOriginalName() );  

        $id_transaction = date('YmdHis') ;

        if ($request->kategori == 'sp') {
            $roles = 'SP' ;
        }elseif ($request->kategori == 'fd') {
            $roles = 'FD' ;
        }else{
            $roles = 'KD' ;
        }
        DB::beginTransaction();
        try {

            $query = UsersModel::insert([
                                'user_id' => $user_id,
                                'username' => $username,
                                'name' => $request->serikat_pekerja_desc,
                                'password' => bcrypt('123'),
                                // 'id_balai' => $request->balai,
                                'role_id' => $roles,
                                'created_by' => 'Online',
                                'password_changed_date' => '2010-01-01',
                                'created_date' => date('Y-m-d H:i:s')
                            ]);

            $query = SerikatpekerjaModel::insert([
                                    'serikat_pekerja_id' => $id_transaction,
                                    'serikat_pekerja_desc' => $request->serikat_pekerja_desc,
                                    'nama_singkat' => $request->nama_singkat,
                                    // 'afiliasi' => $request->afiliasi,
                                    'kategori' => $request->kategori,
                                    'url_logo' => $path_logo,
                                    'created_by' => $user_id,
                                    'created_date' => date('Y-m-d H:i:s')
                                ]);

            // $query2 = AnggaranDasarModel::insert([
            //                         'serikat_pekerja_id' => $id_transaction,
            //                         'url_ad' => $path,
            //                         'tgl_pembuatan_ad' => $request->tgl_pembuatan_ad,
            //                         'tgl_berlaku_ad' => $request->tgl_berlaku_ad,
            //                         'created_by' => Auth::user()->user_id,
            //                         'created_date' => date('Y-m-d H:i:s')
            //                     ]);

        DB::commit(); 
        // $message = 'Pendaftaran Berhasil "'.$username.'"' ;
        // Session::flash('alert', $message );
        // return redirect('serikatpekerja.anggota');
        // return redirect()->route('daftar');

        // $decrypted = Crypt::decrypt($id);     
        // $model = SerikatpekerjaModel::where('serikat_pekerja_id', $decrypted)->first();
        return view('daftarBerhasil', compact('username'));

        }catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function cetak($id){

        $pdf = PDF::loadview('daftarCetak',['model'=>$id])->setPaper('a4');
        return $pdf->download();   
        // return $pdf->stream();   
    }

}
