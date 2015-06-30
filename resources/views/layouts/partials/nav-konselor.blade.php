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
        
        <li><a href="{{ route('home') }}">Home</a></li>
        
        <li class="dropdown">
          <a href="{{ route('klien.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Klien <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('klien.index') }}">Cari Klien</a></li>
            <li><a href="{{ route('klien.create') }}">Klien Baru</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="{{ route('kasus.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kasus <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('kasus.index') }}">Cari Kasus</a></li>
            <li><a href="{{ route('kasus.create') }}">Kasus Baru</a></li>
          </ul>
        </li> 
      
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {!! Auth::user()->name !!} <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Preferences</a></li>
            <li><a href="{{ route('logout') }}">Log Out</a></li>
          </ul>
        </li>
      </ul>
           
    </div><!--/.nav-collapse -->
  </div>
</nav>