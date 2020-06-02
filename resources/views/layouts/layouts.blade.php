
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta content="{{ csrf_token() }}" name="csrf-token" >
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/image/kemnaker/favicon.ico')}}">
  <title>Kementerian Ketenagakerjaan RI</title>

  <!-- Global stylesheets -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> --}}
  <link href="{{asset('template/global_assets/css/icons/icomoon/styles.css ')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('template/global_assets/css/icons/fontawesome/styles.min.css ')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/assets/css/bootstrap.min.css ')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/assets/css/bootstrap_limitless.min.css ')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/assets/css/layout.min.css ')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/assets/css/components.min.css ')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/assets/css/colors.min.css ')}}" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->
  @stack('css')

  <!-- Core JS files -->
  <script src="{{asset('template/global_assets/js/main/jquery.min.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/main/bootstrap.bundle.min.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/loaders/blockui.min.js ')}}"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script src="{{asset('template/global_assets/js/plugins/tables/datatables/datatables.min.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/forms/selects/select2.min.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/demo_pages/datatables_responsive.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/plugins/notifications/noty.min.js ')}}"></script>
  <script src="{{ asset('template/global_assets/js/plugins/forms/styling/uniform.min.js ')}}"></script>

  
  <script src="{{asset('template/assets/js/app.js ')}}"></script>
  <script src="{{asset('template/global_assets/js/demo_pages/form_select2.js ')}}"></script>
  <!-- /theme JS files -->
  
</head>

