<?php

namespace Modules\Menus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;

use Modules\Menus\Entities\MenusModel;
use DataTables;
use Auth;
use Session;
use Crypt;
use Illuminate\Support\Facades\DB;
use CustomHelper;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(){
        return view('menus::.MenusIndexView');
    }

    public function api(){

        $model = MenusModel::getData() ;
        return Datatables::of($model)
                            ->addColumn('edit', function ($model) {
                                return '<a href="'.route('menus.edit', Crypt::encrypt($model->menu_id) ).'" 
                                            title="EDIT: '.$model->menu_desc.'">
                                            <i class="icon-pencil5"></i></a>';
                            })
                            ->addColumn('delete', function ($model) {
                                return '<a href="#"
                                        class="del_modal"
                                        data-id="'.$model->menu_id.'" 
                                        data-desc="'.$model->menu_desc.'" 
                                        title="DELETE: '.$model->menu_desc.'">
                                        <span class="icon-trash-alt"></span></a>';
                            })
                            ->addColumn('css_class', function ($model) {
                                return '<span><span class="'.$model->menu_icon.'"></span> '.$model->menu_icon.'</span>';
                            })
                            ->addColumn('parent', function ($model) {
                                return '<span>'.CustomHelper::getDescParent($model->menu_parent).'</span>';
                            })
                            ->rawColumns(['css_class','edit','delete','parent'])
                            ->addIndexColumn()
                            ->make(true);
    }

    public function create(){
        return view('menus::MenusCreateView');
    }

    public function getSeq(Request $request){
        return CustomHelper::getSequence($request->idSelected);
    }

    public function getPar(Request $request){
        return CustomHelper::getParent($request->menu_seq,$request->idSelected);
    }

    public function createSave(Request $request){
        $this->validate($request, [
            'menu_desc' => 'required|string|max:255',
            'menu_url' => 'required|string|max:255|unique:mstr_menu,menu_url',
            'menu_icon' => 'required|string|max:255',
            'menu_seq' => 'required|string|max:255',
            'menu_parent' => 'required|string|max:255'
        ]);
        if ($request->menu_seq == 1) {
            $kode = 'M' ;    
        }elseif($request->menu_seq == 2){
            $kode = 'SM' ;
        }else{
            $kode = 'TM' ;
        }
        $query = MenusModel::insert([
                                'menu_id' => CustomHelper::getAutoNumber('mstr_menu', $kode), 
                                'menu_desc' => $request->menu_desc,
                                'menu_url' => $request->menu_url,
                                'menu_icon' => $request->menu_icon,
                                'menu_seq' => $request->menu_seq,
                                'menu_parent' => $request->menu_parent,
                                'created_by' => Auth::user()->user_id,
                                'created_date' => date('Y-m-d H:i:s')
                            ]);

        if ($query) {          
            Session::flash('notif', 'Succesfully Saved !!');
            return redirect('menus');
        }else{
            return 'FALSE' ;
        } 
    }

    public function edit($id){
        $decrypted = Crypt::decrypt($id);
        $model = MenusModel::where('menu_id', $decrypted)->first();
        return view('menus::MenusEditView', compact('model'));

    }


    public function editSave(Request $request){
        $this->validate($request, [
            'menu_desc' => 'required|string|max:255',
            'menu_url' => 'required|string|max:255|unique:mstr_menu,menu_url,'.$request->id,
            'menu_icon' => 'required|string|max:255',
            'menu_seq' => 'required|string|max:255',
            'menu_parent' => 'required|string|max:255'
        ]);

        $data_upt  = array( 
                            'menu_desc' => $request->menu_desc,
                            'menu_url' => $request->menu_url,
                            'menu_icon' => $request->menu_icon,
                            'menu_seq' => $request->menu_seq,
                            'menu_parent' => $request->menu_parent,
                            'changed_by' => Auth::user()->user_id,
                            'changed_date' => date('Y-m-d H:i:s')   
                        );
        $query = MenusModel::where('menu_id', $request->menu_id)->update($data_upt) ;

        if ($query) {          
            Session::flash('notif', 'Successfully Updated !!');
            return redirect('menus');
        }else{
            return 'FALSE' ;
        } 
    }

    public function destroy(Request $request)
    {
        $model = MenusModel::where('menu_id', $request->id)->delete();
    }
}
