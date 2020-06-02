@extends('layouts.layouts')

@section('content')        

@if(Session::has('notif'))
    {{-- <div class="alert bg-teal-400">
        <a class="close" data-dismiss="alert">&times;</a>
        <span> <b>{{Session::get('notif')}}  </b></span>
    </div> --}}
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() { 
                var notif = '{{Session::get('notif')}}';
                toastrAlert(notif); 
            });
        </script>
    @endpush
@endif
<div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="col-md-12">
                <legend class="font-weight-semibold border-bottom-teal-400"><i class="icon-pie-chart mr-2"></i> Jumlah Serikat Pekerja Per Provinsi </legend>
                </div>
                <div class="card-body">
                   {!! $pie->render() !!}
                   
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="col-md-12">
                <legend class="font-weight-semibold border-bottom-teal-400"><i class="icon-user mr-2"></i> Jumlah Serikat Pekerja Per Kabupaten </legend>
                </div>
                <div class="card-body">
                    <canvas id="canvas"></canvas>
                </div>
            </div>
        </div>
</div>  

@endsection

@push('scripts')
    <script src="{{asset('template/custom/chartjs/Chart.js ')}}"></script>
    {{-- <script src="{{asset('template/custom/chartjs/Chart.min.js ')}}"></script> --}}
    <script src="{{asset('template/custom/chartjs/plugin-datalabels/chartjs-plugin-datalabels.js ')}}"></script>

    <script type="text/javascript">

        var ctx = document.getElementById("canvas").getContext("2d");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                    datasets: [{
                        data: {!! $dataChart !!} ,
                        backgroundColor: [
                            '#FF6384', '#36A2EB', 'teal','indigo'
                        ]
                    }],
                    labels: {!! $labelChart !!},
                },
            options: {
                    responsive: true,
                    plugins: {
                        datalabels: {
                        color: 'white',
                        font: {
                          weight: 'bold',
                          size: 16,
                        }
                      }
                    },
                    legend: {
                        position: 'right',
                    }
                },
            
        });
       
    </script>

@endpush
