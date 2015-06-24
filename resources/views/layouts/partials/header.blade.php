<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Rifka Annisa - Database Kasus</title>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	
		<!-- Bootstrap -->
		{!! HTML::style( asset('css/app.css') ) !!}
		{!! HTML::style( asset('css/custom.css') ) !!}

	</head>
	<body>
 
	@if(Auth::check())
		@include('layouts.partials.nav-developer')
	@else
		@include('layouts.partials.nav-guest')
	@endif

	<div class="container">