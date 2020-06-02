
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
    <script src="{{ asset('template/global_assets/js/plugins/forms/selects/select2.min.js ')}}"></script>
    <script src="{{asset('template/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js ')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('template/global_assets/js/plugins/forms/styling/uniform.min.js ')}}"></script>

    <script src="{{ asset('template/assets/js/app.js ')}}"></script>
    <script src="{{ asset('template/global_assets/js/demo_pages/login.js ')}}"></script>
    <script src="{{ asset('template/global_assets/js/demo_pages/form_select2.js ')}}"></script>

    <!-- /theme JS files -->

</head>

<body>

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content justify-content-center align-items-center">

               @if(Session::has('alert'))
                            <div class="alert bg-danger">
                                <a class="close" data-dismiss="alert">&times;</a>
                                <span> <b>{{Session::get('alert')}}</b></span>
                            </div>
                 @endif
                 
            <div class="card">
                <form action="{{ route('daftarSave') }}" method="post" class="" enctype="multipart/form-data">
                {{csrf_field()}}  
                <div class="card-header header-elements-inline">
                    <legend class=" border-bottom-{{ \Config::get('app.theme') }}"><i class="icon-bookmark2 mr-2"></i> Formulir 
                    </legend>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label id="labelJenis">Jenis :</label>
                                    <select name="kategori" class="form-control select" required="" id="jenis">
                                      <option value=""> -Pilih- </option>
                                      <option value="sp">Serikat Pekerja</option>
                                      <option value="fd">Federasi</option>
                                      <option value="kd">Konfederasi</option>
                                    </select>
                                       <span class="text-danger">{{ $errors->first('kategori') }}</span>
                                </div>
                                <div class="form-group">
                                    <label id="labelNama">Nama :</label>
                                      <input type="text" class="form-control" placeholder="Nama" name="serikat_pekerja_desc" autocomplete="off" value="{{ old('serikat_pekerja_desc') }}" required="" >
                                       <span class="text-danger">{{ $errors->first('serikat_pekerja_desc') }}</span>
                                </div>
                        </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label>Upload Logo :</label>
                            <input type="file" placeholder="Enter text" name="url_logo" autocomplete="off" value="{{ old('url_logo') }}" required="" class="form-control-uniform" data-fouc>
                            <span class="text-danger">{{ $errors->first('url_logo') }}</span>
                        </div>{{-- 
                        <div class="form-group">
                          <label>Afiliasi :</label>
                            <input type="text" class="form-control" placeholder="Afiliasi" name="afiliasi" autocomplete="off" value="{{ old('afiliasi') }}" required="">
                            <span class="text-danger">{{ $errors->first('afiliasi') }}</span>
                        </div> --}}

                        <div class="form-group">
                          <label id="labelNs">Nama Singkat :</label>
                            <input type="text" class="form-control" placeholder="Nama Singkat " name="nama_singkat" autocomplete="off" value="{{ old('nama_singkat') }}" >
                            <span class="text-danger">{{ $errors->first('nama_singkat') }}</span>
                        </div>
                    </div>
                    </div>
                    
                    <br>
                    <div class="form-group row">
                        <div class="col-lg-10">
                            {{-- <a href="{{ url(Request::segment(1)) }}" class="btn btn-sm bg-grey"><i class="icon-arrow-left13 mr-2"></i>Back</a> --}}
                            <a href="{{ route('login') }}" class="btn btn-sm bg-grey"><i class="icon-arrow-left13 mr-2"></i>Back</a>
                            <button type="submit" class="btn bg-{{ \Config::get('app.theme')}}">Save <i class="icon-floppy-disk ml-2"></i></button>
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
<script type="text/javascript">
          $('.form-control-uniform').uniform({
            fileButtonClass: 'action btn bg-{{ \Config::get('app.theme')}}',
            fileButtonHtml: 'Upload Logo'
        });
</script>
<script type="text/javascript">
$(document).ready(function(){
  $('#jenis').change(function() {
    if ($(this).val() === 'sp') {
        $('#labelNama').text('Nama Serikat');
        $('#labelNs').text('Nama Singkat Serikat');
    } else if ($(this).val() === 'fd') {
        $('#labelNama').text('Nama Federasi');
        $('#labelNs').text('Nama Singkat Federasi');
    } else if ($(this).val() === 'kd') {
        $('#labelNama').text('Nama Konfederasi');
        $('#labelNs').text('Nama Singkat Konfederasi');
    } 
  });
});
</script>