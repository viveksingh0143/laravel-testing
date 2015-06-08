<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Carmazic</title>

    <link rel="shortcut icon" href="/vamika/ico/vamikatech.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/vamika/ico/vamikatech-114-114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/vamika/ico/vamikatech-72-72.png" />
    <link rel="apple-touch-icon" href="/vamika/ico/vamikatech.png" />

    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/font-awesome/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/jquery-ui/jquery-ui.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/vamika/css/main.css?ver=1.0') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/vamika/themes/color-default.css') }}" />
    @yield('header')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
@include('layouts.analytics')

</head>
<body>
@include('layouts.backend.partials.navbar')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-2 col-md-12 main-col">
            <div class="main">
                @yield('content')
            </div>
            @include('layouts.backend.partials.footer')
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/vamika/js/main.js') }}"></script>
<script type="text/javascript">
    window.csrfToken = '<?php echo csrf_token(); ?>';
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>
<script type="text/javascript" src="{{ asset('/plugins/laravel/laravel.js') }}"></script>
@yield('footer')
</body>
</html>