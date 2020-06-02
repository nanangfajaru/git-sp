
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kementerian Ketenagakerjaan RI</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/image/kemnaker/favicon.ico')}}">

    <!-- Global stylesheets -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> --}}
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
    <!-- /theme JS files -->

</head>

<body>

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

            @if(Session::has('alert'))
                    <div class="alert bg-danger">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <span> <b>{{Session::get('alert')}}</b></span>
                    </div>
            @endif
                 
                <!-- Login card -->
                <form class="login-form" action="{{ route('login') }}" method="POST">
                    {{csrf_field()}}
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img class="" alt="Logo" width="50%" src="{{asset('template/image/logo_kemnaker.png')}}">
                                <br>
                                <br>
                                <h5 class="mb-2">Aplikasi Serikat Pekerja / Serikat Buruh</h5>
                                <span class="d-block text-muted">Login to your account</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left {{ $errors->has('username') ? 'has-error' : '' }}">
                                <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" value="{{ old('username' )}}" autofocus="" required="">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left {{ $errors->has('password') ? 'has-error' : '' }}">
                                <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password' )}}" required="">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block bg-{{ \Config::get('app.theme') }}">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                            </div>
                            <div class="form-group login-options">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <a href="{{ route('daftar') }}"><u>REGISTER</u></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /login card -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>
</html>
