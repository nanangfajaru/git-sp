@extends('layouts.layouts')

@section('content')

<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Change Password</h5>
		<div class="header-elements">
			<div class="list-icons">
				&nbsp;
        	</div>
    	</div>
	</div>
  	<div class="card-body">
    	@if(Session::has('notif'))

            <div class="alert bg-danger">
                <a class="close" data-dismiss="alert">&times;</a>
                <span>{{Session::get('notif')}}</span>
            </div>
        @endif 
        @if(Session::has('cp'))

        	 @push('scripts')
                  <script type="text/javascript">
                    $(document).ready(function() { 
                        swalCp();
                        });
                  </script>
              @endpush
        @endif

		<form class="form form-horizontal" action="{{ route('cp.changeSave') }}" method="post" >
		{{csrf_field()}}  	
			   
			<div class="form-body">										
                <div class="form-group row" {{ $errors->has('user_id') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" > Username</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" placeholder="Enter text" name="username" required="" autocomplete="off" value="{{ $model->username }}" readonly="">
                        <input type="hidden" class="form-control" placeholder="Enter text" name="user_id" required="" autocomplete="off" value="{{ $model->user_id }}">
                    	<span class="text-danger">{{ $errors->first('user_id') }}</span>
                    </div>
                </div>
                <div class="form-group row" {{ $errors->has('old_password') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" >Old Password</label>
                    <div class="col-lg-5">
                    	<input type="password" class="form-control" placeholder="Enter text" name="old_password" required="" autocomplete="off" value="{{ old('old_password') }}">
		            <span class="text-danger">{{ $errors->first('old_password') }}</span>
                    </div>
                </div>
                <div class="form-group row" {{ $errors->has('password') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" >New Password</label>
                    <div class="col-lg-5">
                    	<input type="password" class="form-control" placeholder="Enter text" name="password" required="" autocomplete="off" value="{{ old('password') }}">
		            <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                </div>
                <div class="form-group row" {{ $errors->has('password_confirmation') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" >Confirm New Password</label>
                    <div class="col-lg-5">
                    	<input type="password" class="form-control" placeholder="Enter text" name="password_confirmation" required="" autocomplete="off" value="{{ old('password_confirmation') }}">
		            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    </div>
                </div>
			</div>							
			<div class="form-group row mb-0">
				<div class="col-lg-10 ml-lg-auto">
					<button type="submit" class="btn bg-teal-400">Change Password <i class="icon-lock2 ml-2"></i></button>
					<a href="{{ route('home') }}" class="btn bg-grey ml-3">Cancel</a>
				</div>
			</div>
		</form>
    </div>

</div>
@endsection

@push('scripts')
	<script src="{{ asset('template/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>

    <script type="text/javascript">
    	// $(document).ready(function(){


    	// });
    	function swalCp() {
    		swal.setDefaults({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-light'
            });
    		swal({
	            title: 'Successfully Change Password',
	            text: 'Please Login Again !',
	            type: 'success'
	        }).
    		then(function() {
				    document.getElementById('logout-form').submit() ;
				});
    	}
    </script>
@endpush