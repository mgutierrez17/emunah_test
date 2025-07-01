<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Google Fonts  ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('notika/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('notika/css/owl.transitions.css') }}">
    <!-- meanmenu CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/meanmenu/meanmenu.min.css') }}">
    <!-- animate CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/animate.css') }}">
    <!-- normalize CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/normalize.css') }}">
    <!-- mCustomScrollbar CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- jvectormap CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/jvectormap/jquery-jvectormap-2.0.3.css') }}">
    <!-- notika icon CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/notika-custom-icon.css') }}">
    <!-- wave CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/wave/waves.min.css') }}">
    <!-- main CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/main.css') }}">
    <!-- style CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/style.css') }}">
    <!-- responsive CSS  ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika/css/responsive.css') }}">
    <!-- modernizr JS  ============================================ -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area" style="background-color: #1f2937; padding: 10px;">
                        <a href=""><img src="{{ asset('img/logo.png') }}" alt="Logo" width="120" height="auto" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <div class="flex items-center justify-end h-16">
                            <!-- Profile dropdown -->
                            <div class="ml-3 relative">
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    @livewire('componentes.menu')

    <div>
        <!-- Start Status area -->
        <div class="notika-status-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                            <div class="website-traffic-ctn">
                                <h2><span class="counter">78,600</span></h2>
                                <p>Total Pedidos en Curso</p>
                            </div>
                            <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                            <div class="website-traffic-ctn">
                                <h2><span class="counter">26,250</span>k</h2>
                                <p>Total Pedidos entregados</p>
                            </div>
                            <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                            <div class="website-traffic-ctn">
                                <h2>$<span class="counter">260,580</span></h2>
                                <p>Total Facturacion Gestion</p>
                            </div>
                            <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                            <div class="website-traffic-ctn">
                                <h2><span class="counter">15,800</span></h2>
                                <p>Total Pedidos en cancelados</p>
                            </div>
                            <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Status area-->
        <!-- Start Sale Statistic area-->
        <div class="sale-statistic-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sale-statistic-inner notika-shadow mg-tb-30">
                            <div class="curved-inner-pro">
                                <div class="curved-ctn">
                                    <h2>Historial de Ventas</h2>
                                    <p>muestra las ventas de la gestion actual</p>
                                </div>
                            </div>
                            <div id="curved-line-chart" class="flot-chart-sts flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Content -->
    <!-- End Content -->
    <!-- jquery  ============================================ -->
    <script src="{{ asset('notika/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS  ============================================ -->
    <script src="{{ asset('notika/js/bootstrap.min.js') }}"></script>
    <!-- wow JS  ============================================ -->
    <script src="{{ asset('notika/js/wow.min.js') }}"></script>
    <!-- price-slider JS  ============================================ -->
    <script src="{{ asset('notika/js/jquery-price-slider.js') }}"></script>
    <!-- owl.carousel JS  ============================================ -->
    <script src="{{ asset('notika/js/owl.carousel.min.js') }}"></script>
    <!-- scrollUp JS  ============================================ -->
    <script src="{{ asset('notika/js/jquery.scrollUp.min.js') }}"></script>
    <!-- meanmenu JS  ============================================ -->
    <script src="{{ asset('notika/js/meanmenu/jquery.meanmenu.js') }}"></script>
    <!-- counterup JS  ============================================ -->
    <script src="{{ asset('notika/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('notika/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('notika/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS  ============================================ -->
    <script src="{{ asset('notika/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- jvectormap JS  ============================================ -->
    <script src="{{ asset('notika/js/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('notika/js/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('notika/js/jvectormap/jvectormap-active.js') }}"></script>
    <!-- sparkline JS  ============================================ -->
    <script src="{{ asset('notika/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('notika/js/sparkline/sparkline-active.js') }}"></script>
    <!-- sparkline JS  ============================================ -->
    <script src="{{ asset('notika/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('notika/js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('notika/js/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('notika/js/flot/flot-active.js') }}"></script>
    <!-- knob JS  ============================================ -->
    <script src="{{ asset('notika/js/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('notika/js/knob/jquery.appear.js') }}"></script>
    <script src="{{ asset('notika/js/knob/knob-active.js') }}"></script>
    <!--  wave JS  ============================================ -->
    <script src="{{ asset('notika/js/wave/waves.min.js') }}"></script>
    <script src="{{ asset('notika/js/wave/wave-active.js') }}"></script>
    <!--  todo JS  ============================================ -->
    <script src="{{ asset('notika/js/todo/jquery.todo.js') }}"></script>
    <!-- plugins JS  ============================================ -->
    <script src="{{ asset('notika/js/plugins.js') }}"></script>
    <!--  Chat JS  ============================================ -->
    <script src="{{ asset('notika/js/chat/moment.min.js') }}"></script>
    <script src="{{ asset('notika/js/chat/jquery.chat.js') }}"></script>
    <!-- main JS ============================================ -->
    <script src="{{ asset('notika/js/main.js') }}"></script>
    <!-- alpinejs ============================================
    <script src="//unpkg.com/alpinejs" defer></script>-->

    <!-- tus otros scripts JS -->
    @stack('scripts')
</body>

</html>