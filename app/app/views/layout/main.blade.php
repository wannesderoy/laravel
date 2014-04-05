<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	{{ HTML::style('css/bootstrap.min.css') }}
	
	<title>Authentication app</title>
</head>
<body>

	@if(Session::has('global'))

	<p>{{ Session::get('global') }}</p>

	@endif
	
	@include('layout.navigation')

	@yield('content')
	
</body>
</html>