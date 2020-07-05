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
                 <h6 class="card-title"><i class="icon-users4 mr-2"></i> Informasi Umum Federasi</h6>
        <div class="header-elements">
            <div class="list-icons">
                <a><i class="icon-arrow-down32"></i></a>
                {{-- <a class="list-icons-item" data-action="remove"></a> --}}
            </div>
        </div>
    </div>

    <div id="accordion-item-default2" class="collapse show" data-parent="#accordion-default">
    
        <form action="{{ route('federasi.generalSave') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}    
            <div class="card-body">
                <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group" >
                                <label> {{\Modules\Serikatpekerja\Helper\HelperSerikatPekerja::getTitle()}} :</label>
                                    <input type="hidden" class="form-control" placeholder="Text" name="serikat_pekerja_id" autocomplete="off" value=" {{ $model->serikat_pekerja_id}}" id="serikat_pekerja_id">
                                    <input type="text" class="form-control" placeholder="Text" name="serikat_pekerja_desc" autocomplete="off" value=" {{ $model->serikat_pekerja_desc}}" readonly="">
                            </div>
                        </div>
                </div>     
                <br>
                <div class="row">
                    <div class="col-md-4">
                            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                                <label>Afiliasi Internasional :</label>
                                <input type="text" name="afiliasi" class="form-control" placeholder="afiliasi" value="{{ $model->afiliasi }}" autocomplete="off" >
                                <span class="text-danger">{{ $errors->first('afiliasi') }}</span>
                            </div>

                            <div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
                                <label>Nama Singkat Afiliasi Internasional :</label>
                                <input type="text" name="ns_afiliasi" class="form-control" placeholder="ns_afiliasi" value="{{ $model->ns_afiliasi }}" autocomplete="off" >
                                <span class="text-danger">{{ $errors->first('ns_afiliasi') }}</span>
                            </div>
                    </div>
{{--                     <div class="col-md-4">
                            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                                <label>Afiliasi Federasi :</label>
                                <input type="text" name="afiliasi_federasi" class="form-control" placeholder="afiliasi_federasi" value="{{ $model->afiliasi_federasi }}" autocomplete="off" >
                                <span class="text-danger">{{ $errors->first('afiliasi_federasi') }}</span>
                            </div>

                            <div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
                                <label>Nama Singkat Afiliasi Federasi :</label>
                                <input type="text" name="ns_afiliasi_federasi" class="form-control" placeholder="ns_afiliasi_federasi" value="{{ $model->ns_afiliasi_federasi }}" autocomplete="off" >
                                <span class="text-danger">{{ $errors->first('ns_afiliasi_federasi') }}</span>
                            </div>
                    </div> --}}
                    <div class="col-md-4">
                            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                                <label>Afiliasi konfederasi :</label>
                                <input type="text" name="afiliasi_konfederasi" class="form-control" placeholder="afiliasi_konfederasi" value="{{ $model->afiliasi_konfederasi }}" autocomplete="off" >
                                <span class="text-danger">{{ $errors->first('afiliasi_konfederasi') }}</span>
                            </div>

                            <div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
                                <label>Nama Singkat Afiliasi konfederasi :</label>
                                <input type="text" name="ns_afiliasi_konfederasi" class="form-control" placeholder="ns_afiliasi_konfederasi" value="{{ $model->ns_afiliasi_konfederasi }}" autocomplete="off" >
                                <span class="text-danger">{{ $errors->first('ns_afiliasi_konfederasi') }}</span>
                            </div>
                    </div>
                </div>
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
                                <label>Kabupaten / Kota :</label>
                                <select name="id_kabupaten" id="id_kabupaten" class="form-control select-search" required="">
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
                                <label>Kelurahan / Desa :</label>
                                <select name="id_desa" id="id_desa" class="form-control select-search" required="" >
                                    <option value=""> - Pilih - </option>
                                </select>
                                <span class="text-danger">{{ $errors->first('id_desa') }}</span>
                            </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                                <label>Alamat :</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $model->alamat }}" autocomplete="off" required="">
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            </div>

                            <div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
                                <label>Telp :</label>
                                <input type="number" name="telp" class="form-control" placeholder="Telp" value="{{ $model->telp }}" autocomplete="off" required="">
                                <span class="text-danger">{{ $errors->first('telp') }}</span>
                            </div>

                            <div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
                                <label>Fax :</label>
                                <input type="number" name="fax" class="form-control" placeholder="Fax" value="{{ $model->fax }}" autocomplete="off">
                                <span class="text-danger">{{ $errors->first('fax') }}</span>
                            </div>

                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label>Email :</label>
                                <input type="email" name="email" class="form-control" placeholder="abc@gmail.com" value="{{ $model->email }}" autocomplete="off" required="">
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
                            <div class="col-md-5">
                                <div class="form-group {{ $errors->has('url_anggaran') ? 'has-error' : '' }}">
                                    <label>Upload AD / ART :</label>
                                    <input type="file" class="form-control-uniform" placeholder="Enter text" name="url_anggaran"  autocomplete="off" value="{{ old('url_anggaran') }}" required="" >
                                    <span class="text-danger">{{ $errors->first('url_anggaran') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('tgl_pembuatan_ad') ? 'has-error' : '' }}">
                                    <label>Tanggal Pembuatan :</label>
                                    <input type="text" name="tgl_pembuatan_ad" class="form-control" placeholder="Tanggal Pembuatan" value="{{ optional($ad)->tgl_pembuatan_ad }}"  id="tgl_pembuatan_ad" autocomplete="off" >
                                    <span class="text-danger">{{ $errors->first('tgl_pembuatan_ad') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('tgl_berlaku_ad') ? 'has-error' : '' }}">
                                    <label>Tanggal Berlaku Hingga :</label>
                                    <input type="text" name="tgl_berlaku_ad" class="form-control" placeholder="Tanggal Berlaku" value="{{ optional($ad)->tgl_berlaku_ad }}"  id="tgl_berlaku_ad" autocomplete="off" >
                                    <span class="text-danger">{{ $errors->first('tgl_berlaku_ad') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                  <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
                                    <label>Keterangan :</label>
                                    <input type="text" name="keterangan" class="form-control" placeholder="keterangan" autocomplete="off" value="{{ optional($ad)->keterangan }}"  >
                                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                                </div>
                            </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <legend class=" border-bottom-{{ \Config::get('app.theme') }}"><i class="icon-office mr-2"></i>
                            Perusahaan
                        </legend>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">

                            @if ( $model->perusahaan == "luar" ) 
                                @php
                                $dalam = "" ;
                                $luar = "checked=''" ;
                                @endphp
                            @else
                                @php
                                $dalam = "checked=''" ;
                                $luar = "" ;
                                @endphp
                            @endif

                        <div class="form-group {{ $errors->has('perusahaan') ? 'has-error' : '' }}">
                                <label>Jenis Serikat Pekerja/ Serikat Buruh : </label>
                                <div class="form-group row" id="perusahaan">
                                     &nbsp;
                                     &nbsp;
                                    <input type="radio" value="dalam" class="styled" name="perusahaan" {{$dalam}}>
                                     &nbsp; Di Perusahaan
                                     &nbsp;
                                    <input type="radio" value="luar" class="styled" name="perusahaan" {{$luar }}>
                                     &nbsp; Di luar Perusahaan
                                </div>
                            <span class="text-danger">{{ $errors->first('perusahaan') }}</span>
                        </div>
                    </div>

                </div>
                  <div class="row" id="perusahaanDalam">
                    <div class="col-md-4">
                      <div class="form-group {{ $errors->has('nama_perusahaan') ? 'has-error' : '' }}">
                          <label>Nama Perusahaan :</label>
                          <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="nama_perusahaan" value="{{ $model->nama_perusahaan }}" autocomplete="off" >
                          <span class="text-danger">{{ $errors->first('nama_perusahaan') }}</span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group {{ $errors->has('jumlah_pekerja') ? 'has-error' : '' }}">
                          <label>Jumlah Pekerja :</label>
                          <input type="number" name="jumlah_pekerja" id="jumlah_pekerja" class="form-control" placeholder="jumlah_pekerja" value="{{ $model->jumlah_pekerja }}" autocomplete="off" >
                          <span class="text-danger">{{ $errors->first('jumlah_pekerja') }}</span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group {{ $errors->has('alamat_perusahaan') ? 'has-error' : '' }}">
                          <label>Alamat Perusahaan :</label>
                          <input type="text" name="alamat_perusahaan" id="alamat_perusahaan" class="form-control" placeholder="alamat_perusahaan" value="{{ $model->alamat_perusahaan }}" autocomplete="off" >
                          <span class="text-danger">{{ $errors->first('alamat_perusahaan') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row" id="perusahaanLuar">
                    <div class="col-md-4">
                      <div class="form-group {{ $errors->has('jenis_pekerjaan') ? 'has-error' : '' }}">
                            <label>Jenis Pekerjaan :</label>
                            <input type="text" name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control" placeholder="jenis_pekerjaan" value="{{ $model->jenis_pekerjaan }}" autocomplete="off" >
                            <span class="text-danger">{{ $errors->first('jenis_pekerjaan') }}</span>
                      </div>
                    </div>
                </div> --}}

                <br>
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
</div>


@endsection
@push('scripts')
  {{--   <script type="text/javascript">
        $("#id_provinsi").val("{{old('id_provinsi')}}");
    </script> --}}
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
    
    <script src="{{asset('template/global_assets/js/plugins/forms/selects/select2.min.js ')}}"></script>
    <script src="{{asset('template/global_assets/js/demo_pages/form_select2.js ')}}"></script>


  <script type="text/javascript">
    $(document).ready(function(){
        var jenisPerusahaan = "{{ $model->perusahaan }}" ;

        if (jenisPerusahaan == "luar") {
                // $("#perusahaan input:radio").val("dalam").prop("checked", true );
                $('#perusahaanDalam').hide();
                $('#perusahaanLuar').show();
        }else{
                // $("#perusahaan input:radio").val("luar").prop("checked", true );
                $('#perusahaanDalam').show();
                $('#perusahaanLuar').hide();
        }
        // $("#jenis_pekerjaan").prop('required',true);

      $('#perusahaan input:radio').click(function() {
        if ($(this).val() === 'dalam') {
          $('#perusahaanDalam').show();
          $('#perusahaanLuar').hide();
          $("#nama_perusahaan").prop('required',true);
          $("#jumlah_pekerja").prop('required',true);
          $("#jenis_pekerjaan").val("");
          // $("#jenis_pekerjaan").prop('required',false);
          $("#alamat_perusahaan").val("");
          $("#alamat_perusahaan").prop('required',true);
        } else if ($(this).val() === 'luar') {
          $('#perusahaanDalam').hide();
          $('#perusahaanLuar').show();
          // $("#jenis_pekerjaan").prop('required',true);
          $("#nama_perusahaan").val("");
          $("#jumlah_pekerja").val("");
          $("#nama_perusahaan").prop('required',false);
          $("#jumlah_pekerja").prop('required',false);

          $("#alamat_perusahaan").val("");
          $("#alamat_perusahaan").prop('required',false);
        } 
      });
    });
  </script>
  
  <script type="text/javascript">
          $('.form-control-uniform').uniform({
            fileButtonClass: 'action btn bg-{{ \Config::get('app.theme')}}',
            fileButtonHtml: 'Upload AD / ART'
        });
  </script>
  <script type="text/javascript">
     $(".styled").uniform();
  </script>
  <script>
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
            //   idSelected : "{{ $model->id_provinsi }}"   
              idSelected : ""   
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


    });
  </script>

  {{-- SELECTED --}}
  {{-- <script type="text/javascript">
    $(document).ready(function(){

      $.ajax({
          headers : {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
          type  : "POST",
          url   : "{{ route('getProvinsi.api') }}",
          data  : {
              id_provinsi : "",
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

      $.ajax({
          headers : {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
          type  : "POST",
          url   : "{{ route('getKabupaten.api') }}",
          data  : {
              id_provinsi : "{{ $model->id_provinsi }}",
              idSelected : "{{ $model->id_kabupaten }}"   
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
              id_kabupaten : "{{ $model->id_kabupaten }}",
              idSelected : "{{ $model->id_kecamatan }}"   
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
              id_kecamatan : " {{  $model->id_kecamatan }}",
              idSelected : "{{ $model->id_desa }}"   
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

    });
  </script> --}}

@endpush