<li><a href="{{ route('home') }}">Beranda</a></li>

<li class="dropdown">
  <a href="{{ route('klien.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Klien <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{ route('search.klien') }}">Cari Klien</a></li>
    <li><a href="{{ route('klien.create') }}">Klien Baru</a></li>
  </ul>
</li>

<li class="dropdown">
  <a href="{{ route('kasus.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kasus <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{ route('search.kasus') }}">Cari Kasus</a></li>
    <li><a href="{{ route('kasus.create') }}">Kasus Baru</a></li>
  </ul>
</li>

<li>
  <a href="{{ route('konselor.index') }}">Konselor</a>
</li>

<li class="dropdown">
  <a href="{{ route('laporan.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Laporan <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{ route('laporan.index') }}">Membuat Laporan</a></li>
    <li><a href="{{ route('laporan.bentukkekerasan') }}">Bentuk Kekerasan</a></li>
  </ul>
</li>
