@extends('layouts.layouts')

@section('content')

<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
            	<div class="card-header header-elements-inline">
					<h5 class="card-title">Roles - Setup Menu</h5>
					<div class="header-elements">
						<div class="list-icons">
							&nbsp;
			        	</div>
			    	</div>
				</div>
               	<div class="card-body">
						<form class="form form-horizontal" action="{{ route('roles.setupMenuSave') }}" method="post" >
						{{csrf_field()}}  	
							<div class="form-body">										
		                        <div class="form-group row {{ $errors->has('role_id') ? 'has-error' : '' }}">
									<label class="col-form-label col-lg-2 text-lg-right">Role Id </label>
									<div class="col-lg-5">
										<input type="text" class="form-control" placeholder="Enter text" name="role_id" readonly="" autocomplete="off" value="{{ $model->role_id }}">
										<input type="hidden" class="form-control" placeholder="Enter text" name="role_id" autocomplete="off" value="{{ $model->role_id }}">
									    <span class="text-danger">{{ $errors->first('role_id') }}</span>
									</div>
								</div>

								<div class="form-group row {{ $errors->has('role_des') ? 'has-error' : '' }}">
									<label class="col-form-label col-lg-2 text-lg-right">Role Desc </label>
									<div class="col-lg-5">
										<input type="text" class="form-control" placeholder="Enter text" name="role_desc" readonly="" autocomplete="off" value="{{ $model->role_desc }}">
									    <span class="text-danger">{{ $errors->first('role_desc') }}</span>
									</div>
								</div>
							</div>
							
							<div class="card-body">
            					<p class="lead">Choose Responsibility Menus</p>
            					<div>
            						{{ Form::checkbox('pilih',null,null, ['class' => 'all'])}} Check All
            					</div>
            					<div class="dropdown-divider"></div>
									<ul>
									  @php
						                $listMenuM1 = \Modules\Menus\Entities\MenusModel::getMenuM1() ;
						              @endphp
						                @foreach ($listMenuM1 as $key)
						                <li>
						         			{{ Form::checkbox('checkbox_menu[]', $key->menu_id, in_array($key->menu_id, $selectedRoles), ['class' => 'check' ]) }}
						                	<span class="text-bold-800">{{$key->menu_desc}}</span>

						                	@php
											$listMenuM2 = \Modules\Menus\Entities\MenusModel::getMenuM2($key->menu_id) ;
							                @endphp 

							                @foreach($listMenuM2 as $key2)
						                	<ul>
						                		<li>
						                			{{ Form::checkbox('checkbox_menu[]', $key2->menu_id, in_array($key2->menu_id, $selectedRoles), ['class' => 'check' ]) }}
								                	<span class="text-bold-800">{{$key2->menu_desc}}</span>
								                	@php
													$listMenuM3 = \Modules\Menus\Entities\MenusModel::getMenuM3($key2->menu_id) ;
									                @endphp 

									                @foreach($listMenuM3 as $key3)
								                	<ul>
								                		<li>
								                			{{ Form::checkbox('checkbox_menu[]', $key3->menu_id, in_array($key3->menu_id, $selectedRoles), ['class' => 'check' ]) }}
										                	<span class="text-bold-800">{{$key3->menu_desc}}</span>
								                		</li>
								                	</ul>
								                	@endforeach
						                		</li>
						                	</ul>
						                	@endforeach
						                </li>
									@endforeach
									</ul>
							</div>
							<div class="form-group row mb-0">
								<div class="col-lg-10 ml-lg-auto">
									<button type="submit" class="btn bg-teal-400">Save <i class="icon-paperplane ml-2"></i></button>
									<a href="{{ url(Request::segment(1)) }}" class="btn bg-grey ml-3">Cancel</a>
								</div>
							</div>
						</form>
	                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script src="{{ asset('template/global_assets/icheck/icheck.min.js ')}}"></script>
    <script src="{{ asset('template/global_assets/icheck/checkbox-radio.js')}}"></script>
@endpush
@push('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('template/global_assets/icheck/icheck.css')}}">
@endpush

@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){
	  $('input').iCheck({
	    checkboxClass: 'icheckbox_flat-red',
	    radioClass: 'iradio_flat'
	  });
	});

	$(function(){
		var checkAll = $('input.all');
	    var checkboxes = $('input.check');
	        
	    checkAll.on('ifChecked ifUnchecked', function(event) {        
	        if (event.type == 'ifChecked') {
	            checkboxes.iCheck('check');
	        } else {
	            checkboxes.iCheck('uncheck');
	        }
	    });
	    
	    checkboxes.on('ifChanged', function(event){
	        if(checkboxes.filter(':checked').length == checkboxes.length) {
	            checkAll.prop('checked', 'checked');
	        } else {
	            checkAll.removeProp('checked');
	        }
	        checkAll.iCheck('update');
	    });
	})

</script>
@endpush