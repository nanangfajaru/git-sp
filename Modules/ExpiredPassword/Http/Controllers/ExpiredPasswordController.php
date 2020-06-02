<?php

namespace Modules\ExpiredPassword\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;

use Modules\Users\Entities\UsersModel;
use DataTables;
use Auth;
use Session;
use Crypt;
use Illuminate\Support\Facades\DB;
use Hash;


class ExpiredPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($id){
        $decrypted = Crypt::decrypt($id);
        $model = UsersModel::where('user_id', $decrypted)->first();
        return view('expiredpassword::EpView',compact('model'));
    }

    public function save(Request $request){

        $this->validate($request, [
            'old_password'          => 'required|min:3',
            'password'              => 'required|min:3|different:old_password|confirmed',
            'password_confirmation' => 'required|min:3',
        ]); 

        if (!Hash::check($request->old_password, $request->user()->password)) {

            Session::flash('notif', 'Old password is not correct !!');
            return redirect()->back();
        }else{

            $data_upt  = array( 
                      'password' => bcrypt($request->password),
                      'password_changed_date' => date('Y-m-d H:i:s')
                    );

            $query = UsersModel::where('user_id', $request->user()->user_id)->update($data_upt);
            
            if ($query) {          
                Session::flash('cp', 'xxx');
                return redirect()->back();
            }else{
                return 'FALSE' ;
            } 


        }
    }
}
