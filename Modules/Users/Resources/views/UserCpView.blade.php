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
		<form class="form form-horizontal" action="{{ route('users.cpSave') }}" method="post" >
		{{csrf_field()}}  	
			<div class="form-body">										
                <div class="form-group row" {{ $errors->has('user_id') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" > Username</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Enter text" name="username" required="" autocomplete="off" value="{{ $model->username }}" readonly="">
                        <input type="hidden" class="form-control" placeholder="Enter text" name="user_id" required="" autocomplete="off" value="{{ $model->user_id }}">
                    	<span class="text-danger">{{ $errors->first('user_id') }}</span>

                    </div>
                </div>
                <div class="form-group row" {{ $errors->has('new_pwd') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" >New Password</label>
                    <div class="col-md-4">
                    	<input type="password" class="form-control" placeholder="Enter text" name="new_pwd" required="" autocomplete="off" value="{{ old('new_pwd') }}">
		            <span class="text-danger">{{ $errors->first('new_pwd') }}</span>
                    </div>
                </div>
			</div>							
			<div class="form-group row mb-0">
				<div class="col-lg-10 ml-lg-auto">
					<button type="submit" class="btn bg-teal-400">Change Password <i class="icon-lock2 ml-2"></i></button>
					<a href="{{ url(Request::segment(1)) }}" class="btn bg-grey ml-3">Cancel</a>
				</div>
			</div>
		</form>
    </div>

</div>

@endsection