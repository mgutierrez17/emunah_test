@push('styles')
    <!-- CSS de Notika -->
    <link rel="stylesheet" href="{{ asset('notika/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('notika/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('notika/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('notika/css/notika-custom-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('notika/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('notika/style.css') }}">
@endpush

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

@push('scripts')
    <script src="{{ asset('notika/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('notika/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('notika/js/wow.min.js') }}"></script>
    <script src="{{ asset('notika/js/jquery-price-slider.js') }}"></script>
    <script src="{{ asset('notika/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('notika/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('notika/js/meanmenu/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('notika/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('notika/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('notika/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('notika/js/sparkline/sparkline-active.js') }}"></script>
    <script src="{{ asset('notika/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('notika/js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('notika/js/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('notika/js/flot/flot-active.js') }}"></script>
    <script src="{{ asset('notika/js/plugins.js') }}"></script>
    <script src="{{ asset('notika/js/main.js') }}"></script>
@endpush
