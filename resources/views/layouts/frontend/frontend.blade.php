<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carmazic</title>

    <!-- Bootstrap -->
    <link href="{{ asset('/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/font-awesome/font-awesome.min.css') }}" />
	<link href="{{ asset('/plugins/animation-framework/animate.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/plugins/bootstrap-slider/bootstrap-slider.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/carmazic/css/layout.css') }}" rel="stylesheet">
	<link href="{{ asset('/plugins/animation-framework/animate.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/plugins/owl.carousel/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ asset('/plugins/owl.carousel/owl.theme.css') }}" rel="stylesheet">
	@yield('header')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
@include('layouts.analytics')

</head>
  <body>
	@include('layouts.frontend.partials.navbar')
	@yield('row_above_content')
	@yield('content')
	@include('layouts.frontend.partials.footer')
	@include('layouts.frontend.partials.compare_widgets')
	@include('layouts.frontend.partials.common_models')
	<script type="text/javascript" src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/wow/wow.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/plugins/bootstrap/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/plugins/owl.carousel/owl.carousel.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/plugins/bootstrap-slider/bootstrap-slider.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/carmazic/js/style.js') }}"></script>
	<script>
		new WOW().init();
	</script>
	@yield('footer')
  </body>
</html>