<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Kasus #{{$kasus->kasus_id}}</h3>
	</div>
	<div class="panel-body">
		<div class="row">

			<div class="col-sm-4">
				<div class="well">
					<p style="text-align:center">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <strong>Klien</strong>
					</p>
					
						<ul>
							@forelse ($klien2 as $klien)
								<li><a href="{!! route('klien.index') !!}/{{ $klien->klien_id }}">{{ $klien->nama_klien }}</a>
								({{$klien->pivot->jenis_klien}})
							@empty
								<li>Belum ada klien</li>
							@endforelse
						</ul>
						<a href="#">Tambah Klien</a>

				</div> <!-- /well -->	
			</div>
			
			<div class="col-sm-4">
				<div class="well">
					<p style="text-align:center">
						<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> <strong>Kasus</strong>
					</p>
					<ul>
						<li><a href="#informasi-kasus">Informasi Kasus</a></li>
						<li><a href="#narasi">Narasi</a></li>
						<li><a href="#arsip">Arsip</a></li>
					</ul>
				</div> <!-- /well -->	
			</div>
			
			<div class="col-sm-4">
				<div class="well">
					<p style="text-align:center">
						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Options</strong>
					</p>
					<ul>
						<li><a href="{{route('kasus.edit', $kasus->kasus_id)}}">Mengedit Kasus</a></li>
						<li><a href="{{route('kasus.changes', $kasus->kasus_id)}}">Melihat Perubuhan</a></li>
						<li style="color:red">Menghapus Kasus</li>
					</ul>
				</div> <!-- /well -->	
			</div>

		</div>
	</div>
</div> <!-- /Panel Primary -->