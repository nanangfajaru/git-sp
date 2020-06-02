<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kementerian Desa, Pembangunan Daerah Tertinggal dan Transmigrasi</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/global_assets/css/icons/icomoon/styles.css ')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/bootstrap.min.css ')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/bootstrap_limitless.min.css ')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/layout.min.css ')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/components.min.css ')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/colors.min.css ')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('template/global_assets/js/main/jquery.min.js ')}}"></script>
    <script src="{{ asset('template/global_assets/js/main/bootstrap.bundle.min.js ')}}"></script>
    <script src="{{ asset('template/global_assets/js/plugins/loaders/blockui.min.js ')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('template/global_assets/js/plugins/forms/styling/uniform.min.js ')}}"></script>

    <script src="{{ asset('template/assets/js/app.js ')}}"></script>
    <script src="{{ asset('template/global_assets/js/demo_pages/login.js ')}}"></script>
    <script src="{{ asset('template/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
    <!-- /theme JS files -->

</head>

<body>

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">
               
                <!-- Login card -->
                <form class="login-form" action="{{ route('ep.save') }}" method="POST">
                    {{csrf_field()}}
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                {{-- <img class="" alt="Logo" width="50%" src="{{asset('template/image/kemendesa_logo.png')}}"> --}}
                                <h5 class="mb-0 text-danger-700">Your Password Expired</h5>
                                <span class="d-block text-muted">Please change your password</span>
                            </div>

                                @if(Session::has('notif'))
                                    <div class="alert bg-danger-400">
                                        <a class="close" data-dismiss="alert">&times;</a>
                                        <span>{{Session::get('notif')}}</span>
                                    </div>
                                @endif 
                                @if(Session::has('cp'))
                                     @push('scripts')
                                          <script type="text/javascript">
                                            $(document).ready(function() { 
                                                swalCp();
                                                });
                                          </script>
                                      @endpush
                                @endif

                            <div class="form-group form-group-feedback form-group-feedback-left {{ $errors->has('username') ? 'has-error' : '' }}">
                                <input class="form-control placeholder-no-fix" type="hidden" autocomplete="off" name="user_id" value="{{ $model->user_id }}" required="" />

                                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="{{ $model->name }}" required="" readonly=""  />
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left {{ $errors->has('old_password') ? 'has-error' : '' }}">
                                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Old Password" name="old_password" value="{{ old('old_password') }}" required="" autofocus="" />
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left {{ $errors->has('password') ? 'has-error' : '' }}">
                                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="New Password" name="password" value="{{ old('password') }}" required="" />
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="form-group form-group-feedback form-group-feedback-left {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm Password" name="password_confirmation" value="{{ old('password_confirmation') }}" required="" />
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                            <div class="form-group form-group-feedback form-group-feedback-left" >
                                <a href="#" id="cancelCp">Sign In Page</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn bg-{{ \Config::get('app.theme') }} btn-block">Change Password <i class="icon-lock2 ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- Form Logout --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                {{-- End Logout --}}
                <!-- /login card -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>
</html>

@stack('scripts')
<script type="text/javascript">
        // $(document).ready(function(){

        // });
        function swalCp() {
            swal.setDefaults({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-light'
            });
            swal({
                title: 'Successfully',
                text: 'Please Login Again !',
                type: 'success'
            }).
            then(function() {
                    document.getElementById('logout-form').submit() ;
                });
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() { 
            $('#cancelCp').on("click", function(){        
                document.getElementById('logout-form').submit() ;
            });
        });
    </script> 

