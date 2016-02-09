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

<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pengelolaan <?php 
    // TODO: Move functionality to library
    $inactive = count(rifka\User::where('active','0')->get()->toArray());
    echo ($inactive > 0) ? '<span class="badge">'.$inactive.'</span>' : '';?>
  <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{ route('user.management') }}">Manajemen User <?php echo ($inactive > 0) ? '<span class="label label-warning">Baru</span>' : '' ; ?></a></li>
    <li><a href="{{ route('konselor.index') }}">Manajemen Konselor</a></li>
  </ul>
</li>

<li><a href="{{ route('laporan.index') }}">Laporan</a></li>