<body class="navbar-top">

  {{-- {{ \Config::get('app.theme') }} --}}
  
  <!-- Main navbar -->
  <div class="navbar navbar-expand-md navbar-dark bg-{{ \Config::get('app.theme') }} fixed-top">
    <div class="">
    {{-- <div class="navbar-brand"> --}}
      {{-- <a href="{{route('home')}}" class="d-inline-block"> --}}
        {{-- <img src="{{ asset('template/global_assets/images/logo_light.png')}}" alt=""> --}}
        {{-- <img src="{{ asset('template/image/siapmas_1.png')}}" alt="" width="240" height="34"> --}}
        {{-- <h3>KEMENDESA</h3> --}}
      {{-- </a> --}}
                  <div class="container d-flex h-100">
                    <div class="row justify-content-center align-self-center font-medium-3">
                            <a href="{{route('home')}}" class="d-inline-block text-white" style="font-size: 18px">
                              {{-- <img src="{{ asset('template/global_assets/images/logo_light.png')}}" alt=""> --}}
                              {{-- <img src="{{ asset('template/image/kemnaker.png')}}" alt="" width="240" height="34"> --}}
                              Serikat Pekerja / Serikat Buruh
                            </a>
                    </div>
                  </div>
    </div>
    <div class="d-md-none">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
        <i class="icon-tree5"></i>
      </button>
      <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
        <i class="icon-paragraph-justify3"></i>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
            <i class="icon-paragraph-justify3"></i>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown dropdown-user">
          <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
            <span class="icon-user-check"></span>
            <span>{{ Auth::user()->name}}</span>
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('cp.change', Crypt::encrypt(Auth::user()->user_id) ) }}" class="dropdown-item"><i class="icon-lock2"></i> Change Password</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!-- /main navbar -->


  <!-- Page content -->
  <div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

      <!-- Sidebar mobile toggler -->
      <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
          <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
          <i class="icon-screen-full"></i>
          <i class="icon-screen-normal"></i>
        </a>
      </div>
      <!-- /sidebar mobile toggler -->


      <!-- Sidebar content -->
      <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <br>
            <!-- Main -->
            <li class="nav-item-header">
              <div class="text-uppercase font-size-xs line-height-xs">Home</div>
                <i class="icon-menu" title="Main"></i>
            </li>
            @if(Request::segment(1) == 'home')
                @php
                $active = 'active' ;
                @endphp
            @else
                @php
                $active = '' ;
                @endphp                            
            @endif
            <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link {{$active}}">
                <i class="icon-home4"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item-header">
              <div class="text-uppercase font-size-xs line-height-xs">Main</div> 
                <i class="icon-menu" title="Main"></i>
            </li>

              @php
                $listMenuM1 = App\Model\LoginModel::getMenuM1(Auth::user()->role_id) ;
              @endphp
              @foreach ($listMenuM1 as $row)
                  @php
                  $listMenuM2 = App\Model\LoginModel::getMenuM2(Auth::user()->role_id,$row->menu_id) ;
                  $checkOpenSM2 = App\Model\LoginModel::checkOpenSM2(Auth::user()->role_id,$row->menu_id,Request::segment(1)) ;
                  $checkOpenSM23 = App\Model\LoginModel::checkOpenSM23(Request::segment(1)) ;
                  // dd(implode($checkOpenSM23));
                  @endphp
                  @if(Request::segment(1) == $row->menu_url )
                      @php
                      $active = 'active' ;
                      @endphp
                  @else
                      @php
                      $active = '' ;
                      @endphp                               
                  @endif


                  @php  
                  $child = $listMenuM2->count();
                  @endphp
                  @if ($child >= 1)
                        @php
                        $child_class = 'nav-item-submenu ' ;
                        $submenu_class = 'nav-group-sub' ;
                        @endphp 
                  @else
                        @php
                        $child_class = '' ;
                        $submenu_class = '' ;
                        @endphp 
                  @endif

                  @if ($checkOpenSM2 >= 1 )
                        @php
                        $open = 'nav-item-expanded nav-item-open' ;
                        @endphp 
                  @else
                        @php
                        $open = '' ;
                        @endphp 
                  @endif                   
                  @if (implode($checkOpenSM23) == $row->menu_id )
                        @php
                        $open2 = 'nav-item-expanded nav-item-open' ;
                        @endphp 
                  @else
                        @php
                        $open2 = '' ;
                        @endphp 
                  @endif   
                <li class="nav-item {{ $child_class }} {{$open}} {{$open2}}">
                  <a href="{{ url($row->menu_url) }}" class="nav-link {{ $active }}">
                    <i class="{{ $row->menu_icon}}"></i>
                    <span>{{ $row->menu_desc }} </span>
                  </a>
                  <ul class="nav {{ $submenu_class }}">
                    @foreach ($listMenuM2 as $row2)
                        @php
                        $listMenuM3 = App\Model\LoginModel::getMenuM3(Auth::user()->role_id,$row2->menu_id) ;
                        $checkOpenSM3 = App\Model\LoginModel::checkOpenSM3(Auth::user()->role_id,$row2->menu_id,Request::segment(1)) ;

                        @endphp
                        @if(Request::segment(1) == $row2->menu_url)
                            @php
                            $active = 'active' ;
                            @endphp
                        @else
                            @php
                            $active = '' ;
                            @endphp                            
                        @endif

                        @php  
                        $child = $listMenuM3->count();
                        @endphp
                        @if ($child >= 1 )
                              @php
                              $child_class = 'nav-item-submenu' ;
                              $submenu_class = 'nav-group-sub' ;
                              @endphp 
                        @else
                              @php
                              $child_class = '' ;
                              $submenu_class = '' ;
                              @endphp 
                        @endif 
                        @if ($checkOpenSM3 >= 1 )
                              @php
                              $open = 'nav-item-expanded nav-item-open' ;
                              @endphp 
                        @else
                              @php
                              $open = '' ;
                              @endphp 
                        @endif 

                        <li class="nav-item {{ $child_class }} {{$open}}">
                          <a href="{{ url($row2->menu_url) }}" class="nav-link {{$active}}">
                          <i class="{{ $row2->menu_icon}}"></i>
                          <span>{{ $row2->menu_desc }} </span>
                        </a>
                        <ul class="nav {{$submenu_class}}">
                          @foreach ($listMenuM3 as $row3)
                              @if(Request::segment(1) == $row3->menu_url )
                                  @php
                                  $active = 'active' ;
                                  @endphp
                              @else
                                  @php
                                  $active = '' ;
                                  @endphp                               
                              @endif
                          <li class="nav-item">
                              <a href="{{ url($row3->menu_url)}}" class="nav-link {{$active}}">
                                <i class="{{ $row3->menu_icon}}"></i>
                                <span>{{ $row3->menu_desc }}</span>
                              </a>
                            </li>                          
                          @endforeach
                        </ul>
                        </li>                     
                    @endforeach
                  </ul>                  
                </li>
            @endforeach
            <!-- /main -->

          </ul>
        </div>
        <!-- /main navigation -->

      </div>
      <!-- /sidebar content -->
      
    </div>
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">
      <div class="page-header page-header-light">
        {{-- <br> --}}
      </div>
      <!-- Content area -->
      <div class="content">
        
        <!-- Form layouts -->
          @yield('content')
        <!-- /form layouts -->

      </div>
      <!-- /content area -->

          @include('layouts.modal_delete')

      <!-- Footer -->
      <div class="navbar navbar-expand-lg navbar-light">
        <div>
          <span class="navbar-text">
            &copy; 2019. Kementerian Ketenagakerjaan Republik Indonesia
          </span>
        </div>
      </div>
      <!-- /footer -->

    </div>
    <!-- /main content -->

  </div>
  <!-- /page content -->

@stack('scripts')
<script type="text/javascript">
    {{-- $(document).ready(function() { --}}

    // });

      function toastrAlert(notif) { 
        Noty.overrideDefaults({
            theme: 'limitless',
            layout: 'topRight',
            type: 'alert',
            timeout: 2500
        });
        new Noty({
                layout: 'bottomRight',
                text: notif,
                type: 'success',
                closeWith: ['button']
            }).show();
    }

</script>
<script type="text/javascript">      
    function toastrDanger(notif) { 
        Noty.overrideDefaults({
            theme: 'limitless',
            layout: 'topRight',
            type: 'alert',
            timeout: 2500
        });
        new Noty({
                layout: 'bottomRight',
                text: notif,
                type: 'error',
                closeWith: ['button']
            }).show();
    }
</script>

</body>
</html>
