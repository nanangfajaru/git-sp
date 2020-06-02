@extends('layouts.layouts')

@section('content')

<div class="card">
	<form action="{{ route('serikatpekerja.editSave') }}" method="post" class="" enctype="multipart/form-data">
	{{csrf_field()}}  
	<div class="card-header header-elements-inline">
		<legend class=" border-bottom-{{ \Config::get('app.theme') }}"><i class="icon-bookmark2 mr-2"></i> Edit Serikat Pekerja
        </legend>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
					<div class="form-group">
						<label>Nama Serikat Pekerja :</label>
              <input type="hidden" class="form-control" name="serikat_pekerja_id" required="" value="{{ $model->serikat_pekerja_id }}" >
              <input type="hidden" class="form-control" name="id" required="" value="{{ $model->id }}" >
              <input type="text" class="form-control" placeholder="Nama Serikat Pekerja" name="serikat_pekerja_desc" required="" autocomplete="off" value="{{ $model->serikat_pekerja_desc }}" >
              <span class="text-danger">{{ $errors->first('serikat_pekerja_desc') }}</span>
					</div>
          <div class="form-group">
            <label>Nama Singkat Serikat Pekerja :</label>
              <input type="text" class="form-control" placeholder="Nama Singkat Serikat Pekerja " name="nama_singkat" autocomplete="off" value="{{ $model->nama_singkat }}" required="">
              <span class="text-danger">{{ $errors->first('nama_singkat') }}</span>
          </div>
			</div>
      <div class="col-md-6">
          <div class="form-group">
            <label>Ganti Logo :</label>
              <input type="hidden" class="form-control" placeholder="Enter text" name="url_logo_hidden" autocomplete="off" value="{{ $model->url_logo }}">
              <input type="file" class="form-control" placeholder="Enter text" name="url_logo" autocomplete="off" value="" required="">
              <span class="text-danger">{{ $errors->first('url_logo') }}</span>
          </div>
          <div class="form-group">
            <label>Afiliasi :</label>
              <input type="text" class="form-control" placeholder="Afiliasi" name="afiliasi" autocomplete="off" value="{{ $model->afiliasi }}" required="">
              <span class="text-danger">{{ $errors->first('afiliasi') }}</span>
          </div>
      </div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
					<div class="form-group {{ $errors->has('id_provinsi') ? 'has-error' : '' }}">
						<label>Provinsi :</label>
						<select name="id_provinsi" id="id_provinsi" class="form-control select-search" required="">
				        	<option>Pilih</option>
				        </select>
				        <span class="text-danger">{{ $errors->first('id_provinsi') }}</span>
					</div>

					<div class="form-group {{ $errors->has('id_kabupaten') ? 'has-error' : '' }}">
						<label>Kabupaten :</label>
						<select name="id_kabupaten" id="id_kabupaten" class="form-control select-search" required="" >
				        	<option value=""> - Pilih - </option>
				    	</select>
				        <span class="text-danger">{{ $errors->first('id_kabupaten') }}</span>
					</div>

					<div class="form-group {{ $errors->has('id_kecamatan') ? 'has-error' : '' }}">
						<label>Kecamatan :</label>
						<select name="id_kecamatan" id="id_kecamatan" class="form-control select-search" required="" >
				        	<option value=""> - Pilih - </option>
				        </select>
				        <span class="text-danger">{{ $errors->first('id_kecamatan') }}</span>
					</div>

					<div class="form-group {{ $errors->has('id_desa') ? 'has-error' : '' }}">
						<label>Desa :</label>
						<select name="id_desa" id="id_desa" class="form-control select-search" required="" >
				        	<option value=""> - Pilih - </option>
				        </select>
				        <span class="text-danger">{{ $errors->first('id_desa') }}</span>
					</div>
			</div>

			<div class="col-md-6">
					<div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
						<label>Alamat :</label>
						<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $model->alamat }}" required="" autocomplete="off">
            <span class="text-danger">{{ $errors->first('alamat') }}</span>
					</div>

					<div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
						<label>Telp :</label>
						<input type="number" name="telp" class="form-control" placeholder="Telp" value="{{ $model->telp }}" required="" autocomplete="off">
            <span class="text-danger">{{ $errors->first('telp') }}</span>
					</div>

					<div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
						<label>Fax :</label>
						<input type="number" name="fax" class="form-control" placeholder="Fax" value="{{ $model->fax }}" autocomplete="off">
            <span class="text-danger">{{ $errors->first('fax') }}</span>
					</div>

					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						<label>Email :</label>
						<input type="email" name="email" class="form-control" placeholder="Email" value="{{ $model->email }}" required="" autocomplete="off">
            <span class="text-danger">{{ $errors->first('email') }}</span>
					</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<legend class=" border-bottom-{{ \Config::get('app.theme') }}"><i class="icon-wallet mr-2"></i>
					Anggaran Dasar dan Anggaran Rumah Tangga
				</legend>
			</div>
		</div>
		<div class="row">
					<div class="col-md-4">
						<div class="form-group {{ $errors->has('url_ad') ? 'has-error' : '' }}">
							<label>Ganti Anggaran :</label>
							<input type="hidden" class="form-control" placeholder="Enter text" name="url_ad_hidden" autocomplete="off" value="{{ $model->url_ad}}">
              <input type="file" class="form-control" placeholder="Enter text" name="url_ad" autocomplete="off" required="">
              <span class="text-danger">{{ $errors->first('url_ad') }}</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group {{ $errors->has('tgl_pembuatan_ad') ? 'has-error' : '' }}">
							<label>Tanggal Pembuatan :</label>
							<input type="text" name="tgl_pembuatan_ad" class="form-control" placeholder="Tanggal Pembuatan" value="{{ $model->tgl_pembuatan_ad }}" required="" id="tgl_pembuatan_ad">
              <span class="text-danger">{{ $errors->first('tgl_pembuatan_ad') }}</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group {{ $errors->has('tgl_berlaku_ad') ? 'has-error' : '' }}">
							<label>Tanggal Berlaku Hingga :</label>
							<input type="text" name="tgl_berlaku_ad" class="form-control" placeholder="Tanggal Berlaku" value="{{ $model->tgl_berlaku_ad }}" required="" id="tgl_berlaku_ad">
              <span class="text-danger">{{ $errors->first('tgl_berlaku_ad') }}</span>
						</div>
					</div>
		</div>
		<br>
		<div class="form-group row">
			<div class="col-lg-10">
				<a href="{{ url(Request::segment(1)) }}" class="btn btn-sm bg-grey"><i class="icon-arrow-left13 mr-2"></i>Back</a>
				<button type="submit" class="btn bg-{{ \Config::get('app.theme')}}">Update <i class="icon-floppy-disk ml-2"></i></button>
			</div>
		</div>

	</div>
	</form>
