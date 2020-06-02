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
    <div class="card-header header-elements-inline">
        <h5 class="card-title"><i class="icon-file-minus mr-2"></i>Anggaran Dasar Kadaluarsa</h5>
        <div class="header-elements">
            <div class="list-icons">
{{--                 <a href="{{ route('adkadaluarsa.create') }}" class="btn btn-sm bg-teal-400">
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
                <th>Nama</th>
                <th>Jenis</th>
                <th>Tanggal AD</th>
                <th>Status</th>
                {{-- <th>Delete</th> --}}
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
                url: "{{ route('adkadaluarsa.api') }}",
                type: "POST"
            },
            columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'serikat_pekerja_desc'},
                    {data: 'status'},
                    {data: 'tgl_berlaku_ad', orderable: false, searchable: false},
                    {data: 'statusAD', orderable: false, searchable: false}
                ],
            columnDefs: [
              {
                  "targets": 0, // your case first column
                  "className": "text-center",
                  "width": "5%"
             },
             {
                  "targets": 1,
                  "width": "auto"
             },
             {
                  "targets": 2,
                  "width": "auto"
             },
             {
                  "targets": 3,
                  "width": "auto"
             },
             {
                  "targets": 4,
                  "width": "15%"
             }
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
            url: '{{ route('adkadaluarsa.destroy')}}',
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
    // End Delete
</script>
@endpush
