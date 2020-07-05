<?php

namespace Modules\Konfederasi\Http\Controllers;

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
use Carbon\Carbon;
    
use Modules\Konfederasi\Entities\KonfederasiModel;
use Modules\Konfederasi\Entities\KonfederasiMemberModel;

use Modules\Serikatpekerja\Entities\SerikatpekerjaModel;
use Modules\Serikatpekerja\Entities\AnggaranDasarModel;
use Modules\Serikatpekerja\Entities\AnggotaModel;
use Modules\Serikatpekerja\Entities\PengurusModel;
use Modules\Serikatpekerja\Entities\HistoryModel;

use Modules\Serikatpekerja\Helper\HelperSerikatPekerja;

class KonfederasiController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('KirimMidleware')->only('kirim');

    }

    public function index()
    {
        return view('konfederasi::KonfederasiIndexView');
    }

    public function api(){

        if (Auth::user()->role_id == 'SYS'  ) {
            $parm1 = '' ;
            $parm2  = array(2,3,4,5,6,7) ;
            $parm3 = '' ;
        }elseif (Auth::user()->role_id == 'KAB'  ){
            $parm1 = '' ;
            $parm2  = array(2,3,4,5,6,7) ;
            $parm3 = Auth::user()->id_kabupaten ;
            
        }else{
            $parm1 = Auth::user()->user_id ;
            $parm2  = array(1,2,3,4,5,6,7) ;
            $parm3 = '' ;
        }

        $model = KonfederasiModel::getData($parm1, $parm2, $parm3) ;
        return Datatables::of($model)
        ->addColumn('action', function ($model) {

                        if (Auth::user()->role_id == 'KD') 
                            {
                                if ($model->status == 1 ) 
                                {
                                    return '
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="'.route('konfederasi.general', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-pencil5"></i>  Isi Data</a>

                                                <a href="'.route('konfederasi.pengurus', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-user-tie"></i>  Pengurus</a>
                                                
                                                <a href="'.route('konfederasi.member', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-users"></i> Federasi</a>

                                                <a href="'.route('konfederasi.detail', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-file-text"></i>  Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    ';

                                }elseif ($model->status == 3 ) {

                                    return '
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">

                                                <a href="'.route('konfederasi.detail', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-file-text"></i>  Detail</a>
                                                <a href="'.route('konfederasi.bukti', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item" target="_blank"><i class="icon-printer"></i>  Bukti Pencatatan</a>
                                            </div>
                                        </div>
                                    </div>
                                    ';

                                }elseif ($model->status == 4 ) {

                                        return '
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a href="'.route('konfederasi.detail', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-file-text"></i>  Detail</a>
                                                    <a href="'.route('konfederasi.suratPenangguhan', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item" target="_blank"><i class="icon-printer"></i>  Surat Penangguhan</a>
                                                </div>
                                            </div>
                                        </div>
                                        ';

                                    }else{

                                    return '
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">

                                                <a href="'.route('konfederasi.detail', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-file-text"></i>  Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    ';

                                }

                            }elseif (Auth::user()->role_id == 'SYS') {

                                if ($model->status == 3 ) 
                                {
                                   
                                   return '
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="'.route('konfederasi.detail', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-file-text"></i>  Detail</a>
                                                <a href="'.route('konfederasi.bukti', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item" target="_blank"><i class="icon-printer"></i>  Bukti Pencatatan</a>
                                            </div>
                                        </div>
                                    </div>
                                    ';

                                }elseif ($model->status == 4 ) {

                                        return '
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a href="'.route('konfederasi.detail', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-file-text"></i>  Detail</a>
                                                    <a href="'.route('konfederasi.suratPenangguhan', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item" target="_blank"><i class="icon-printer"></i>  Surat Penangguhan</a>
                                                </div>
                                            </div>
                                        </div>
                                        ';

                                    }else{
                                    return '
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="'.route('konfederasi.detail', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-file-text"></i>  Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    ';

                                }
                            }elseif (Auth::user()->role_id == 'KAB') {

                                    if ($model->status == 3 ) 
                                    {
                                       
                                       return '
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="'.route('konfederasi.detail', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-file-text"></i>  Detail</a>
                                                    <a href="'.route('konfederasi.bukti', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item" target="_blank"><i class="icon-printer"></i>  Bukti Pencatatan</a>
                                                </div>
                                            </div>
                                        </div>
                                        ';

                                    }elseif ($model->status == 4 ) {

                                        return '
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a href="'.route('konfederasi.detail', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-file-text"></i>  Detail</a>
                                                    <a href="'.route('konfederasi.suratPenangguhan', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item" target="_blank"><i class="icon-printer"></i>  Surat Penangguhan</a>
                                                </div>
                                            </div>
                                        </div>
                                        ';

                                    }else{
                                        return '
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="'.route('konfederasi.detail', Crypt::encrypt($model->serikat_pekerja_id) ).'" class="dropdown-item"><i class="icon-file-text"></i>  Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                        ';

                                    }
                            }                               

                            })                        
                            ->addColumn('status', function ($model) {
                                return HelperSerikatPekerja::getStatus($model->status) ;
                            })
                            ->addColumn('kirim', function ($model) {

                            if (Auth::user()->role_id == 'KD') {

                                if ($model->status == 1) {

                                    return '<a href="'.route('konfederasi.kirim', Crypt::encrypt($model->serikat_pekerja_id) ).'" 
                                            title="Kirim: '.$model->serikat_pekerja_desc.'">
                                            <i class="icon-enter"></i></a>';

                                }else{

                                }

                            }elseif (Auth::user()->role_id == 'SYS') {

                                if ($model->status != '1') {
                                    
                                    return '<a href="'.route('konfederasi.proses', Crypt::encrypt($model->serikat_pekerja_id) ).'" 
                                            title="Proses: '.$model->serikat_pekerja_desc.'">
                                            <i class="icon-pencil7"></i></a>';
                                }
                            }elseif (Auth::user()->role_id == 'KAB') {

                                if ($model->status != '1') {
                                    
                                    return '<a href="'.route('konfederasi.proses', Crypt::encrypt($model->serikat_pekerja_id) ).'" 
                                            title="Proses: '.$model->serikat_pekerja_desc.'">
                                            <i class="icon-pencil7"></i></a>';
                                }
                            }else {
                                # code...
                            }

                         })
                        ->rawColumns(['kirim','action','status'])
                        ->addIndexColumn()
                        ->make(true);

    }

    public function member($id)
    {
        $decrypted = Crypt::decrypt($id);     
        $model = KonfederasiModel::where('serikat_pekerja_id', $decrypted)->first();
        $konfederasi_member = SerikatpekerjaModel::where([['status', 3],['kategori','fd']])->orderBy('serikat_pekerja_desc')->pluck('serikat_pekerja_desc', 'serikat_pekerja_id');  
        return view('konfederasi::KonfederasiMemberView', compact('model','konfederasi_member'));
    }

    public function memberSave(request $request)
    {
        $this->validate($request, [
            'konfederasi_member' => 'required|string|max:200',
        ],[
            'required' => 'Harus di isi',
        ]);


        DB::beginTransaction();
        try {
            $query = KonfederasiMemberModel::insert([
                                    'serikat_pekerja_id' => $request->serikat_pekerja_id,
                                    'member_id' => $request->konfederasi_member,

                                    'created_by' => Auth::user()->user_id,
                                    'created_date' => date('Y-m-d H:i:s')
                                ]);


        DB::commit(); 
        Session::flash('notif', 'Data Berhasil Disimpan !!');
        return redirect()->back();

        }catch (\Exception $e) {
            DB::rollback();
            // return 'Error Save ';
            return $e->getMessage();
        }
    }

    public function apiMember(Request $request){

        $model = KonfederasiMemberModel::getData($request->id) ;
        // dd($FederasiMemberModel::getData());
        return Datatables::of($model)
                            ->addColumn('delete', function ($model) {
                                return '<a href="#"
                                        class="del_modal"
                                        data-id="'.$model->idx.'" 
                                        data-desc="'.$model->serikat_pekerja_desc.'" 
                                        title="DELETE: '.$model->serikat_pekerja_desc.'">
                                        <span class="icon-trash-alt"></span></a>';
                            })
                            // ->addColumn('url_kta', function ($model) {
                            //     return '<a href="'. url('public' .Storage::url($model->url_kta)). '"
                            //                 target="_blank"
                            //                 title="KTP: '.$model->anggota_nama.'" download>
                            //                 <i class="icon-file-check2"></i></a>';
                            // })
                            ->rawColumns(['delete'])
                            ->addIndexColumn()
                            ->make(true);

    }

    public function destroyMember(Request $request)
    {
        $model = KonfederasiMemberModel::where('id', $request->id)->delete();
        
    }

    public function general($id)
    {   
        $decrypted = Crypt::decrypt($id);     
        $model = SerikatpekerjaModel::where('serikat_pekerja_id', $decrypted)->first();
        $ad = AnggaranDasarModel::where('serikat_pekerja_id', $decrypted)->first();
        return view('konfederasi::KonfederasiGeneralView', compact('model','ad'));

    }

    public function generalSave(Request $request)
    {
        $this->validate($request, [
            // 'serikat_pekerja_desc' => 'required|string|max:255|unique:tr_serikat_pekerja,serikat_pekerja_desc',
            'id_provinsi' => 'required|string|max:255',
            'id_kabupaten' => 'required|string|max:255',
            'id_kecamatan' => 'required|string|max:255',
            'id_desa' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            // 'fax' => 'max:255',
            'telp' => 'required|string|max:255',
            'email' => 'required|string|max:255',

            // 'afiliasi' => 'max:255',
            // 'ns_afiliasi' => 'max:255',
            // 'afiliasi_federasi' => 'max:255',
            // 'ns_afiliasi_federasi' => 'max:255',
            // 'afiliasi_konfederasi' => 'max:255',
            // 'ns_afiliasi_konfederasi' => 'max:255',

            'url_anggaran' => 'required|mimes:jpg,jpeg,png,pdf|max:2000',
            // 'tgl_pembuatan_ad' => 'required|string|max:255',
            // 'tgl_berlaku_ad' => 'required|string|max:255',

            // 'perusahaan' => 'required|string|max:255',

            // 'nama_perusahaan' => 'string|max:255',
            // 'jenis_pekerjaan' => 'string|max:255',
            // 'jumlah_pekerja' => 'string|max:255'
            // 'url_logo' => 'required|mimes:jpg,png,jpeg|max:2000'
        ], 
        [
            'required' => 'Harus di isi.'
            // 'url_ad.mimes' => 'Upload file dengan extention .pdf'
        ]);


        $date = date('Y-m-d');
        $uploadedFile = $request->file('url_anggaran');
        $path = $uploadedFile->store('public/anggaran/'.$date);

        // // $file_logo = $request->file('url_logo');
        // // $path_logo = $file_logo->store('public/logo/'.$date);   

        $id_transaction = $request->serikat_pekerja_id ;
        DB::beginTransaction();
        try {
            $update_sp = array(
                                    // 'serikat_pekerja_id' => $id_transaction,
                                    // 'serikat_pekerja_desc' => $request->serikat_pekerja_desc,
                                    'id_provinsi' => $request->id_provinsi,
                                    'id_kabupaten' => $request->id_kabupaten,
                                    'id_kecamatan' => $request->id_kecamatan,
                                    'id_desa' => $request->id_desa,
                                    'alamat' => $request->alamat,
                                    'fax' => $request->fax,
                                    'telp' => $request->telp,
                                    'email' => $request->email,

                                    // 'afiliasi' => $request->afiliasi,
                                    // 'ns_afiliasi' => $request->ns_afiliasi,
                                    // 'afiliasi_federasi' => $request->afiliasi_federasi,
                                    // 'ns_afiliasi_federasi' => $request->ns_afiliasi_federasi,
                                    'afiliasi_konfederasi' => $request->afiliasi_konfederasi,
                                    'ns_afiliasi_konfederasi' => $request->ns_afiliasi_konfederasi,

                                    // 'perusahaan' => $request->perusahaan,

                                    // 'nama_perusahaan' => $request->nama_perusahaan,
                                    // 'jumlah_pekerja' => $request->jumlah_pekerja,
                                    // 'alamat_perusahaan' => $request->alamat_perusahaan,
                                    // 'jenis_pekerjaan' => $request->jenis_pekerjaan,
                                    // 'nama_singkat' => $request->nama_singkat,
                                    // 'nama_singkat' => $request->afiliasi,
                                    // 'url_logo' => $path_logo,
                                    'created_by' => Auth::user()->user_id,
                                    'created_date' => date('Y-m-d H:i:s')
                                );

            $query2 = AnggaranDasarModel::insert([
                                    'serikat_pekerja_id' => $id_transaction,
                                    'url_ad' => $path,
                                    'keterangan' => $request->keterangan,
                                    'tgl_pembuatan_ad' => $request->tgl_pembuatan_ad,
                                    'tgl_berlaku_ad' => $request->tgl_berlaku_ad,
                                    'created_by' => Auth::user()->user_id,
                                    'created_date' => date('Y-m-d H:i:s')
                                ]);

        $query = SerikatpekerjaModel::where('serikat_pekerja_id', $id_transaction)->update($update_sp) ;

        DB::commit(); 
        Session::flash('notif', 'Data Berhasil Disimpan !!');
        // return redirect('serikatpekerja.anggota');

        return redirect()->route('konfederasi.member', Crypt::encrypt($id_transaction));       

        }catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function proses($id)
    {   
        $decrypted = Crypt::decrypt($id);     
        $model = SerikatpekerjaModel::where('serikat_pekerja_id', $decrypted)->first();
        return view('konfederasi::KonfederasiProsesView', compact('model'));

    }

    public function prosesSave(Request $request)
    {
        $this->validate($request, [
            // 'serikat_pekerja_desc' => 'required|string|max:255|unique:tr_serikat_pekerja,serikat_pekerja_desc',
            'status_sp' => 'required|string|max:255',
            'status_desc' => 'required|string|max:255'
        ], 
        [
            'required' => 'Harus di isi.'
        ]);
        
        $id_transaction = $request->serikat_pekerja_id ;
        $model = SerikatpekerjaModel::where('serikat_pekerja_id', $request->serikat_pekerja_id)->first();
        $kode = SerikatpekerjaModel::get6();
        $skrg = Carbon::now()->format('ymd');
        // dd($kode);
        // dd($skrg.'-'.$model->id_kabupaten.$kode);
        if ($model->no_catat == null) {

            if ($request->status_sp == '3') {

                $no_catat = $skrg.'-'.$model->id_kabupaten.$kode ;
            } else {
                $no_catat = '' ;
            }
        
        } else {
            $no_catat = $model->no_catat ;
        }

        $id_transaction = $request->serikat_pekerja_id ;
        DB::beginTransaction();
        try {


        $query2 = HistoryModel::insert([
                                'serikat_pekerja_id' => $id_transaction,
                                'status_sp' => $request->status_sp,
                                'status_desc' => $request->status_desc,
                                'created_by' => Auth::user()->user_id,
                                'created_date' => date('Y-m-d H:i:s')
                            ]);

        $update_sp = array(
                        'status' => $request->status_sp,
                        'no_catat' => $no_catat,
                        'modified_by' => Auth::user()->user_id,
                        'modified_date' => date('Y-m-d H:i:s')   
                    );
        $model = SerikatpekerjaModel::where('serikat_pekerja_id', $id_transaction)->update($update_sp) ;

        DB::commit(); 
        Session::flash('notif', 'Data Berhasil Disimpan !!');
        return redirect('konfederasi');
        // return redirect()->route('serikatpekerja.anggota', Crypt::encrypt($id_transaction));

        }catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }


    public function kirim($id)
    {
        $decrypted = Crypt::decrypt($id);     
        $model = SerikatpekerjaModel::where('serikat_pekerja_id', $decrypted)->first();
        return view('konfederasi::KonfederasiKirimView', compact('model'));
        
    }

    public function kirimSave(Request $request)
    {
        $update_sp = array(
                        'status' => 2,
                        'kirim_by' => Auth::user()->user_id,
                        'kirim_date' => date('Y-m-d H:i:s')   
                    );
        $model = SerikatpekerjaModel::where('serikat_pekerja_id', $request->id)->update($update_sp) ;

        
        Session::flash('notif', 'Data Berhasil Dikirim !!');
        return redirect('konfederasi');
        
    }


    public function pengurusNext($id)
    {
        return redirect()->route('konfederasi.pengurus', $id );
    }

    public function pengurus($id)
    {   
        $decrypted = Crypt::decrypt($id);     
        $model = SerikatpekerjaModel::where('serikat_pekerja_id', $decrypted)->first();
        return view('konfederasi::KonfederasiPengurusView', compact('model'));

    }

    public function pengurusSave(Request $request)
    {
        $this->validate($request, [
            'pengurus_nik' => 'required|string|max:255|unique:tr_pengurus,pengurus_nik',
            'pengurus_nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'serikat_pekerja_id' => 'required|string|max:255',
            'jk' => 'required|string|max:255',
            'url_ktp' => 'required|mimes:jpg,png,jpeg,pdf|max:2000'

        ],[
            'required' => 'Harus diisi',
            'pengurus_nik.max' => 'Harus 16 Angka',
            'pengurus_nik.min' => 'Harus 16 Angka',
            'mimes' => 'Upload file dengan extention .jpg .jpeg',
            'unique' => 'Data sudah ada'
        ]);

        $date = date('Y-m-d');
        $uploadedFile = $request->file('url_ktp');
        $path = $uploadedFile->store('public/ktp/'.$date);   

        DB::beginTransaction();
        try {
            $query = PengurusModel::insert([
                                    'serikat_pekerja_id' => $request->serikat_pekerja_id,
                                    'pengurus_nik' => $request->pengurus_nik,
                                    'pengurus_nama' => $request->pengurus_nama,
                                    'jabatan' => $request->jabatan,
                                    'no_hp' => $request->no_hp,
                                    'jk' => $request->jk,
                                    'url_ktp' => $path,
                                    'created_by' => Auth::user()->user_id,
                                    'created_date' => date('Y-m-d H:i:s')
                                ]);


        DB::commit(); 
        Session::flash('notif', 'Data Berhasil Disimpan !!');
        return redirect()->back();

        }catch (\Exception $e) {
            DB::rollback();
            // return 'Error Save ';
            return $e->getMessage();
        }
    }

    public function apiPengurus(Request $request)
    {

        $model = PengurusModel::getData()->where('serikat_pekerja_id',$request->id) ;
        return Datatables::of($model)
                            ->addColumn('delete', function ($model) {
                                return '<a href="#"
                                        class="del_modal"
                                        data-id="'.$model->pengurus_nik.'" 
                                        data-desc="'.$model->pengurus_nama.'" 
                                        title="DELETE: '.$model->pengurus_nama.'">
                                        <span class="icon-trash-alt"></span></a>';
                            })
                            ->addColumn('url_ktp', function ($model) {
                                return '<a href="'. url('public' .Storage::url($model->url_ktp)). '"
                                            target="_blank"
                                            title="KTP: '.$model->pengurus_nama.'" download>
                                            <i class="icon-file-check2"></i></a>';
                            })
                            ->rawColumns(['delete','url_ktp'])
                            ->addIndexColumn()
                            ->make(true);

    }

    public function destroyPengurus(Request $request)
    {

        $model = PengurusModel::where('pengurus_nik', $request->id)->delete();
        
    }

    public function detail($id)
    {   
        $decrypted = Crypt::decrypt($id);     
        $model = SerikatpekerjaModel::getDetail()->where('serikat_pekerja_id', $decrypted)->first();
        return view('konfederasi::KonfederasiDetailView', compact('model'));

    }

    public function bukti($id)
    {
        $decrypted = Crypt::decrypt($id);     
        $model = SerikatpekerjaModel::getDetail()->where('serikat_pekerja_id', $decrypted)->first();
        $pdf = PDF::loadview('serikatpekerja::SerikatpekerjaBuktiView',['model'=>$model])->setPaper('a4');
        // return $pdf->download();   
        return $pdf->stream();   
    }

    public function suratPenangguhan($id)
    {
        $decrypted = Crypt::decrypt($id);     
        $model = SerikatpekerjaModel::getDetail()->where('serikat_pekerja_id', $decrypted)->first();
        $pdf = PDF::loadview('serikatpekerja::SerikatpekerjaSuratPenangguhan',['model'=>$model])->setPaper('a4');
        // return $pdf->download();   
        return $pdf->stream();   
    }
}
