
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
            <div class="content justify-content-center align-items-center">

            <div class="card">
                <div class="card-header header-elements-inline">
                    <legend class=" border-bottom-{{ \Config::get('app.theme') }}"><i class="icon-bookmark2 mr-2"></i> Pendaftaran Berhasil
                    </legend>
                </div>
                <div class="card-body">

                    <div class="alert bg-success">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <span> <b>Pendaftaran berhasil</b></span><br>
                        <span> Silahkan login, ganti password dan lengkapi data anda.</span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Username :</label>
                              <input type="text" class="form-control" placeholder="" name="" autocomplete="off" value="{{ $username }}" readonly="" >
                          </div>
                          <div class="form-group">
                            <label>Password :</label>
                              <input type="text" class="form-control" placeholder="" name="" autocomplete="off" value="123" readonly="">
                          </div>
                        </div>
                    </div>
                    
                    <br>
                    <div class="form-group row">
                        <div class="col-lg-10">
                            {{-- <a href="{{ url(Request::segment(1)) }}" class="btn btn-sm bg-grey"><i class="icon-arrow-left13 mr-2"></i>Back</a> --}}
                            <a href="{{ route('login') }}" class="btn btn-sm bg-grey"><i class="icon-arrow-left13 mr-2"></i>Login</a>
                            <a href="{{ route('daftar.cetak', $username) }}" target="_blank" class="btn btn-sm bg-grey"><i class="icon-printer2 mr-2"></i>Print</a>
                        </div>
                    </div>

                </div>
                </form>
            </div>

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>
</html>
