<?php

namespace Modules\AdKadaluarsa\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Routing\Controller;

use App\Http\Controllers\Controller;

use Modules\AdKadaluarsa\Entities\AdKadaluarsaModel;
use DataTables;
use Auth;
use Session;
use Crypt;
use Illuminate\Support\Facades\DB;
use CustomHelper;
use Modules\Serikatpekerja\Helper\HelperSerikatPekerja;

class AdKadaluarsaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('adkadaluarsa::AdKadaluarsaIndexView');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('adkadaluarsa::create');
    }

    public function api(){

        $model = AdKadaluarsaModel::getData() ;
        return Datatables::of($model)
                            // ->addColumn('edit', function ($model) {
                            //     return '<a href="'.route('roles.edit', Crypt::encrypt($model->role_id) ).'" 
                            //                 title="EDIT: '.$model->role_desc.'">
                            //                 <i class="icon-pencil5"></i></a>';
                            // })
                            // ->addColumn('delete', function ($model) {
                            //     return '<a href="#"
                            //             class="del_modal"
                            //             data-id="'.$model->role_id.'" 
                            //             data-desc="'.$model->role_desc.'" 
                            //             title="DELETE: '.$model->role_desc.'">
                            //             <span class="icon-trash-alt"></span></a>';
                            // })
                            // ->addColumn('setupMenu', function ($model) {
                            //     return '<a href="'.route('roles.setupMenu', Crypt::encrypt($model->role_id) ).'" 
                            //                 title="Setup Menu - '.$model->role_desc.'">
                            //                 <i class="icon-cog3"></i></a>';
                            // })
                            
                            ->addColumn('status', function ($model) {
                                return HelperSerikatPekerja::getKategori($model->kategori) ;
                            })
                            ->addColumn('statusAD', function ($model) {
                                return HelperSerikatPekerja::getStatusAD($model->tgl_berlaku_ad) ;
                            })
                            ->rawColumns(['status','statusAD'])
                            ->addIndexColumn()
                            ->make(true);


    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('adkadaluarsa::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('adkadaluarsa::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
