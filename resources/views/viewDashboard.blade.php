@extends('layouts.layouts')

@section('content')

        @if(Session::has('notif'))
            <div class="alert bg-danger">
                <a class="close" data-dismiss="alert">&times;</a>
                <span> <b>{{Session::get('notif')}}  </b></span>
            </div>
        @endif

        {{-- <div class="row">
          <div class="col-md-12">

            <!-- Horizontal form -->
            <div class="card">
              <div class="card-header header-elements-inline">
                <h5 class="card-title">Home</h5>
                <div class="header-elements">
                  <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                  </div>
                </div>
              </div>

              <div class="card-body">
              Hello, {{ Auth::user()->name}}</p>
              </div>
            </div>
            <!-- /horizotal form -->

          </div>
        </div> --}}

        <div class="row">
          <div class="col-md-12 col-lg-4">
              <div class="card">
                  <div class="col-md-12">
                  <legend class="font-weight-semibold border-bottom-teal-400"><i class="icon-pie-chart mr-2"></i> Serikat Pekerja </legend>
                  </div>
                  <div class="card-body">
                    {{-- {!! $pie->render() !!} --}}
                    <canvas id="canvas"></canvas>
                    
                  </div>
              </div>
          </div>
          <div class="col-md-12 col-lg-4">
              <div class="card">
                  <div class="col-md-12">
                  <legend class="font-weight-semibold border-bottom-teal-400"><i class="icon-pie-chart4 mr-2"></i> Federasi</legend>
                  </div>
                  <div class="card-body">
                      <canvas id="canvas"></canvas>
                  </div>
              </div>
          </div>
          <div class="col-md-12 col-lg-4">
              <div class="card">
                  <div class="col-md-12">
                  <legend class="font-weight-semibold border-bottom-teal-400"><i class="icon-pie-chart3 mr-2"></i> Konfederasi</legend>
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
                