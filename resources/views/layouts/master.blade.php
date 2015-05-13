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
    <link href="css/app.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

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
          <a class="navbar-brand" href="/">{!! HTML::image('images/logo.png', 'Rifka Annisa Logo', ['height=28','width=128']) !!}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="tentang">Tentang</a></li>
            <li class=""><a href="#">Kasus</a></li>
            <li class=""><a href="#">Klien</a></li>
            <li class=""><a href="#">Layanan</a></li>
            <li class=""><a href="#">Litigasi</a></li>
            <li class=""><a href="#">Laporan</a></li>
            <li class=""><a href="kamus">Kamus Data</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">User Name</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="row">

        <div class="col-sm-10 main-content">
        	@yield('content')
        </div> <!-- /main-content -->

        <div class="col-sm-2 side-nav">
          @yield('nav')
        </div> <!-- /side-nav -->

      </div><!-- /row -->
    </div><!-- /container -->
  
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>