@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Success!</strong> {{ Session::get('success') }}
	</div>
@endif

<h2>Catatan Kasus</h2>

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
								<br />({{$klien->pivot->jenis_klien}})
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
						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Modify</strong>
					</p>
					<ul>
						<li>Mengedit Kasus</li>
						<li style="color:red">Menghapus Kasus</li>
					</ul>
				</div> <!-- /well -->	
			</div>

		</div>
	</div>
</div> <!-- /Panel Primary -->

<div class="panel panel-informasi" style="background:#b6fcb6;"> <!-- Kasus Panel -->
    <div class="panel-heading"><a class="in-link" name="informasi-kasus">Informasi Kasus</a></div>
  <ul class="list-group">
    <li class="list-group-item">
	    	<h4 class="list-group-item-heading">Kasus ID</h4>
	    	<p class="list-group-item-text">{{$kasus->kasus_id}}</p>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Jenis Kasus</h4>
	    	<p class="list-group-item-text">{{$kasus->jenis_kasus}}</p>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Hubungan</h4>
	    	<p class="list-group-item-text">Hubungan: {{$kasus->hubungan}}</p>
	    	<p class="list-group-item-text">Lama hubungan: {{$kasus->lama_hubungan}}</p>
  	</li>
  	<li class="list-group-item" style="background:#d3eaf1;">[ <a href="#">Mengedit</a> ] [ <a href="#">Kembali ke atas</a> ]</li>
  </ul>
</div> <!-- / Kasus Panel -->

<div class="panel panel-informasi" style="background:#b6fcb6;"> <!-- Narasi Panel -->
    <div class="panel-heading"><a class="in-link" name="narasi">Narasi</a></div>
  <ul class="list-group">
    <li class="list-group-item">
	    	<h4 class="list-group-item-heading">Narasi Kasus</h4>
	    	<p class="list-group-item-text">{{$kasus->narasi}}</p>
  	</li>
  	<li class="list-group-item" style="background:#d3eaf1;">[ <a href="#">Mengedit</a> ] [ <a href="#">Kembali ke atas</a> ]</li>
  </ul>
</div> <!-- / Narasi Panel -->

<div class="panel panel-informasi" style="background:#b6fcb6;"> <!-- Narasi Panel -->
    <div class="panel-heading"><a class="in-link" name="arsip">Arsip</a></div>
  <ul class="list-group">
    @foreach ($arsip2 as $arsip)
    <li class="list-group-item">
	    	<h4 class="list-group-item-heading">No Reg: {{$arsip->no_reg}}</h4>
	    	<p class="list-group-item-text">Lokasi: {{$arsip->lokasi}}</p>
  	</li>
  	@endforeach
  	<li class="list-group-item" style="background:#d3eaf1;">[ <a href="#">Mengedit</a> ] [ <a href="#">Kembali ke atas</a> ]</li>
  </ul>
</div> <!-- / Narasi Panel -->