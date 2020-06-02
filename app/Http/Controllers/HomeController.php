<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Chartjs\Entities\ChartjsModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataChart = ChartjsModel::getData()->pluck('count_provinsi') ;
        $labelChart = ChartjsModel::getData()->pluck('nama_provinsi') ;

        return view('viewDashboard', compact('dataChart','labelChart'));
    }
}
