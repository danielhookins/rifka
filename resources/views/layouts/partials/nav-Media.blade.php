<li><a href="{{ route('home') }}">Beranda</a></li>
<li class="dropdown">
  <a href="{{ route('laporan.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Laporan <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{ route('laporan.index') }}">Membuat Laporan</a></li>
    <li><a href="{{ route('laporan.bentukkekerasan') }}">Bentuk Kekerasan</a></li>
  </ul>
</li>