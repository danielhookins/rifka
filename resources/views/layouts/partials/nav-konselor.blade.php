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
            <li><a href="{{ route('kasus.index') }}">Kasus</a></li>
            <li><a href="{{ route('klien.index') }}">Klien</a></li>
          </ul>
        </li>
        <li class=""><a href="{{ route('mensprogram') }}">Men's Program</a></li>
        <li class=""><a href="{{ route('kamus') }}">Kamus</a></li>
      </ul>
			@if (Auth::check())
			<ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></span> User <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">{!! Auth::user()->name !!}</a></li>
            <li><a href="#">Preferences</a></li>
            <li><a href="{{ route('logout') }}">Log Out</a></li>
          </ul>
        </li>
      </ul>
			@endif
      
    </div><!--/.nav-collapse -->
  </div>
</nav>