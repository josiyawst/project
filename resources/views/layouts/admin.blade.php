<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=error">
    </noscript>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports"
          name="description"/>
    <title>
        {{ config('global.site_title') }}
    </title>
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.ico') }}"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
          type="text/css"/>

    <link href="{{ URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css' ) }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/morris/morris.css' ) }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="{{ URL::asset('assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}"
          rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/datatable/datatables.css') }}">
    <link href="{{ URL::asset('assets/global/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css"/>
    @yield('styles')
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.ico') }}"/>
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/x-icon">
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
    <div class="page-header navbar navbar-fixed-top">
        <div class="page-header-inner ">
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
               data-target=".navbar-collapse">
						<span>
						</span>
            </a>

            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user">


                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <img alt="" class="img-circle" src="{{ URL::asset('assets/layouts/layout/img/avatar3_small.jpg') }}"/>
                            <span class="username username-hide-on-mobile">Welcome {{\Session::get('auth_user_name')}}</span>
                            <i class="fa fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>

                                <a href="{{ url('/cwadmin/profile')}}"><i class="icon-user"></i> My Profile</a>
                            </li>

                            <li>
                                <a href="{{ url('/cwadmin/logout')}}"><i class="icon-key"></i> Logout</a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="page-container">
        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse" style="padding-top: 10px;">
                <div class="page-logo">
                    <a href="">
                        <img src="{{ URL::asset('assets/img/.png') }}" alt="logo" class="logo-default img-responsive" width="181" height="95" style="margin-bottom: 25px;"/>
                    </a>
                    <div class="menu-toggler sidebar-toggler" style="margin-top: -18px; margin-right: 8px;">
							<span>
							</span>
                    </div>
                </div>
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                    data-slide-speed="200">
                    @include('admin_sidebar.admin_sidebar')
                </ul>
            </div>
        </div>

        <!-- Page Content Section -->
        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Page Footer Section -->
    <div class="page-footer">
        <div class="page-footer-inner">
            <?php echo date('Y');?> &copy; {{ config('global.site_title') }}
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up">
            </i>
        </div>
    </div>
</div>
<div class="quick-nav-overlay">
</div>
<span aria-hidden="true" class="quick-nav-bg"></span>
</nav>

<div class="quick-nav-overlay"></div>

<script src="{{ URL::asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/counterup/jquery.waypoints.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/counterup/jquery.counterup.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/amcharts/amcharts/amcharts.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/amcharts/amcharts/serial.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/amcharts/amcharts/pie.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/amcharts/amcharts/radar.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/amcharts/amcharts/themes/light.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/amcharts/amcharts/themes/patterns.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/amcharts/amcharts/themes/chalk.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/amcharts/ammap/ammap.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/amcharts/ammap/maps/js/worldLow.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/amcharts/amstockcharts/amstock.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/fullcalendar/fullcalendar.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/horizontal-timeline/horizontal-timeline.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.categories.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/pages/scripts/form-validation.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/pages/scripts/jquery.validate.custom.rules.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/pages/scripts/components-bootstrap-select.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootbox/bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"
        type="text/javascript">
</script>
<script src="{{ URL::asset('assets/pages/scripts/components-date-time-pickers.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/scripts/custom.js') }}" type="text/javascript"></script>

@yield('scripts')
</body>
</html>
