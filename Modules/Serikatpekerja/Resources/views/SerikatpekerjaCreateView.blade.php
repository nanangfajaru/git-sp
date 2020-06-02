@extends('layouts.layouts')

@section('content')

<div class="card">
	<form action="{{ route('serikatpekerja.save') }}" method="post" class="" enctype="multipart/form-data">
	{{csrf_field()}}  
	<div class="card-header header-elements-inline">
		<legend class=" border-bottom-{{ \Config::get('app.theme') }}"><i class="icon-bookmark2 mr-2"></i> Formulir Serikat Pekerja
        </legend>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
					<div class="form-group">
						<label>Nama Serikat Pekerja :</label>
              <input type="text" class="form-control" placeholder="Nama Serikat Pekerja" name="serikat_pekerja_desc" autocomplete="off" value="{{ old('serikat_pekerja_desc') }}" required="" >
              <span class="text-danger">{{ $errors->first('serikat_pekerja_desc') }}</span>
					</div>
          <div class="form-group">
            <label>Nama Singkat Serikat Pekerja :</label>
              <input type="text" class="form-control" placeholder="Nama Singkat Serikat Pekerja" name="nama_singkat" autocomplete="off" value="{{ old('nama_singkat') }}" >
              <span class="text-danger">{{ $errors->first('nama_singkat') }}</span>
          </div>
			</div>
      <div class="col-md-6">
          <div class="form-group">
            <label>Logo :</label>
              <input type="file" class="form-control" placeholder="Enter text" name="url_logo" autocomplete="off" value="{{ old('url_logo') }}" required="">
              <span class="text-danger">{{ $errors->first('url_logo') }}</span>
          </div>
          <div class="form-group">
            <label>Afiliasi :</label>
              <input type="text" class="form-control" placeholder="Afiliasi" name="afiliasi" autocomplete="off" value="{{ old('afiliasi') }}" required="">
              <span class="text-danger">{{ $errors->first('afiliasi') }}</span>
          </div>
      </div>
		</div>
		
		<br>
		<div class="form-group row">
			<div class="col-lg-10">
				<a href="{{ url(Request::segment(1)) }}" class="btn btn-sm bg-grey"><i class="icon-arrow-left13 mr-2"></i>Back</a>
				<button type="submit" class="btn bg-{{ \Config::get('app.theme')}}">Save <i class="icon-floppy-disk ml-2"></i></button>
			</div>
		</div>

	</div>
	</form>
</div>

@endsection
