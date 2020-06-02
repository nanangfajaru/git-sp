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

<div class="card">
    <div class="card-header header-elements-inline" data-toggle="collapse" href="#accordion-item-default2">
                 <h6 class="card-title"><i class="icon-users4 mr-2"></i> Memproses Konfederasi </h6>
        <div class="header-elements">
            <div class="list-icons">
                <a><i class="icon-arrow-down32"></i></a>
                {{-- <a class="list-icons-item" data-action="remove"></a> --}}
            </div>
        </div>
    </div>

    <div id="accordion-item-default2" class="collapse show" data-parent="#accordion-default">
    
        <form action="{{ route('konfederasi.prosesSave') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}    
            <div class="card-body">
                <div class="row"> 
                        <div class="col-md-12">
                            <div class="form-group" >
                                <label> Konfederasi :</label>
                                    <input type="hidden" class="form-control" placeholder="Text" name="serikat_pekerja_id" autocomplete="off" value=" {{ $model->serikat_pekerja_id}}" id="serikat_pekerja_id">
                                    <input type="text" class="form-control" placeholder="Text" name="serikat_pekerja_desc" autocomplete="off" value=" {{ $model->serikat_pekerja_desc}}" readonly="">
                            </div>
                        </div>
                </div>     
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <legend class=" border-bottom-{{ \Config::get('app.theme') }}"><i class="icon-clipboard5 mr-2"></i>
                            Merubah Status Konfederasi
                        </legend>
                    </div>
                </div>
                <div class="row">
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('status_sp') ? 'has-error' : '' }}">
                                    <label>Rubah Status :</label>
                                    <select class="form-group select" name="status_sp">
                                      <option value="">- PILIH - </option>
                                      <option value="1">OPEN</option>
                                      <option value="3">DICATAT</option>
                                      <option value="4">DI TANGGUHKAN</option>
                                      <option value="5">PENCABUTAN SEMENTARA</option>
                                      <option value="6">PENCABUTAN PERMANEN</option>
                                    </select>

                                    <span class="text-danger">{{ $errors->first('status_sp') }}</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group {{ $errors->has('status_desc') ? 'has-error' : '' }}">
                                    <label>Keterangan :</label>
                                    <input type="text" class="form-control" placeholder="Enter text" name="status_desc"  autocomplete="off" value="{{ old('status_desc') }}" required="" >
                                    <span class="text-danger">{{ $errors->first('status_desc') }}</span>
                                </div>
                            </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-10">
                        <a href="{{ url(Request::segment(1)) }}" class="btn btn-sm bg-grey"><i class="icon-arrow-left13 mr-2"></i>Back</a>
                        <button type="submit" class="btn bg-{{ \Config::get('app.theme')}}">Save <i class="icon-floppy-disk ml-2"></i></button>
                    </div>
                </div>

            </div>
        </form>
    
    </div>
</div>


@endsection
@push('scripts')
      
  <script src="{{asset('template/global_assets/js/plugins/ui/moment/moment.min.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/daterangepicker.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/anytime.min.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/pickadate/picker.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/pickadate/picker.date.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/pickadate/picker.time.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/pickadate/legacy.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/pickers/jquery-ui.js ')}}"></script>

  <script src="{{asset('template/global_assets/js/demo_pages/picker_date.js')}}"></script>

  {{-- <script src="{{asset('template/global_assets/js/plugins/ui/ripple.min.js')}}"></script> --}}
  <script src="{{asset('template/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js') }}"></script>
  <script src="{{asset('template/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
  <script src="{{asset('template/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
  <script src="{{asset('template/global_assets/js/demo_pages/uploader_bootstrap.js') }}"></script>
  
@endpush