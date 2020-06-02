@extends('layouts.layouts')

@section('content')

<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">User - Edit</h5>
		<div class="header-elements">
			<div class="list-icons">
				&nbsp;
        	</div>
    	</div>
	</div>
	<div class="card-body">
		<form class="form form-horizontal" action="{{ route('users.editSave') }}" method="post" >
		{{csrf_field()}}  	
			<div class="form-body">										
                <div class="form-group row" {{ $errors->has('user_id') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" > User Id</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" placeholder="Enter text" name="user_id" required="" autocomplete="off" value="{{ $model->user_id }}" readonly="">
                        <input type="hidden" class="form-control" placeholder="Enter text" name="user_id" required="" autocomplete="off" value="{{ $model->user_id }}">
                        <input type="hidden" class="form-control" placeholder="Enter text" name="id" required="" autocomplete="off" value="{{ $model->id }}">
                    	<span class="text-danger">{{ $errors->first('user_id') }}</span>

                    </div>
                </div>
                <div class="form-group row" {{ $errors->has('username') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" >Username</label>
                    <div class="col-lg-5">
                    	<input type="text" class="form-control" placeholder="Enter text" name="username" required="" autocomplete="off" value="{{ $model->username }}">
		            <span class="text-danger">{{ $errors->first('username') }}</span>
                    </div>
                </div>
                <div class="form-group row" {{ $errors->has('name') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" >Fullname</label>
                    <div class="col-lg-5">
                    	<input type="text" class="form-control" placeholder="Enter text" name="name" required="" autocomplete="off" value="{{ $model->name }}">
		            <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>
               {{--  <div class="form-group row" {{ $errors->has('email') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" >Email</label>
                    <div class="col-lg-5">
                    	<input type="email" class="form-control" placeholder="Enter text" name="email" required="" autocomplete="off" value="{{ $model->email }}">
		            <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div> --}}
                <div class="form-group row" {{ $errors->has('role_id') ? 'has-error' : '' }}>
                	<label class="col-form-label col-lg-2 text-lg-right" >Role</label>
                    <div class="col-lg-5">
                    	{!! Form::select('role_id', $dropdown_role, $model->role_id, ['class' => 'form-control','placeholder' => '- Pilih -', 'required' => '']) !!}
		            <span class="text-danger">{{ $errors->first('role_id') }}</span>
                    </div>
                </div>                
{{--                 <div class="form-group row" {{ $errors->has('balai') ? 'has-error' : '' }}>
                    <label class="col-form-label col-lg-2 text-lg-right" >Balai</label>
                    <div class="col-lg-5">
                        {!! Form::select('balai', $dropdown_balai, $model->id_balai, ['class' => 'form-control','placeholder' => '- Pilih -', 'required' => '']) !!}
                        <span class="text-danger">{{ $errors->first('balai') }}</span>
                    </div>
                </div> --}}
                <div class="form-group row" {{ $errors->has('id_provinsi') ? 'has-error' : '' }}>
                    <label class="col-form-label col-lg-2 text-lg-right" >Provinsi</label>
                    <div class="col-lg-5">
                        <select name="id_provinsi" id="id_provinsi" class="form-control select" >
                                        <option>Pilih</option>
                                    </select>
                        <span class="text-danger">{{ $errors->first('id_provinsi') }}</span>
                    </div>
                </div>

                <div class="form-group row" {{ $errors->has('id_kabupaten') ? 'has-error' : '' }}>
                    <label class="col-form-label col-lg-2 text-lg-right" >Kabupaten</label>
                    <div class="col-lg-5">
                        <select name="id_kabupaten" id="id_kabupaten" class="form-control select" >
                                        <option>Pilih</option>
                                    </select>
                        <span class="text-danger">{{ $errors->first('id_kabupaten') }}</span>
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
          headers : {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
          type  : "POST",
          url   : "{{ route('UserProvinsi.api') }}",
          data  : {
              prov_id : "",
              idSelected : "{{ $model->id_provinsi }}"   
          },
          success: function(data)
          {   
            $("#id_provinsi").html(data);
          },
          error: function ()
          {
            alert('Error Provinsi');
          }
      });

      $('#id_provinsi').change(function(){
          var id_provinsi = $('#id_provinsi').val();

          if (id_provinsi) {
            $.ajax({
                headers : {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         },
                  type  : "POST",
                  url   : "{{ route('UserKabupaten.api') }}",
                      data  : {
                            id_provinsi : id_provinsi,
                          idSelected   : ""   
                      },
                      success: function(data)
                      {   
                          $("#id_kabupaten").html(data);
                      },
                      error: function ()
                      {
                          alert('Error Kabupaten');
                      }
            });
          }else{
              $('#id_kabupaten').empty();
          }

        });

        $.ajax({
            headers : {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
              type  : "POST",
              url   : "{{ route('UserKabupaten.api') }}",
                  data  : {
                        id_provinsi : "{{ $model->id_provinsi }}",
                      idSelected   : "{{ $model->id_kabupaten }}"   
                  },
                  success: function(data)
                  {   
                      $("#id_kabupaten").html(data);
                  },
                  error: function ()
                  {
                      alert('Error Kabupaten');
                  }
        });

     }); 
    </script>
@endpush