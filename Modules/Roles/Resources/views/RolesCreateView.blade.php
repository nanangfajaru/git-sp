@extends('layouts.layouts')

@section('content')

<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Roles - Add</h5>
		<div class="header-elements">
			<div class="list-icons">
				&nbsp;
        	</div>
    	</div>
	</div>
	<div class="card-body">
		<form action="{{ route('roles.save') }}" method="post" >
			{{csrf_field()}}  	
			<div class="form-group row {{ $errors->has('role_id') ? 'has-error' : '' }}">
				<label class="col-form-label col-lg-2 text-lg-right">Role Id </label>
				<div class="col-lg-5">
					<input type="text" class="form-control" placeholder="Enter text" name="role_id" required="" autocomplete="off" value="{{ old('role_id') }}">
				    <span class="text-danger">{{ $errors->first('role_id') }}</span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('role_des') ? 'has-error' : '' }}">
				<label class="col-form-label col-lg-2 text-lg-right">Role Desc </label>
				<div class="col-lg-5">
					<input type="text" class="form-control" placeholder="Enter text" name="role_desc" required="" autocomplete="off" value="{{ old('role_desc') }}">
				    <span class="text-danger">{{ $errors->first('role_desc') }}</span>
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