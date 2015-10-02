<div class="row">
<div class="col-sm-12">
	
	<h3>Ikhtisar</h3>
	
	<p>Database isi <strong>{{ $overview["cases"] }} Kasus</strong>
		<ul>
			<li>Untuk tahun {{ $overview["thisYear"]}} ada <strong>{{ $overview["casesThisYear"] }} Kasus Baru</strong></li>
			<li>Laporan tentang <a href="{{ route('laporan.jenis-kasus') }}">Jenis Kasus</a></li>
		</ul>
	</p>

	<p>Ada <strong>{{ $overview["clients"] }} Klien</strong>
		<ul>
			<li>{{ $overview["perempuan"] }} perempuan</li>
			<li>{{ $overview["laki2"] }} laki-laki</li>
		</ul>
	</p>

</div> <!-- /col -->
</div> <!-- /row -->