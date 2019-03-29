<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ config('global.site_title') }}
    </title>
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=error">
    </noscript>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/pages/css/login-4.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.ico') }}"/>
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/x-icon">
</head>
<!-- END HEAD -->

<body class="login">
<!-- BEGIN LOGO -->
<div class="logo" style="margin: 60px auto 0px;">
    <img src="{{ URL::asset('assets/img/.png') }}" alt="logo" class="logo-default"/>
</div>
<!-- END LOGO -->
@yield('content')
<div class="copyright">
    <?php echo date("Y"); ?> &copy; {{ config('global.site_title') }}
</div>
<!-- JavaScripts -->
<script src="{{ URL::asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript">
</script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript">
</script>
<script src="{{ URL::asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript">
</script>
<script src="{{ URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
        type="text/javascript">
</script>
<script src="{{ URL::asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript">
</script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"
        type="text/javascript">
</script>
<script src="{{ URL::asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"
        type="text/javascript">
</script>
<script src="{{ URL::asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"
        type="text/javascript">
</script>
<script src="{{ URL::asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript">
</script>
<script src="{{ URL::asset('assets/global/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript">
</script>
<script src="{{ URL::asset('assets/global/scripts/app.min.js') }}" type="text/javascript">
</script>
<script src="{{ URL::asset('assets/pages/scripts/login-4.min.js') }}" type="text/javascript">
</script>

@yield('scripts')
</body>
</html>
