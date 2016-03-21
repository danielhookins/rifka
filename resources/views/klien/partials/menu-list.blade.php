<div class="nav-menu">
	<div class="panel panel-success">


		<div class="panel-heading">
			<h4 class="panel-title">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Klien
			</h4>
		</div>
		
		<ul class="list-group">
			<li class="list-group-item"><a href="#informasi-pribadi">Informasi Pribadi</a></li>
			<li class="list-group-item"><a href="#informasi-kontak">Informasi Kontak</a></li>
			<li class="list-group-item"><a href="#informasi-tambahan">Informasi Tambahan</a></li>
			<li class="list-group-item"><a href="#informasi-keterangan">Keterangan</a></li>
		</ul>


		@if(isset($user) && $user->jenis != "Front Office")
		<div class="panel-heading">
			<h4 class="panel-title">
					<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Kasus
			</h4>
		</div>
		<ul class="list-group">
			@forelse ($kasus2 as $kasus)
				<li class="list-group-item"><a href="{!! route('kasus.index') !!}/{{ $kasus->kasus_id }}"><strong> Kasus #{{ $kasus->kasus_id }}</strong></a>
				<br /><strong>Jenis klien:</strong> {{$kasus->pivot->jenis_klien}}
				<br /><strong>Jenis kasus:</strong> {{$kasus->jenis_kasus}}</li>
			@empty
				<li class="list-group-item">Belum ada kasus</li>
			@endforelse
		</ul>
		@endif


	</div>
</div>