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
                 <h6 class="card-title"><i class="icon-users4 mr-2"></i> Anggota Serikat Pekerja </h6>
        <div class="header-elements">
            <div class="list-icons">
                <a><i class="icon-arrow-down32"></i></a>
                {{-- <a class="list-icons-item" data-action="remove"></a> --}}
            </div>
        </div>
    </div>

    <div id="accordion-item-default2" class="collapse show" data-parent="#accordion-default">
    
        <form action="{{ route('serikatpekerja.anggotaSave') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}    
            <div class="card-body">
                <div class="row"> 
                        <div class="col-md-12">
                            <div class="form-group" >
                                <label> Serika Pekerja :</label>
                                    <input type="hidden" class="form-control" placeholder="Text" name="serikat_pekerja_id" autocomplete="off" value=" {{ $model->serikat_pekerja_id}}" id="serikat_pekerja_id">
                                    <input type="text" class="form-control" placeholder="Text" name="serikat_pekerja_desc" autocomplete="off" value=" {{ $model->serikat_pekerja_desc}}" readonly="">
                            </div>
                        </div>
                </div>
                <div class="row"> 
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('anggota_nik') ? 'has-error' : '' }} " >
                                <label> NIK Anggota</label>
                                    <input type="number" class="form-control" placeholder="NIK Anggota" name="anggota_nik" autocomplete="off" value="{{ old('anggota_nik') }}" id="anggota_nik" autofocus="" required="" >
                                    <span class="text-danger">{{ $errors->first('anggota_nik') }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('anggota_nama') ? 'has-error' : '' }}" >
                                <label> Nama Anggota</label>
                                    <input type="text" class="form-control" placeholder="Nama Anggota" name="anggota_nama" autocomplete="off" value="{{old('anggota_nama') }}" id="anggota_nama" required="" >
                                    <span class="text-danger">{{ $errors->first('anggota_nama') }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jenis Kelamin:</label>
                                <div class="form-group row">
                                     &nbsp;
                                     &nbsp;
                                    <input type="radio" value="laki-laki" class="styled" name="jk" checked="checked">
                                     &nbsp; Laki-Laki
                                     &nbsp;
                                    <input type="radio" value="perempuan" class="styled" name="jk">
                                     &nbsp; Perempuan
                                </div>
                                <span class="text-danger">{{ $errors->first('jk') }}</span>
                            </div>
                        </div>
                </div>
{{--                 <div class="row"> 
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('url_kta') ? 'has-error' : '' }}" >
                                <label> Upload KTA</label>
                                    <input type="file" class="form-control-uniform" placeholder="Upload KTA" name="url_kta" autocomplete="off" value=" {{ old('url_kta') }}" id="url_kta" >
                                    <span class="text-danger">{{ $errors->first('url_kta') }}</span>
                            </div>
                        </div>
                </div> --}}
                <br>
                <br>
                <div class="form-group row">
                    <div class="col-md-10">
                        <a href="{{ url(Request::segment(1)) }}" class="btn btn-sm bg-grey"><i class="icon-arrow-left13 mr-2"></i>Back</a>
                        <button type="submit" class="btn bg-{{ \Config::get('app.theme')}}">Save <i class="icon-floppy-disk ml-2"></i></button>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('serikatpekerja.pengurusNext', Crypt::encrypt($model->serikat_pekerja_id)) }}" type="button" class="btn bg-{{ \Config::get('app.theme')}} pull-right" id="btnNext">Pengurus <i class="icon-square-right ml-2"></i></a>
                    </div>
                </div>
            </div>


        </form>
    
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
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                {{-- <th>KTA</th> --}}
                <th>Delete</th>
            </tr>
        </thead>
    </table>
</div>

@endsection
@push('scripts')

{{-- <script src="{{ asset('template/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script> --}}
<script type="text/javascript">
     $(".styled").uniform();
</script>
<script type="text/javascript">
      $('.form-control-uniform').uniform({
        fileButtonClass: 'action btn bg-{{ \Config::get('app.theme')}}',
        fileButtonHtml: 'Upload KTA'
    });
</script>

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
                url: "{{ route('serikatpekerja.apiAnggota') }}",
                type: "POST",
                data: {
                    'id': $('#serikat_pekerja_id').val()
                }
            },
            columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'anggota_nik'},
                    {data: 'anggota_nama'},
                    {data: 'jk'},
                    // {data: 'url_kta', orderable: false, searchable: false},
                    {data: 'delete', orderable: false, searchable: false}
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
                  "width": "5%",
                  "className": 'text-center'
             },
             {
                  "targets": 4,
                  "width": "5%",
                  "className": 'text-center'
             },
             // {
             //      "targets": 5,
             //      "width": "5%",
             //      "className": 'text-center'
             // },
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

    $('.modal-footer').on('click', '.btn_delete', function() {
        $.ajax({
            type: 'post',
            url: '{{ route('serikatpekerja.destroyAnggota')}}',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.id_delete').text()
            },
            success: function(data)
            {   
                var notif = 'Successfully Delete !' ;
                toastrDanger(notif);
                $('#modal-confirm-delete').modal('toggle');
                reload_table();
            },
            error: function ()
            {
                alert('Error deleting data');
            }
        });
        reload_table();
    });

    // Save Anggota With AjaxSS
    // $(document).ready(function() { 
    //     $('#btnSave').on("click", function(){        
    //         var anggota_nik = $('#anggota_nik').val();
    //         var anggota_nama = $('#anggota_nama').val();
    //         var serikat_pekerja_id = $('#serikat_pekerja_id').val();

    //         $.ajax({
    //             type: 'post',
    {{-- //             url: '{{ route('serikatpekerja.anggotaSave')}}', --}}
    //             data: {
    //                 '_token': $('input[name=_token]').val(),
    //                 'serikat_pekerja_id': serikat_pekerja_id,
    //                 'anggota_nik': anggota_nik,
    //                 'anggota_nama': anggota_nama
    //             },
    //             success: function(data)
    //             {   
    //                 var notif = 'Successfully Saved !' ;
    //                 toastrAlert(notif);
    //                 reload_table();
    //                 $('#anggota_nik').val('');
    //                 $('#anggota_nama').val('');
    //                 $('#serikat_pekerja_id').val('');
    //             },
    //             error: function ()
    //             {
    //                 alert('Error save anggota');
    //             }
    //         });
    //     });
    // });
</script>
@endpush