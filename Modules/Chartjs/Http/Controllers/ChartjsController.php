<?php

namespace Modules\Chartjs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Chartjs\Entities\ChartjsModel;

class ChartjsController extends Controller
{


    public function index()
    {   
        $dataCount = ChartjsModel::getData()->pluck('count_provinsi')->toArray() ;
        $dataChart = ChartjsModel::getData()->pluck('count_provinsi') ;
        $label = ChartjsModel::getData()->pluck('nama_provinsi')->toArray() ;
        $labelChart = ChartjsModel::getData()->pluck('nama_provinsi') ;

        $pie = app()->chartjs
                    ->name('pieChartTest')
                    ->type('pie')
                    ->size(['width' => 400, 'height' => 200])
                    ->labels($label)
                    ->datasets([
                        [
                            'backgroundColor' => ['#FF6384', '#36A2EB', 'teal','indigo'],
                            'hoverBackgroundColor' => ['#FF6384', '#36A2EB', 'teal','indigo'],
                            'data' => $dataCount
                        ]
                    ])
                    ->optionsRaw([
                        'plugins' => [
                            'datalabels' => [
                                'color' => 'white',
                                // 'anchor' => 'end',
                                // 'align: ' => 'start',
                                // 'backgroundColor' => 'red',
                                // 'borderColor' => 'white',
                                // 'borderRadius' => 25,
                                // 'borderWidth' => 2,
                                'formatter' => 'Math.round'
                            ]
                        ],
                        'legend' => [
                            'position' => 'right',
                            'fullWidth' => false,
                        ],
                    ]);

        
        return view('chartjs::ChartjsIndexView',compact('pie','labelChart','dataChart'));
    }

    public function yk()
    { 

        $count_balai = ChartjsModel::getYkJk()->pluck('count_jk')->toArray() ;
        // $id_balai = ChartjsModel::getData()->pluck('id_balai')->toArray() ;

        $pie = app()->chartjs
                    ->name('pieChartTest')
                    ->type('pie')
                    ->size(['width' => 400, 'height' => 200])
                    ->labels(['Laki - Laki','Perempuan'])
                    ->datasets([
                        [
                            'backgroundColor' => ['#36A2EB','#FF6384'],
                            'hoverBackgroundColor' => ['#36A2EB','#FF6384'],
                            'data' => $count_balai
                        ]
                    ])
                    ->optionsRaw([
                        'plugins' => [
                            'datalabels' => [
                                'color' => 'white',
                                // 'anchor' => 'end',
                                // 'align: ' => 'start',
                                // 'backgroundColor' => 'red',
                                // 'borderColor' => 'white',
                                // 'borderRadius' => 25,
                                // 'borderWidth' => 2,
                                'formatter' => 'Math.round'
                            ]
                        ],
                        'legend' => [
                            'position' => 'right',
                            'fullWidth' => false,
                        ],
                    ]);
        // -------------------------------------------------

        $count = ChartjsModel::getYkKerja()->pluck('count_prov')->toArray() ;
        $label = ChartjsModel::getYkKerja()->pluck('prov')->toArray() ;
        // dd($label);

        $pendidikan = app()->chartjs
                    ->name('chartPendidikan')
                    ->type('pie')
                    ->size(['width' => 400, 'height' => 200])
                    ->labels($label)
                    ->datasets([
                        [
                            'backgroundColor' => ['#36A2EB','#FF6384','red','#00b33c','#cccc00','silver',],
                            'hoverBackgroundColor' => ['#36A2EB','#FF6384','red','#00b33c','#cccc00','silver',],
                            'data' => $count
                        ]
                    ])
                    ->optionsRaw([
                        'plugins' => [
                            'datalabels' => [
                                'color' => 'white',
                                // 'anchor' => 'end',
                                // 'align: ' => 'start',
                                // 'backgroundColor' => 'red',
                                // 'borderColor' => 'white',
                                // 'borderRadius' => 25,
                                // 'borderWidth' => 2,
                                'formatter' => 'Math.round'
                            ]
                        ],
                        'legend' => [
                            'position' => 'right',
                            'fullWidth' => false,
                        ],
                    ]);

        return view('chartjs::ykView',compact('pie','pendidikan'));

    }

    public function bj()
    { 

        $count_balai = ChartjsModel::getBjJk()->pluck('count_jk')->toArray() ;
        // $id_balai = ChartjsModel::getData()->pluck('id_balai')->toArray() ;

        $pie = app()->chartjs
                    ->name('pieChartTest')
                    ->type('pie')
                    ->size(['width' => 400, 'height' => 200])
                    ->labels(['Laki - Laki','Perempuan'])
                    ->datasets([
                        [
                            'backgroundColor' => ['#36A2EB','#FF6384'],
                            'hoverBackgroundColor' => ['#36A2EB','#FF6384'],
                            'data' => $count_balai
                        ]
                    ])
                    ->optionsRaw([
                        'plugins' => [
                            'datalabels' => [
                                'color' => 'white',
                                // 'anchor' => 'end',
                                // 'align: ' => 'start',
                                // 'backgroundColor' => 'red',
                                // 'borderColor' => 'white',
                                // 'borderRadius' => 25,
                                // 'borderWidth' => 2,
                                'formatter' => 'Math.round'
                            ]
                        ],
                        'legend' => [
                            'position' => 'right',
                            'fullWidth' => false,
                        ],
                    ]);
        // -------------------------------------------------

        $count = ChartjsModel::getBjKerja()->pluck('count_prov')->toArray() ;
        $label = ChartjsModel::getBjKerja()->pluck('prov')->toArray() ;
        // dd($label);

        $pendidikan = app()->chartjs
                    ->name('chartPendidikan')
                    ->type('pie')
                    ->size(['width' => 400, 'height' => 200])
                    ->labels($label)
                    ->datasets([
                        [
                            'backgroundColor' => ['#36A2EB','#FF6384','red','#00b33c','#cccc00','silver',],
                            'hoverBackgroundColor' => ['#36A2EB','#FF6384','red','#00b33c','#cccc00','silver',],
                            'data' => $count
                        ]
                    ])
                    ->optionsRaw([
                        'plugins' => [
                            'datalabels' => [
                                'color' => 'white',
                                // 'anchor' => 'end',
                                // 'align: ' => 'start',
                                // 'backgroundColor' => 'red',
                                // 'borderColor' => 'white',
                                // 'borderRadius' => 25,
                                // 'borderWidth' => 2,
                                'formatter' => 'Math.round'
                            ]
                        ],
                        'legend' => [
                            'position' => 'right',
                            'fullWidth' => false,
                        ],
                    ]);

        return view('chartjs::bjView',compact('pie','pendidikan'));

    }



}
