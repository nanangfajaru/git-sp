@extends('layouts.layouts')

@section('content')

<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h4 class="card-title"><i class="ft-align-right"></i> Report User</h4>
                  	<div class="heading-elements">
						<ul class="list-inline mb-0">
{{-- 							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> --}}
							<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
							{{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
						</ul>
					</div>
                </div>
                <div class="card-content collapse show">
                  	<div class="card-body">
						<div class="card-text">
							&nbsp;
						</div>
						<form class="form form-horizontal" action="{{ route('rpt_user.download') }}" method="post" >
						{{csrf_field()}}  	
							<div class="form-body">										
				                <div class="form-group row" {{ $errors->has('role_id') ? 'has-error' : '' }}>
	                            	<label class="col-md-4 label-control" >Role Desc</label>
		                            <div class="col-md-4">
		                            	{!! Form::select('role_id', $dropdown_role, null, ['class' => 'form-control','placeholder' => '- Pilih -', 'id' => 'role_id' ]) !!}
						            <span class="text-danger">{{ $errors->first('role_id') }}</span>
		                            </div>
		                        </div>
							</div>							
							<div class="form-actions center">
	                            <button type="button" class="btn btn-sm btn-info bg-lighten-1" id="btnUser">
	                                <i class="la la-check"></i> Filter
	                            </button>
	                            <button type="submit" class="btn btn-sm bg-success bg-lighten-1">
	                                <i class="la la-download"></i> Excel
	                            </button>

	                            {{-- 
                                        <button type="button" class="btn bg-success bg-lighten-1 dropdown-toggle btn-sm" data-toggle="dropdown">
                                        <i class="la la-download"></i>
                                        	
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">
                                            Excel
                                        	</a>
                                            <a class="dropdown-item" href="#">
                                            PDF
                                            </a>
                                        </div> --}}
	                        </div>
						</form>
	                </div>
					<div class="card-body card-dashboard responsive">
						<table id="reportUserTable" class="table table-striped table-bordered" width="100%">
		                    <thead>
		                        <tr>
		                            <th width="10px">#</th>
		                            <th>Username</th>
		                            <th>Full Name</th>
		                            <th>Role</th>
		                        </tr>
		                    </thead>
		                </table> 
		            </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    $(document).ready(function() { 
        $('#reportUserTable').DataTable({
            serverSide: true,
            processing: true,
            // pageLength: 5,
            lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
            bInfo: false,
            bLengthChange: false,
            iDisplayLength: -1,
            paging: false,

            ajax: {
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('rpt_user.api') }}",
                data: function (d) {
                        d.role_id = $('select[name=role_id]').val();
                    },
                type: "POST"
            },
            columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'username'},
                    {data: 'name'},
                    {data: 'role_desc'}
                ]
        });
    });

    $(document).ready(function(){        
            $('#btnUser').click(function(){//if reload datatable using additional button click
                var role_id = $('#role_id').val();                        
                var table = $('#reportUserTable').DataTable();
                table.destroy();//jangan lupa ditambahkan jika akan mereload ulang datatable
                
                var table = $('#reportUserTable').DataTable({
                                serverSide: true,
                                processing: true,
                                pageLength: 5,
                                lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
                                bInfo: false,
					            bLengthChange: false,
					            iDisplayLength: -1,
					            paging: false,

                                ajax: {
                                    headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: "{{ route('rpt_user.api') }}",
                                    data: {
                                        role_id: role_id
                                    },
                                    type: "POST"
                                },
                                columns: [
                                        {data: 'DT_RowIndex'},
                                        {data: 'username'},
                                        {data: 'name'},
                                        {data: 'role_desc'}
                                    ]
                            });
                
                // alert('Click');
            });
        });
</script>
@endpush