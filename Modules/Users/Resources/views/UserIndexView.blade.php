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
        <h5 class="card-title">Users</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a href="{{ route('users.create') }}" class="btn btn-sm bg-teal-400">
                    <i class="icon-plus-circle2"></i>   
                    &nbsp; ADD
                </a>
            </div>
        </div>
    </div>
        <table class="table" id="usersTable" width="100%">
            <thead>
                <tr>
                    <th width="3%">Id</th>
                    <th width="5%">Username</th>
                    <th>Fullname</th>
                    {{-- <th>Email</th> --}}
                    <th>Role</th>
                    <th width="5%">Password</th>
                    <th width="5%">Edit</th>
                    <th width="5%">Delete</th>
                </tr>
            </thead>
        </table>
</div>


@endsection

@push('scripts')
<script>
    $(document).ready(function() { 
        $('#usersTable').DataTable({
            serverSide: true,
            processing: true,
            pageLength: 5,
            lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],

            ajax: {
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('users.api') }}",
                type: "POST"
            },
            columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'username'},
                    {data: 'name'},
                    // {data: 'email'},
                    {data: 'role_desc'},
                    {data: 'cp', orderable: false, searchable: false},
                    {data: 'edit', orderable: false, searchable: false},
                    {data: 'delete', orderable: false, searchable: false}
                ],
             columnDefs: [
              {
                  "targets": 4, // your case first column
                  "className": "text-center",
                  "width": "2%"
             },
             {
                  "targets": 5,
                  "className": "text-center",
                  "width": "2%"
             },
             {
                  "targets": 6,
                  "className": "text-center",
                  "width": "2%"
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
        var table = $('#usersTable').DataTable();
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
            url: '{{ route('users.destroy')}}',
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
    });
    // End Delete
</script>
@endpush
