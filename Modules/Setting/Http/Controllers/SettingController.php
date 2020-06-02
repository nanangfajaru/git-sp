<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Routing\Controller;

use App\Http\Controllers\Controller;

use Modules\Setting\Entities\SettingModel;
use Modules\Setting\Entities\PejabatModel;
use DataTables;
use Auth;
use Session;
use Crypt;
use Illuminate\Support\Facades\DB;
use CustomHelper;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

   public function index(){
        $exp_cp = SettingModel::where('setting_key','exp_cp')->first();
        return view('setting::SettingIndexView', compact('exp_cp'));
    }

    public function save(Request $request){
     $this->validate($request, [
            'expired_password' => 'required|int|min:30'
        ]);

        DB::beginTransaction();

        try {
            $dataExpCp  = array( 
                            'setting_value' =>  $request->expired_password,
                            'changed_by' => Auth::user()->user_id,
                            'changed_date' => date('Y-m-d H:i:s')   
                             );

            $queryExpCp = SettingModel::where('setting_key', 'exp_cp')->update($dataExpCp) ;

            DB::commit();
            Session::flash('notif', 'Successfully Saved !!');
            return redirect()->back();

        } catch (\Throwable $e) {
            DB::rollback();
            // throw $e;
            // return $e->getMessage();
            return 'FALSE' ;
        }
    }

    public function pejabat(){
        $pejabat = PejabatModel::where('id_kabupaten', Auth::user()->id_kabupaten )->first();
        // return view('setting::SettingIndexView', compact('exp_cp'));

        return view('setting::SettingView', compact('pejabat')) ;
    }

    public function pejabatSave(Request $request){
     $this->validate($request, [
            'nama_jabatan' => 'required|string|max:255',
            'nama_pejabat' => 'required|string|max:255'
        ]);

        DB::beginTransaction();

        try {
            $query2 = PejabatModel::
                                // insert([
                                //     'nama_pejabat' => $request->nama_pejabat,
                                //     'nama_jabatan' => $request->nama_jabatan,
                                //     'created_by' => Auth::user()->user_id,
                                //     'created_date' => date('Y-m-d H:i:s')
                                // ]);
                                updateOrCreate(
                                                ['id_kabupaten' => Auth::user()->id_kabupaten ],
                                                [
                                                    'nama_pejabat' => $request->nama_pejabat,
                                                    'nama_jabatan' => $request->nama_jabatan,
                                                    'id_provinsi' => Auth::user()->id_provinsi,
                                                    // 'id_kabupaten' => $request->id_kabupaten,
                                                    'created_by' => Auth::user()->user_id,
                                                    'created_date' => date('Y-m-d H:i:s')
                                                ]);

            DB::commit();
            Session::flash('notif', 'Successfully Saved !!');
            return redirect()->back();

        } catch (\Throwable $e) {
            DB::rollback();
            // throw $e;
            return $e->getMessage();
            // return 'FALSE' ;
        }
    }

}
