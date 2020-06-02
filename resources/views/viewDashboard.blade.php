@extends('layouts.layouts')

@section('content')

        @if(Session::has('notif'))
            <div class="alert bg-danger">
                <a class="close" data-dismiss="alert">&times;</a>
                <span> <b>{{Session::get('notif')}}  </b></span>
            </div>
        @endif

        <div class="row">
					<div class="col-sm-12 col-xl-4">
						<div class="card card-body bg-blue-400 has-bg-image">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-0">54,390</h3>(e.g)
									<span class="text-uppercase font-size-xs">Total Serikat Pekerja Tercatat</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-clipboard2 icon-3x opacity-75"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-xl-4">
						<div class="card card-body bg-danger-400 has-bg-image">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-0">389,438</h3>(e.g)
									<span class="text-uppercase font-size-xs">Total Federasi Tercatat</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-clipboard3 icon-3x opacity-75"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-xl-4">
						<div class="card card-body bg-success-400 has-bg-image">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-stack-text icon-3x opacity-75"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="mb-0">652,549</h3>(e.g)
									<span class="text-uppercase font-size-xs">Total Konfederasi Tercatat</span>
								</div>
							</div>
						</div>
					</div>
        </div>
        

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
                