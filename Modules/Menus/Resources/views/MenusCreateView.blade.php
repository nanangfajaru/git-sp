@extends('layouts.layouts')

@section('content')

<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Menus - Add</h5>
		<div class="header-elements">
			<div class="list-icons">
				&nbsp;
        	</div>
    	</div>
	</div>
  	<div class="card-body">
		<form class="form form-horizontal" action="{{ route('menus.save') }}" method="post" >
		{{csrf_field()}}  	
			<div class="form-body">										
                <div class="form-group row" {{ $errors->has('menu_desc') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" > Menu Name</label>
                    <div class="col-lg-5">
                    	<input type="text" class="form-control" placeholder="Enter text" name="menu_desc" required="" autocomplete="off" value="{{ old('menu_desc') }}">
                    	<span class="text-danger">{{ $errors->first('menu_desc') }}</span>
                    </div>
                </div>
                <div class="form-group row" {{ $errors->has('menu_url') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" >Menu Url</label>
                    <div class="col-lg-5">
                    	<input type="text" class="form-control" placeholder="Enter text" name="menu_url" required="" autocomplete="off" value="{{ old('menu_url') }}">
                   		<span class="text-danger">{{ $errors->first('menu_url') }}</span>
                    </div>
                </div>
                <div class="form-group row" {{ $errors->has('menu_icon') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" >Menu Icon</label>
                    <div class="col-lg-5">
                    	<input type="text" class="form-control" placeholder="Enter text" name="menu_icon" required="" autocomplete="off" value="icon-cogs">
                   		<span class="text-danger">{{ $errors->first('menu_icon') }}</span>
                    </div>
                    <div class="col-lg-2">
                    	<a href="#" class="btn btn-sm bg-teal-400">Icon</a>
                    </div>
                </div>
                <div class="form-group row" {{ $errors->has('menu_seq') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" >Menu Sequence</label>
                    <div class="col-lg-5">
                    	<select name="menu_seq" id="menu_seq" class="form-control" required="">
       					</select>
                   		<span class="text-danger">{{ $errors->first('menu_seq') }}</span>
                    </div>
                </div>
                <div class="form-group row" {{ $errors->has('menu_parent') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" >Parent</label>
                    <div class="col-lg-5">
                    	<select name="menu_parent" id="menu_parent" class="form-control" required="">
       					</select>
                   		<span class="text-danger">{{ $errors->first('menu_parent') }}</span>
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

@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){

		$.ajax({
				headers	: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
				type 	: "POST",
				url 	: "{{ route('get_seq.api') }}",
				data	: {
						idSelected : ""  
				},
				success: function(data)
				{   
					$("#menu_seq").html(data);
				},
				error: function ()
				{
					alert('Error Menu Sequence');
				}
		});

		$('#menu_seq').change(function(){
	    	var menu_seq = $('#menu_seq').val();

	    	if (menu_seq) {
			$.ajax({
		    			headers	: {
						              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						           },
				        type 	: "POST",
				        url 	: "{{ route('get_par.api') }}",
		                data	: {
							menu_seq : menu_seq,
		                    idSelected 	 : ""   
		                },
		                success: function(data)
		                {   
		                    $("#menu_parent").html(data);
		                },
		                error: function ()
		                {
		                    alert('Error Menu Parent');
		                }
		    	});
		    }else{
		    		$('#menu_parent').empty();
		    }

	    });
	});
</script>
@endpush