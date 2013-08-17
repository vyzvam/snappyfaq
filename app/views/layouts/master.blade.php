<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $title }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    {{ HTML::style('vendors/bootstrap/2/css/bootstrap.css') }}
    {{ HTML::style('vendors/bootstrap/2/css/bootstrap-responsive.css') }}
    {{ HTML::script('vendors/jquery/jquery.js') }}
    {{ HTML::script('vendors/bootstrap/2/js/bootstrap.min.js') }}

</head>

<body>

	<div class="content">
		
		@include('layouts.header')

	</div>

	<div class="content">
		
		@yield('content')

	</div>

	<div class="content">
		
		@include('layouts.footer')
	
	</div>

</body>

</html>