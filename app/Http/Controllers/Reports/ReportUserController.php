<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Excel;
use Illuminate\Support\Facades\DB;


class ReportUserController extends Controller
{
    public function rpt_user(){
        $dropdown_role = \App\Model\RoleModel::where('status', 1)->orderBy('role_desc')->pluck('role_desc', 'role_id');
    	return view('ReportUser.viewUser', compact('dropdown_role'));
    }

    public function api(Request $request){

    	$query = \App\Model\UsersModel::getData() ;
     	$data = $query ;

     	// Parameter
        if ($request->role_id) {
               $data = $query->where('role_id', $request->get('role_id') );
        }

    	$datatables =  Datatables::of($data) ;
        return $datatables
        	   ->addIndexColumn()
        	   ->make(true);
    }

    public function download(Request $request)
    {
        $now = date('Y-m-d H:i:s') ;
        return Excel::download(new \App\Exports\UsersExport($request->role_id), 'UserReport_"'.$now.'".xlsx');

    }
}
