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
        <h5 class="card-title">General Setting Aplication</h5>
        <div class="header-elements">
            <div class="list-icons">
                &nbsp;
            </div>
        </div>
    </div>
    <div class="card-body">
		<form class="form form-horizontal" action="{{ route('setting.save') }}" method="post" >
		{{csrf_field()}}  	
			<div class="form-body">										
                <div class="form-group row" {{ $errors->has('expired_password') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" > Expired Password Day</label>
                    <div class="col-lg-5">
                    	<input type="number" class="form-control" placeholder="Enter text" name="expired_password" required="" autocomplete="off" value="{{ $exp_cp->setting_value }}">
                    	<span class="text-danger">{{ $errors->first('expired_password') }}</span>
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