<?php

namespace Modules\Roles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Routing\Controller;

use App\Http\Controllers\Controller;

use Modules\Roles\Entities\RolesModel;
use DataTables;
use Auth;
use Session;
use Crypt;
use Illuminate\Support\Facades\DB;
use CustomHelper;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('roles::RolesIndexView');
    }

    public function api(){

        $model = RolesModel::getData() ;
        return Datatables::of($model)
                            ->addColumn('edit', function ($model) {
                                return '<a href="'.route('roles.edit', Crypt::encrypt($model->role_id) ).'" 
                                            title="EDIT: '.$model->role_desc.'">
                                            <i class="icon-pencil5"></i></a>';
                            })
                            ->addColumn('delete', function ($model) {
                                return '<a href="#"
                                        class="del_modal"
                                        data-id="'.$model->role_id.'" 
                                        data-desc="'.$model->role_desc.'" 
                                        title="DELETE: '.$model->role_desc.'">
                                        <span class="icon-trash-alt"></span></a>';
                            })
                            ->addColumn('setupMenu', function ($model) {
                                return '<a href="'.route('roles.setupMenu', Crypt::encrypt($model->role_id) ).'" 
                                            title="Setup Menu - '.$model->role_desc.'">
                                            <i class="icon-cog3"></i></a>';
                            })
                            ->rawColumns(['edit','delete','setupMenu'])
                            ->addIndexColumn()
                            ->make(true);


    }

    public function create(){
        return view('roles::RolesCreateView');
    }

    public function createSave(Request $request){
        $this->validate($request, [
            'role_id' => 'required|string|max:255|unique:mstr_role,role_id',
            'role_desc' => 'required|string|max:255'
        ]);

        DB::beginTransaction();
        try {
            $query = RolesModel::insert([
                                    'role_id' => strtoupper($request->role_id), 
                                    'role_desc' => $request->role_desc,
                                    'created_by' => Auth::user()->user_id,
                                    'created_date' => date('Y-m-d H:i:s')
                                ]);
        DB::commit(); 
        Session::flash('notif', 'Successfully Saved !!');
        return redirect('roles');

        }catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function edit($id){
        $decrypted = Crypt::decrypt($id);
        $model = RolesModel::where('role_id', $decrypted)->first();
        return view('roles::RolesEditView', compact('model'));
    }


    public function editSave(Request $request){
        $this->validate($request, [
            'role_desc' => 'required|string|max:255'
        ]);

        $data_upt  = array( 
                            'role_desc' =>  $request->role_desc,
                            'changed_by' => Auth::user()->user_id,
                            'changed_date' => date('Y-m-d H:i:s')   
                        );
        
        $query = RolesModel::where('role_id', $request->role_id)->update($data_upt) ;

        if ($query) {          
            Session::flash('notif', 'Successfully Updated !!');
            return redirect('roles');
        }else{
            return 'FALSE' ;
        } 
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = RolesModel::where('role_id', $request->id)->delete();        
            DB::table('tr_menu')->where('role_id', $request->id)->delete();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            // throw $e;
            return $e->getMessage();
        }

    }

    public function setupMenu($id){        
        $decrypted = Crypt::decrypt($id);
        $model = RolesModel::where('role_id', $decrypted)->first();
        $selectedRoles = DB::table('tr_menu')->where('role_id', $decrypted)->pluck('menu_id')->toArray();
        return view('roles::RolesSetupMenuView', compact('model','selectedRoles'));
    }


    public function setupMenuSave(Request $request){

        DB::beginTransaction();
        try {
        DB::table('tr_menu')->where('role_id', $request->role_id)->delete();

            if ($request->checkbox_menu != null) {              
                foreach ($request->checkbox_menu as $key => $value) {
                
                DB::table('tr_menu')->insert([
                            'role_id' => $request->role_id,
                            'menu_id' => $value,                                
                            'created_by' => Auth::user()->user_id,
                            'created_date' => date('Y-m-d H:i:s')
                        ]);
                }
            }

            DB::commit();
            Session::flash('notif', 'Successfully Setup Menu !!');
            return redirect('roles');

        } catch (\Throwable $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }
}
