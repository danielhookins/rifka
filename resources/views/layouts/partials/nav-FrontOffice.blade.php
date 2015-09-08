<li><a href="{{ route('home') }}">Home</a></li>

<li class="dropdown">
  <a href="{{ route('klien.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Klien <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{ route('klien.index') }}">Cari Klien</a></li>
    <li><a href="{{ route('klien.create') }}">Klien Baru</a></li>
  </ul>
</li>