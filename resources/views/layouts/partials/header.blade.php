<?php $user = (Auth::Check()) ? Auth::User() : null; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Rifka Annisa - Database Kasus</title>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	
		<!-- CSS -->
		<!-- {!! HTML::style( asset('css/app.css') ) !!} -->
		{!! HTML::style( asset('css/bootstrap.min.css') ) !!}
		{!! HTML::style( asset('css/custom.css') ) !!}
		{!! HTML::style( asset('css/jquery-ui.css') ) !!}
		{!! HTML::style( asset('css/jquery.dataTables.min.css') ) !!}

	</head>
	<body>
 
	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('root') }}">{!! HTML::image('images/logo.png', 'Rifka Annisa Logo', ['height=28','width=128']) !!}</a>
    </div>
    
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        @if(isset($user) && $user->jenis != "")
        	@include('layouts.partials.nav-'.str_replace(' ', '', $user->jenis))  
      	@endif
      </ul>

			<ul class="nav navbar-nav navbar-right">
        @if(isset($user) && $user->active == 1)
        	<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {!! Auth::user()->name !!} <span class="caret"></span></a>
					  <ul class="dropdown-menu" role="menu">
					    <li><a href="{!! route('user.show', Auth::user()->id) !!}">Profil</a></li>
					    <li><a href="{{ route('logout') }}">Keluar</a></li>
					  </ul>
					</li>

        @else
        	<li>
          	<a href="{{ url('/auth/register') }}">Mendaftar</a>
        	</li>

        @endif
      </ul>
			     
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="container">