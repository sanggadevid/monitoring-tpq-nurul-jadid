<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('template/images/favicon.png')}}">
    <!-- Custom Stylesheet -->
    <link href="{{asset('template/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">
    

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="/home">
                    <b class="logo-abbr"><img src="{{asset('template/images/logo.png')}}" alt=""> </b>
                    <span class="logo-compact"><img src="{{asset('template/images/logo-compact.png')}}" alt=""></span>
                    <span class="brand-title">
     
                        <span  ><img src="{{asset('storage/images/logo.png')}}" alt="" width="60px" ></span> <span style="color:white;font-size: 14px"> ( TPQ ) Nurul Jadid</span>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                  
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                 
                
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="{{asset('template/images/user/1.png')}}" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        @if(Auth::user()->role == 'admin')
                                        <li>
                                            <a href="/pengguna"><i class="icon-user"></i> <span>Admin</span></a>
                                        </li>
                                      
                                        @endif
                                     
                                        
                                        <hr class="my-2">
                                     
                                        <li><a href="/logout"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Home</li>
                 
                   {{-- <li>
                        <a href="/pengguna" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Data Admin</span>
                        </a>
                    </li> --}}
                    @if(Auth::user()->role == 'admin')
                        
                  
                    <li>
                        <a href="/guru" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Data Guru</span>
                        </a>
                    </li>
                     <li>
                        <a href="/santri" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Data Santri</span>
                        </a>
                    </li>
                     <li>
                        <a href="/kelas" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Data Kelas</span>
                        </a>
                    </li>
                     <li>
                        <a href="/walimurid" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Data Wali Murid</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->role == 'guru' || Auth::user()->role == 'admin')
                    <li>
                        <a href="/harian" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Catatan Harian</span>
                        </a>
                    </li>
                    <li>
                        <a href="/bulanan" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Monitoring Bulanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/smesteran" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Monitoring Semesteran</span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->role == 'walimurid')
                    <li>
                        <a href="/harian" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Catatan Harian</span>
                        </a>
                    </li>
                    <li>
                        <a href="/bulanan" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Monitoring Bulanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/smesteran" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Monitoring Semesteran</span>
                        </a>
                    </li>
                    @endif
                    {{-- <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Laporan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./page-login.html">Laporan Catatan Harian</a></li>
                            <li><a href="./page-register.html">Laporan Monitoring Bulanan</a></li>
                            <li><a href="./page-lock.html">Laporan Monitoring Semesteran</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="./page-error-404.html">Error 404</a></li>
                                    <li><a href="./page-error-403.html">Error 403</a></li>
                                    <li><a href="./page-error-400.html">Error 400</a></li>
                                    <li><a href="./page-error-500.html">Error 500</a></li>
                                    <li><a href="./page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

     {{-- batas --}}
     @yield('content')
     {{-- //batas --}}
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="#">( TPQ ) Nurul Jadid</a> {{date('Y')}}</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('template/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('template/js/custom.min.js')}}"></script>
    <script src="{{asset('template/js/settings.js')}}"></script>
    <script src="{{asset('template/js/gleek.js')}}"></script>
    <script src="{{asset('template/js/styleSwitcher.js')}}"></script>

    <script src="{{asset('template/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('template/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
    <script src="{{asset('template/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('template/js/plugins-init/chartjs-init.js')}}"></script>
    <script src="{{asset('template/chart.js')}}"></script>
    

</body>

</html>