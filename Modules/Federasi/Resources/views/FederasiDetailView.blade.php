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
                 <h6 class="card-title">
                    <i class="icon-shield2 mr-2"></i> Detail Federasi 
                </h6>
        <div class="header-elements">
            <div class="list-icons">
                <a><i class="icon-arrow-down32"></i></a>
                {{-- <a class="list-icons-item" data-action="remove"></a> --}}
            </div>
        </div>
    </div>

    <div id="accordion-item-default2" class="collapse show" data-parent="#accordion-default"> 
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                        <div class="form-group">
                            <label>Nama  :</label>
                            <input type="hidden" class="form-control" placeholder="Text" name="serikat_pekerja_id" autocomplete="off" value=" {{ $model->serikat_pekerja_id}}" id="serikat_pekerja_id">
                             <input type="text" class="form-control" placeholder="Nama " name="serikat_pekerja_desc" required="" autocomplete="off" value="{{ $model->serikat_pekerja_desc }}" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Nama Singkat  :</label>
                             <input type="text" class="form-control" placeholder="Nama Singkat" name="nama_singkat" required="" autocomplete="off" value="{{ $model->nama_singkat }}" readonly="">
                        </div>
                </div>
                <div class="col-md-3">
                        <div class="form-group">
                            <label>No Registrasi :</label>
                            <input type="text" class="form-control" placeholder="Text" name="serikat_pekerja_id" autocomplete="off" value=" {{ $model->serikat_pekerja_id}}" id="serikat_pekerja_id" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Status : </label>
                            <p>
                            @php 
                            $status = \Modules\Serikatpekerja\Helper\HelperSerikatPekerja::getStatus($model->status) ;
                            @endphp
                            {!! $status !!}
                            </p>
                            Pesan : 
                        </div>
                </div>
                <div class="col-md-3">
                        <div class="form-group">
                            {{-- <label>Logo :</label> --}}
                             <img class="" src="{{url($model->url_logo)}}" width="75%" height="75%">
                        </div>
                </div>
                <div class="col-md-3">                    
                        <div class="form-group">
                            {{-- <label>Logo :</label> --}}
                            <a href="{{url($model->url_logo)}}" download class="btn btn-sm"><i class="icon-download mr-2"></i>Download</a>
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                        <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                            <label>Afiliasi Internasional :</label>
                            <input type="text" name="afiliasi" class="form-control" placeholder="afiliasi" value="{{ $model->afiliasi}}" autocomplete="off" readonly="" >
                            <span class="text-danger">{{ $errors->first('afiliasi') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
                            <label>Nama Singkat Afiliasi Internasional :</label>
                            <input type="text" name="ns_afiliasi" class="form-control" placeholder="ns_afiliasi" value="{{ $model->ns_afiliasi }}" autocomplete="off" readonly="" >
                            <span class="text-danger">{{ $errors->first('ns_afiliasi') }}</span>
                        </div>
                </div>
{{--                 <div class="col-md-4">
                        <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                            <label>Afiliasi Federasi :</label>
                            <input type="text" name="afiliasi_federasi" class="form-control" placeholder="afiliasi_federasi" value="{{ $model->afiliasi_federasi }}" autocomplete="off" readonly="" >
                            <span class="text-danger">{{ $errors->first('afiliasi_federasi') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
                            <label>Nama Singkat Afiliasi Federasi :</label>
                            <input type="text" name="ns_afiliasi_federasi" class="form-control" placeholder="ns_afiliasi_federasi" value="{{ $model->ns_afiliasi_federasi }}" autocomplete="off" readonly="" >
                            <span class="text-danger">{{ $errors->first('ns_afiliasi_federasi') }}</span>
                        </div>
                </div> --}}
                <div class="col-md-4">
                        <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                            <label>Afiliasi konfederasi :</label>
                            <input type="text" name="afiliasi_konfederasi" class="form-control" placeholder="afiliasi_konfederasi" value="{{ $model->afiliasi_konfederasi }}" autocomplete="off" readonly="" >
                            <span class="text-danger">{{ $errors->first('afiliasi_konfederasi') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
                            <label>Nama Singkat Afiliasi konfederasi :</label>
                            <input type="text" name="ns_afiliasi_konfederasi" class="form-control" placeholder="ns_afiliasi_konfederasi" value="{{ $model->ns_afiliasi_konfederasi }}" autocomplete="off" readonly="" >
                            <span class="text-danger">{{ $errors->first('ns_afiliasi_konfederasi') }}</span>
                        </div>
                </div>
            </div>
            {{-- <br> --}}
            <div class="row">
                <div class="col-md-6">
                    <fieldset>

                        <div class="form-group ">
                            <label>Provinsi :</label>
                            <input type="text" name="nama_provinsi" class="form-control" placeholder="nama_provinsi" value="{{ $model->nama_provinsi }}" required="" autocomplete="off" readonly="">
                        </div>

                        <div class="form-group">
                            <label>Kabupaten / Kota:</label>
                            <input type="text" name="nama_kabupaten" class="form-control" placeholder="nama_kabupaten" value="{{ $model->nama_kabupaten }}" required="" autocomplete="off" readonly="">
                        </div>

                        <div class="form-group">
                            <label>Kecamatan :</label>
                            <input type="text" name="nama_kecamatan" class="form-control" placeholder="nama_kecamatan" value="{{ $model->nama_kecamatan }}" required="" autocomplete="off" readonly="">
                        </div>

                        <div class="form-group">
                            <label>Kelurahan Desa :</label>
                            <input type="text" name="nama_desa" class="form-control" placeholder="nama_desa" value="{{ $model->nama_desa }}" required="" autocomplete="off" readonly="">
                        </div>

                    </fieldset>
                </div>

                <div class="col-md-6">
                    <fieldset>

                        <div class="form-group ">
                            <label>Alamat :</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $model->alamat }}" required="" autocomplete="off" readonly="">
                        </div>

                        <div class="form-group">
                            <label>Telp :</label>
                            <input type="text" name="telp" class="form-control" placeholder="Telp" value="{{ $model->telp }}" required="" autocomplete="off" readonly="">
                        </div>

                        <div class="form-group">
                            <label>Fax :</label>
                            <input type="text" name="fax" class="form-control" placeholder="Fax" value="{{ $model->fax }}" required="" autocomplete="off" readonly="">
                        </div>

                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $model->email }}" required="" autocomplete="off" readonly="">
                        </div>

                    </fieldset>
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
                            <div class="form-group">
                                <label>AD / ART :</label>
                                <a href="{{ url('public')}}{{ Storage::url($model->url_ad) }}"
                                    target="_blank"
                                    title="Detail Anggaran: '{{ $model->serikat_pekerja_desc }}'" class="form-control">
                                    <i class="icon-file-check2"></i></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Tanggal Pembuatan :</label>
                                <input type="text" name="tgl_pembuatan_ad" class="form-control" placeholder="Tanggal Pembuatan" value="{{ $model->tgl_pembuatan_ad }}" required="" id="tgl_pembuatan_ad" readonly="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Tanggal Berlaku Hingga :</label>
                                <input type="text" name="tgl_berlaku_ad" class="form-control" placeholder="Tanggal Berlaku" value="{{ $model->tgl_berlaku_ad }}" required="" id="tgl_berlaku_ad" readonly="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Keterangan :</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="keterangan" value="{{ $model->keterangan }}" required="" autocomplete="off" readonly="">
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <legend class=" border-bottom-{{ \Config::get('app.theme') }}"><i class="icon-office mr-2"></i>
                        Perusahaan
                    </legend>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <mark class="bg-success">
                        @php
                        $perusahaan = \Modules\Serikatpekerja\Helper\HelperSerikatPekerja::getPerusahaan($model->perusahaan) ;
                        @endphp
                        {{ $perusahaan }} 
                    </mark> 
                </div>
            </div>
              <div class="row" id="perusahaanDalam">
                <div class="col-md-4">
                  <div class="form-group {{ $errors->has('nama_perusahaan') ? 'has-error' : '' }}">
                      <label>Nama Perusahaan :</label>
                      <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control"  value="{{ $model->nama_perusahaan }}" autocomplete="off" readonly="" >
                      <span class="text-danger">{{ $errors->first('nama_perusahaan') }}</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group {{ $errors->has('jumlah_pekerja') ? 'has-error' : '' }}">
                      <label>Jumlah Pekerja :</label>
                      <input type="number" name="jumlah_pekerja" id="jumlah_pekerja" class="form-control" value="{{ $model->jumlah_pekerja }}" autocomplete="off" readonly="" >
                      <span class="text-danger">{{ $errors->first('jumlah_pekerja') }}</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group {{ $errors->has('alamat_perusahaan') ? 'has-error' : '' }}">
                      <label>Alamat :</label>
                      <input type="text" name="alamat_perusahaan" id="alamat_perusahaan" class="form-control" value="{{ $model->alamat_perusahaan }}" autocomplete="off" readonly="" >
                      <span class="text-danger">{{ $errors->first('alamat_perusahaan') }}</span>
                  </div>
                </div>
              </div>
              <div class="row" id="perusahaanLuar">
                <div class="col-md-4">
                  <div class="form-group {{ $errors->has('jenis_pekerjaan') ? 'has-error' : '' }}">
                        <label>Jenis Pekerjaan :</label>
                        <input type="text" name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control"  value="{{ $model->jenis_pekerjaan }}" autocomplete="off" readonly="">
                        <span class="text-danger">{{ $errors->first('jenis_pekerjaan') }}</span>
                  </div>
                </div>
              </div>
            <br>
            <div class="form-group row">
                <div class="col-lg-10">
                    <a href="{{ url(Request::segment(1)) }}" class="btn btn-sm bg-grey"><i class="icon-arrow-left13 mr-2"></i>Back</a>
                </div>
            </div>

        </div>    
    </div>
</div>

<div class="card">
    <div class="card-header header-elements-inline">
        <legend class="font-weight-semibold border-bottom-teal-400"><i class="icon-bookmark2 mr-2"></i> List Anggota
            {{-- <div class="pull-right">
                     <a href="{{ route('serikatpekerja.create') }}" class="btn btn-sm bg-teal-400">ADD <i class="icon-plus-circle2 ml-2"></i></a>
            </div> --}}
        </legend>
        <div class="header-elements">
            <div class="list-icons">
             {{--    <a href="{{ route('serikatpekerja.create') }}" class="btn btn-sm bg-teal-400">
                    <i class="icon-plus-circle2"></i>   
                    &nbsp;ADD
                </a> --}}
            </div>
        </div>
    </div>
    <table class="table" id="TableId">
        <thead>
            <tr>
                <th>No</th>
                <th>Serikat Pekerja</th>
                <th>Alamat</th>
                <th>Anggota</th>
            </tr>
        </thead>
    </table>
</div>

<div class="card">
    <div class="card-header header-elements-inline">
        <legend class="font-weight-semibold border-bottom-teal-400"><i class="icon-bookmark2 mr-2"></i> List Pengurus
            {{-- <div class="pull-right">
                     <a href="{{ route('serikatpekerja.create') }}" class="btn btn-sm bg-teal-400">ADD <i class="icon-plus-circle2 ml-2"></i></a>
            </div> --}}
        </legend>
        <div class="header-elements">
            <div class="list-icons">
             {{--    <a href="{{ route('serikatpekerja.create') }}" class="btn btn-sm bg-teal-400">
                    <i class="icon-plus-circle2"></i>   
                    &nbsp;ADD
                </a> --}}
            </div>
        </div>
    </div>
    <table class="table" id="TablePengurus">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>No HP</th>
                <th>Jenis Kelamin</th>
                <th>KTP</th>
            </tr>
        </thead>
    </table>
</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function() { 
        $('#TableId').DataTable({
            serverSide: true,
            processing: true,
            pageLength: 5,
            lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],

            ajax: {
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('federasi.apiMember') }}",
                type: "POST",
                data: {
                    'id': $('#serikat_pekerja_id').val()
                }
            },
            columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'serikat_pekerja_desc'},
                    {data: 'alamat'},
                    {data: 'total'}
                ],
            columnDefs: [
             {
                  "targets": 0,
                  "width": "5%"
             },
             {
                  "targets": 1,
                  "width": "20%"
             },
             {
                  "targets": 2,
                  "width": "auto"
             },
             {
                  "targets": 3,
                  "width": "10%"
             },
             ]            
        });
    });

    $(document).ready(function() { 
        $('#btn_refresh').on("click", function(){        
            reload_table();
        });
    });

    function reload_table()
    {
        var table = $('#TableId').DataTable();
        table.ajax.reload();
    }

    // Delete
    $(document).on('click', '.del_modal', function() {
        $('.id_delete').text($(this).data('id')),
        $('.desc_delete').text($(this).data('desc'))
        $('#modal-confirm-delete').modal('show');
       
    });


    // ------------------------------------------------------------------------


    $(document).ready(function() { 
        $('#TablePengurus').DataTable({
            serverSide: true,
            processing: true,
            pageLength: 5,
            lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],

            ajax: {
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('federasi.apiPengurus') }}",
                type: "POST",
                data: {
                    'id': $('#serikat_pekerja_id').val()
                }
            },
            columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'pengurus_nik'},
                    {data: 'pengurus_nama'},
                    {data: 'jabatan'},
                    {data: 'no_hp'},
                    {data: 'jk'},
                    {data: 'url_ktp', orderable: false, searchable: false}
                ],
            columnDefs: [
             {
                  "targets": 0,
                  "width": "5%"
             },
             {
                  "targets": 1,
                  "width": "15%"
             },
             {
                  "targets": 2,
                  "width": "auto"
             },
             {
                  "targets": 5,
                  "width": "5%",
                  "className": 'text-center'
             },
             {
                  "targets": 6,
                  "width": "5%",
                  "className": 'text-center'
             },
             ]            
        });
    });
</script>
@endpush