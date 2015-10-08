<div class="nav-menu">
	<div class="panel panel-success">

		<div class="panel-heading">
			<h4 class="panel-title">
					<span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
					Laporan
			</h4>
		</div>
		
		<ul class="list-group">
			<li class="list-group-item"><a href="{{ route('laporan.index') }}">Ikhtisar</a></li>
			<li class="list-group-item"><a href="{{ route('laporan.kasusTahun') }}">Kasus Tahun</a></li>
			<li class="list-group-item"><a href="{{ route('laporan.jenis-kasus') }}">Jenis Kasus</a></li>
			<li class="list-group-item"><a href="{{ route('laporan.usia') }}">Usia</a></li>
			<li class="list-group-item"><a href="{{ route('laporan.kabupaten') }}">Kabupaten</a></li>
		</ul>

		<div class="panel-heading">
			<h4 class="panel-title">
					<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
					Daftar
			</h4>
		</div>
		
		<ul class="list-group">
			<li class="list-group-item"><a href="{{ route('laporan.tahun.list') }}">Daftar Tahunan</a></li>
		</ul>

	</div>
</div>