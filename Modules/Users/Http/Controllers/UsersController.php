<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;

use Modules\Users\Entities\UsersModel;
use Modules\Roles\Entities\RolesModel;
use Modules\Setting\Entities\SettingModel;
use DataTables;
use Auth;
use Session;
use Crypt;
use Illuminate\Support\Facades\DB;
use CustomHelper;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('users::UserIndexView');
    }

    public function api(){

        if (Auth::user()->role_id == 'SYS' ) {
           $model = UsersModel::getDataSys() ;
        }else{
           $model = UsersModel::getData() ;        
       }
        
        return Datatables::of($model)
                            ->addColumn('edit', function ($model) {
                                return '<a href="'.route('users.edit', Crypt::encrypt($model->user_id) ).'" 
                                            title="EDIT: '.$model->name.'">
                                            <i class="icon-pencil5"></i></a>';
                            })
                            ->addColumn('delete', function ($model) {
                                return '<a href="#"
                                        class="del_modal"
                                        data-id="'.$model->user_id.'" 
                                        data-desc="'.$model->name.'" 
                                        title="DELETE: '.$model->name.'">
                                        <span class="icon-trash-alt"></span></a>';
                            })            
                            ->addColumn('cp', function ($model) {
                                return '<a href="'.route('users.cp', Crypt::encrypt($model->user_id) ).'" 
                                            title="Change Password: '.$model->name.'">
                                            <i class="icon-lock2"></i></a>';
                            })
                            ->rawColumns(['edit','delete','cp'])
                            ->addIndexColumn()
                            ->make(true);

    }

    public function create(){

        if (Auth::user()->role_id == 'SYS' ) {
           $dropdown_role = RolesModel::where('status', 1)->orderBy('role_desc')->pluck('role_desc', 'role_id');
        }else{
           $dropdown_role = RolesModel::where('status', 1)->where('role_id','!=','SYS')->orderBy('role_desc')->pluck('role_desc', 'role_id');   
        }
        
        // $dropdown_balai = SettingModel::where('status', 1)->where('setting_key','balai')->orderBy('setting_desc')->pluck('setting_desc', 'setting_value');
        return view('users::UserCreateView', compact('dropdown_role'));
    }

    public function createSave(Request $request){
        $this->validate($request, [
            'username' => 'required|string|max:255|unique:users,username',
            'name' => 'required|string|max:255',
            'password' => 'required|max:255|min:3',
            // 'email' => 'required|email|max:255|unique:users,user_id',
            'role_id' => 'required|string|max:255',
        ]);

        $query = UsersModel::insert([
                                'user_id' => CustomHelper::getAutoNumberUsr('users','USR'),
                                'username' => $request->username,
                                'name' => $request->name,
                                'password' => bcrypt($request->password),
                                'id_provinsi' => $request->id_provinsi,
                                'id_kabupaten' => $request->id_kabupaten,
                                'role_id' => $request->role_id,
                                'created_by' => Auth::user()->user_id,
                                'created_date' => date('Y-m-d H:i:s')
                            ]);

        if ($query) {          
            Session::flash('notif', 'Succesfully Saved !!');
            return redirect('users');
        }else{
            return 'FALSE' ;
        } 
    }

    public function edit($id){
        $decrypted = Crypt::decrypt($id);
        
        if (Auth::user()->role_id == 'SYS' ) {
           $dropdown_role = RolesModel::where('status', 1)->orderBy('role_desc')->pluck('role_desc', 'role_id');
        }else{
           $dropdown_role = RolesModel::where('status', 1)->where('role_id','!=','SYS')->orderBy('role_desc')->pluck('role_desc', 'role_id');   
        }
        
        $dropdown_balai = SettingModel::where('status', 1)->where('setting_key','balai')->orderBy('setting_desc')->pluck('setting_desc', 'setting_value');
        $model = UsersModel::where('user_id', $decrypted)->first();
        return view('users::UserEditView', compact('dropdown_role','model','dropdown_balai'));
        
    }


    public function editSave(Request $request){
        $this->validate($request, [
            'username' => 'required|string|max:255|unique:users,username,'.$request->id,
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|max:255|unique:users,email,'.$request->id,
            'role_id' => 'required|string|max:255',
        ]);

        $data_upt  = array( 
                            'username' => $request->username,
                            'name' => $request->name,
                            // 'id_balai' => $request->balai,
                            'id_provinsi' => $request->id_provinsi,
                            'id_kabupaten' => $request->id_kabupaten,
                            'role_id' => $request->role_id,
                            'changed_by' => Auth::user()->user_id,
                            'changed_date' => date('Y-m-d H:i:s')   
                        );
        $query = UsersModel::where('user_id', $request->user_id)->update($data_upt) ;

        if ($query) {          
            Session::flash('notif', 'Succesfully Updated !!');
            return redirect('users');
        }else{
            return 'FALSE' ;
        } 
    }

    public function destroy(Request $request)
    {

        $model = UsersModel::where('user_id', $request->id)->delete();
        
    }

    public function cp($id){
        $decrypted = Crypt::decrypt($id);
        $model = UsersModel::where('user_id', $decrypted)->first();
        return view('users::UserCpView', compact('model'));
    }

    public function cpSave(Request $request)
    {
        $this->validate($request, [
            'new_pwd' => 'required|min:3'
        ]);

        $data_upt  = array( 
                  'password' => bcrypt($request->new_pwd),
                  'password_changed_date' => date('Y-m-d H:i:s')
                );

        $query = UsersModel::where('user_id', $request->user_id)->update($data_upt);
        
        if ($query) {          
            Session::flash('notif', 'Succesfully Changed Password !!');
            return redirect('users');
        }else{
            return 'FALSE' ;
        } 
    }

    public function getProvinsi(Request $request)
    {
        $query = DB::table('ref_provinsi')
                  // ->where('uke_level', '4') 
                  ->orderBy('id_provinsi') 
                  ->get();
        $data = $query ; 

            // if ($request->where) {
            //     $data = $query->where('uke_parent', $request->where );
            //     $data->all();
            // }

          echo  '<option value="">- Pilih -</option>';
          foreach ($data as $row) 
          {
            if($row->id_provinsi == $request->idSelected)
            {
              $selected = "selected"  ;
            }else{
              $selected = ""  ;
            }
            echo '<option value="'.$row->id_provinsi.'" '.$selected.'>'.$row->nama_provinsi.'</option>';
          }
    }
    public function getKabupaten(Request $request)
    {
        $query = DB::table('ref_kabupaten')
                  // ->where('uke_level', '4') 
                  ->orderBy('id_kabupaten') 
                  ->get();
        $data = $query ; 

            if ($request->id_provinsi) {
                $data = $query->where('par_kabupaten', $request->id_provinsi );
                $data->all();
            }

          echo  '<option value="">- Pilih -</option>';
          foreach ($data as $row) 
          {
            if($row->id_kabupaten == $request->idSelected)
            {
              $selected = "selected"  ;
            }else{
              $selected = ""  ;
            }
            echo '<option value="'.$row->id_kabupaten.'" '.$selected.'>'.$row->nama_kabupaten.'</option>';
          }
    }
}
