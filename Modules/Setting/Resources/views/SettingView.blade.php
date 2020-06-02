@extends('layouts.layouts')

@section('content')

<div class="card">
    @if(Session::has('notif'))
{{--                     <div class="alert bg-success bg-lighten-2">
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
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Seting Aplikasi</h5>
        <div class="header-elements">
            <div class="list-icons">
                &nbsp;
            </div>
        </div>
    </div>
    <div class="card-body">
		<form class="form form-horizontal" action="{{ route('setting.pejabatSave') }}" method="post" >
		{{csrf_field()}}  	
            <br>
			<div class="form-body">										
                <div class="form-group row" {{ $errors->has('nama_jabatan') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" > Nama Jabatan Kepala</label>
                    <div class="col-lg-5">
                    	<input type="text" class="form-control" placeholder="Ex : Dinas Kabupaten" name="nama_jabatan" required="" autocomplete="off">
                    	<span class="text-danger">{{ $errors->first('nama_jabatan') }}</span>
                    </div>
                    <div class="col-lg-5">
                          @if( $pejabat == null )
                           
                          @else
                           {{ $pejabat->nama_jabatan }}                            
                          @endif
                    </div>
                </div>
			</div>   
            <div class="form-body">                                     
                <div class="form-group row" {{ $errors->has('nama_pejabat') ? 'has-error' : '' }}>
                    <label class="col-form-label col-lg-2 text-lg-right" > Nama Pejabat </label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" placeholder="Ex : Budi Santoso" name="nama_pejabat" required="" autocomplete="off">
                        <span class="text-danger">{{ $errors->first('nama_pejabat') }}</span>
                    </div>
                    <div class="col-lg-5">
                        @if( $pejabat == null )
                           
                          @else
                           {{ $pejabat->nama_pejabat }}                            
                          @endif
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-lg-10 ml-lg-auto">
                    <button type="submit" class="btn bg-teal-400">Save <i class="icon-paperplane ml-2"></i></button>
                    <a href="{{ url(Request::segment(1)) }}" class="btn bg-grey ml-3">Cancel</a>
                </div>
            </div>
		</form>
    </div>
</div>

@endsection