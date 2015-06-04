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
  	
  	<!-- Fixed navbar -->
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
            <li class=""><a href="{{ route('administrasi') }}">Administrasi</a></li>
            <li class="dropdown">
              <a href="{{ route('konseling') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Konseling Klien <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="kasus">Kasus</a></li>
                <li><a href="klien">Klien</a></li>
              </ul>
            </li>
            <li class=""><a href="{{ route('mensprogram') }}">Men's Program</a></li>
            <li class=""><a href="{{ route('kamus') }}">Kamus Data</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">User Name</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">