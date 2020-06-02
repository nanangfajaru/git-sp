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
        <h5 class="card-title">Roles</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a href="{{ route('roles.create') }}" class="btn btn-sm bg-teal-400">
                    <i class="icon-plus-circle2"></i>   
                    &nbsp;ADD
                </a>
            </div>
        </div>
    </div>

    <table class="table" id="roleTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Role Id</th>
                <th>Role Desc</th>
                <th>Setup</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() { 
        $('#roleTable').DataTable({
            serverSide: true,
            processing: true,
            pageLength: 5,
            lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],

            ajax: {
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('roles.api') }}",
                type: "POST"
            },
            columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'role_id'},
                    {data: 'role_desc'},
                    {data: 'setupMenu', orderable: false, searchable: false},
                    {data: 'edit', orderable: false, searchable: false},
                    {data: 'delete', orderable: false, searchable: false}
                ],
            columnDefs: [
              {
                  "targets": 3, // your case first column
                  "className": "text-center",
                  "width": "2%"
             },
             {
                  "targets": 4,
                  "className": "text-center",
                  "width": "2%"
             },
             {
                  "targets": 5,
                  "className": "text-center",
                  "width": "2%"
             },
             {
                  "targets": 0,
                  "width": "5%"
             },
             {
                  "targets": 1,
                  "width": "10%"
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
        var table = $('#roleTable').DataTable();
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
            url: '{{ route('roles.destroy')}}',
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
