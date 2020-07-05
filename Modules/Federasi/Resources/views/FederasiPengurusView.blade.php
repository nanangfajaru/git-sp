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
                 <h6 class="card-title"><i class="icon-users4 mr-2"></i> Pengurus Federasi </h6>
        <div class="header-elements">
            <div class="list-icons">
                <a><i class="icon-arrow-down32"></i></a>
                {{-- <a class="list-icons-item" data-action="remove"></a> --}}
            </div>
        </div>
    </div>

    <div id="accordion-item-default2" class="collapse show" data-parent="#accordion-default">
    
        <form action="{{ route('federasi.pengurusSave') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}    
            <div class="card-body">
                <div class="row"> 
                        <div class="col-md-12">
                            <div class="form-group" >
                                <label> Federasi :</label>
                                    <input type="hidden" class="form-control" placeholder="Text" name="serikat_pekerja_id" autocomplete="off" value=" {{ $model->serikat_pekerja_id}}" id="serikat_pekerja_id">
                                    <input type="text" class="form-control" placeholder="Text" name="serikat_pekerja_desc" autocomplete="off" value=" {{ $model->serikat_pekerja_desc}}" readonly="">
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('pengurus_nik') ? 'has-error' : '' }} " >
                                <label> NIK Pengurus</label>
                                    <input type="number" class="form-control" placeholder="NIK Pengurus" name="pengurus_nik" autocomplete="off" value="{{ old('pengurus_nik') }}" id="pengurus_nik"  autofocus="" required="">
                                    <span class="text-danger">{{ $errors->first('pengurus_nik') }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('pengurus_nama') ? 'has-error' : '' }}" >
                                <label> Nama Pengurus</label>
                                    <input type="text" class="form-control" placeholder="Nama Pengurus" name="pengurus_nama" autocomplete="off" value=" {{ old('pengurus_nama') }}" id="pengurus_nama" required="" >
                                    <span class="text-danger">{{ $errors->first('pengurus_nama') }}</span>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('jabatan') ? 'has-error' : '' }}" >
                                <label> Jabatan</label>
                                    <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" autocomplete="off" value=" {{ old('jabatan') }}" id="jabatan" required="" >
                                    <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('no_hp') ? 'has-error' : '' }} " >
                                <label> No Hp</label>
                                    <input type="number" class="form-control" placeholder="No HP" name="no_hp" autocomplete="off" value="{{ old('no_hp') }}" id="no_hp" required="">
                                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('url_ktp') ? 'has-error' : '' }}" >
                                <label> Upload KTP</label>
                                    <input type="file" class="form-control-uniform" placeholder="Upload KTP" name="url_ktp" autocomplete="off" value=" {{ old('url_ktp') }}" id="url_ktp" required="">
                                    <span class="text-danger">{{ $errors->first('url_ktp') }}</span>
                            </div>
                        </div>
                        <div>
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

                <div class="form-group row">
                    <div class="col-lg-10">
                        <a href="{{ url(Request::segment(1)) }}" class="btn btn-sm bg-grey"><i class="icon-arrow-left13 mr-2"></i>Back</a>
                        <button type="submit" class="btn bg-{{ \Config::get('app.theme')}}">Save <i class="icon-floppy-disk ml-2"></i></button>

                    </div>
                    <div class="col-md-2">
                        {{-- <a href="{{ route('federasi') }}" type="button" class="btn bg-{{ \Config::get('app.theme')}} pull-right" id="btnNext">Selesai <i class=" icon-checkmark4 ml-2"></i></a> --}}
                        <a href="{{ route('federasi.member', Crypt::encrypt($model->serikat_pekerja_id)) }}" type="button" class="btn bg-{{ \Config::get('app.theme')}} pull-right" id="btnNext">Member <i class=" icon-checkmark4 ml-2"></i></a>
                    </div>
                </div>

            </div>
        </form>
    
    </div>
</div>

<div class="card">
    <div class="card-header header-elements-inline">
        <legend class="font-weight-semibold border-bottom-teal-400"><i class="icon-bookmark2 mr-2"></i> List Pengurus
            {{-- <div class="pull-right">
                     <a href="{{ route('federasi.create') }}" class="btn btn-sm bg-teal-400">ADD <i class="icon-plus-circle2 ml-2"></i></a>
            </div> --}}
        </legend>
        <div class="header-elements">
            <div class="list-icons">
             {{--    <a href="{{ route('federasi.create') }}" class="btn btn-sm bg-teal-400">
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
                <th>Jabatan</th>
                <th>No HP</th>
                <th>Jenis Kelamin</th>
                <th>KTP</th>
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
        fileButtonHtml: 'Upload KTP'
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
                    {data: 'url_ktp', orderable: false, searchable: false},
                    {data: 'delete', orderable: false, searchable: false}
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
             {
                  "targets": 7,
                  "width": "5%",
                  "className": 'text-center'
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

    $('.modal-footer').on('click', '.btn_delete', function() {
        $.ajax({
            type: 'post',
            url: '{{ route('federasi.destroyPengurus') }}',
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

</script>
@endpush