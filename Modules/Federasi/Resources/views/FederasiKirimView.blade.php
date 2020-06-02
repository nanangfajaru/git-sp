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
                 <h6 class="card-title"><i class="icon-shield2 mr-2"></i> Kirim Persetujuan Federasi </h6>
        <div class="header-elements">
            <div class="list-icons">
                <a><i class="icon-arrow-down32"></i></a>
                {{-- <a class="list-icons-item" data-action="remove"></a> --}}
            </div>
        </div>
    </div>

    <form action="{{ route('federasi.kirimSave') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}  
        <div id="accordion-item-default2" class="collapse show" data-parent="#accordion-default"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Federasi :</label>
                                <input type="hidden" class="form-control" placeholder="Text" name="id" autocomplete="off" value=" {{ $model->serikat_pekerja_id}}" id="serikat_pekerja_id">
                                 <input type="text" class="form-control" placeholder="Nama" name="serikat_pekerja_desc" required="" autocomplete="off" value="{{ $model->serikat_pekerja_desc }}" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Nama Singkat Federasi :</label>
                                 <input type="text" class="form-control" placeholder="Nama Singkat" name="nama_singkat" required="" autocomplete="off" value="{{ $model->nama_singkat }}" readonly="">
                            </div>
{{--                             <div class="form-group">
                                <label>Afiliasi :</label>
                                 <input type="text" class="form-control" placeholder="Afiliasi" name="Afiliasi" required="" autocomplete="off" value="{{ $model->afiliasi }}" readonly="">
                            </div> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-10">
                        <a href="{{ url(Request::segment(1)) }}" class="btn btn-sm bg-grey"><i class="icon-arrow-left13 mr-2"></i>Back</a>
                        <button type="submit" class="btn bg-{{ \Config::get('app.theme')}}">Kirim Persetujuan <i class="icon-enter ml-2"></i></button>
                    </div>
                </div>

            </div>    
        </div>
    </form>
</div>


@endsection
@push('scripts')

@endpush