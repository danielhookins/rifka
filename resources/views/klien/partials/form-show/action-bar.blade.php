<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">{{$klien->nama_klien}}</h3>
	</div>

	<div class="panel-body">
		<div class="row">
			
			<div class="col-sm-4">
				<div class="well">
					<p style="text-align:center">
						<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
						<strong>Klien</strong>
					</p>
					<ul>
						<li><a href="#informasi-pribadi">Informasi Pribadi</a></li>
						<li><a href="#informasi-kontak">Informasi Kontak</a></li>
						<li><a href="#informasi-tambahan">Informasi Tambahan</a></li>
					</ul>
				</div> <!-- /well -->	
			</div>

			<div class="col-sm-4">
				<div class="well">
					<p style="text-align:center">
						<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
						<strong>Kasus</strong>
					</p>
					
						<ul>
							@forelse ($kasus2 as $kasus)
								<li><a href="{!! route('kasus.index') !!}/{{ $kasus->kasus_id }}"><strong> Kasus no {{ $kasus->kasus_id }}</strong></a>
								<br /><strong>Jenis klien:</strong> {{$kasus->pivot->jenis_klien}}
								<br /><strong>Jenis kasus:</strong> {{$kasus->jenis_kasus}}</li>
							@empty
								<li>Belum ada kasus</li>
							@endforelse
						</ul>
						<a href="#">Kasus Baru</a>

				</div> <!-- /well -->	
			</div>
			
			<div class="col-sm-4">
				<div class="well">
					<p style="text-align:center">
						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						<strong>Options</strong>
					</p>
					<ul>
						<li><a href="{{route('klien.edit', $klien->klien_id)}}">Mengedit Klien</a></li>
						<li><a href="{{route('klien.changes', $klien->klien_id)}}">Melihat Perubuhan</a></li>
						<li style="color:red">Menghapus Klien</li>
					</ul>
				</div> <!-- /well -->	
			</div>

		</div>
	</div>
</div> <!-- /Panel Primary -->