</div>


@endsection
@push('scripts')
  <script type="text/javascript">
  	$("#id_provinsi").val("{{old('id_provinsi')}}");
  </script>
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
<script type="text/javascript">
  $(function() {
    var dateToday = new Date();
    var dates = $("#tgl_pembuatan_ad, #tgl_berlaku_ad").datepicker({
    	dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        // numberOfMonths: 1,
        // minDate: dateToday,
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){

    $.ajax({
        headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
        type  : "POST",
        url   : "{{ route('getProvinsi.api') }}",
        data  : {
            prov_id : "",
            idSelected : "{{ $model->id_provinsi}}"   
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
                url   : "{{ route('getKabupaten.api') }}",
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

    $('#id_kabupaten').change(function(){
        var id_kabupaten = $('#id_kabupaten').val();

        if (id_kabupaten) {
      $.ajax({
              headers : {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                type  : "POST",
                url   : "{{ route('getKecamatan.api') }}",
                    data  : {
              id_kabupaten : id_kabupaten,
                        idSelected   : ""   
                    },
                    success: function(data)
                    {   
                        $("#id_kecamatan").html(data);
                    },
                    error: function ()
                    {
                        alert('Error Kecamatan');
                    }
          });
        }else{
            $('#id_kecamatan').empty();
        }

      });

    $('#id_kecamatan').change(function(){
        var id_kecamatan = $('#id_kecamatan').val();

        if (id_kecamatan) {
      $.ajax({
              headers : {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                type  : "POST",
                url   : "{{ route('getDesa.api') }}",
                    data  : {
                    id_kecamatan : id_kecamatan,
                        idSelected   : ""   
                    },
                    success: function(data)
                    {   
                        $("#id_desa").html(data);
                    },
                    error: function ()
                    {
                        alert('Error Desa');
                    }
          });
        }else{
            $('#id_desa').empty();
        }

      });

    // --------------------------------------------------
    var edit = "{{ $model->id_provinsi}}" ;
    if( edit != ''){
      $.ajax({
                headers : {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         },
                  type  : "POST",
                  url   : "{{ route('getKabupaten.api') }}",
                      data  : {
                          id_provinsi : "{{ $model->id_provinsi}}",
                          idSelected   : "{{ $model->id_kabupaten}}"   
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

      $.ajax({
                headers : {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         },
                  type  : "POST",
                  url   : "{{ route('getKecamatan.api') }}",
                      data  : {
                          id_kabupaten : "{{ $model->id_kabupaten}}",
                          idSelected   : "{{ $model->id_kecamatan}}"   
                      },
                      success: function(data)
                      {   
                          $("#id_kecamatan").html(data);
                      },
                      error: function ()
                      {
                          alert('Error Kecamatan');
                      }
            });

      $.ajax({
                headers : {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         },
                  type  : "POST",
                  url   : "{{ route('getDesa.api') }}",
                      data  : {
                          id_kecamatan : "{{ $model->id_kecamatan}}",
                          idSelected   : "{{ $model->id_desa}}"   
                      },
                      success: function(data)
                      {   
                          $("#id_desa").html(data);
                      },
                      error: function ()
                      {
                          alert('Error Desa');
                      }
            });

    }
  });
</script>
@endpush