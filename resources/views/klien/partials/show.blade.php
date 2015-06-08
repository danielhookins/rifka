@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Success!</strong> {{ Session::get('success') }}
	</div>
@endif

<h2>Klien Record</h2>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">{{$klien->nama_klien}}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			
			<div class="col-sm-4">
				<div class="well">
					<p style="text-align:center">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
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
						<span class="glyphicon glyphicon-folder-open" aria-hidden="true"> </span>
						<strong>Kasus</strong>
					</p>
					
						<ul>
							@forelse ($kasus2 as $kasus)
								<li><a href="{!! route('kasus.index') !!}/{{ $kasus->kasus_id }}"><strong>Kasus no:</strong> {{ $kasus->kasus_id }}</a>
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
						<strong>Modify</strong>
					</p>
					<ul>
						<li>Edit Klien</li>
						<li style="color:red">Delete Klien</li>
					</ul>
				</div> <!-- /well -->	
			</div>

		</div>
	</div>
</div> <!-- /Panel Primary -->

<div class="panel panel-default"> <!-- Pribadi Panel -->
    <div class="panel-heading"><a class="in-link" name="informasi-pribadi">Informasi Pribadi</a></div>
  <ul class="list-group">
    <li class="list-group-item">
	    	<h4 class="list-group-item-heading">Klien ID</h4>
	    	<p class="list-group-item-text">{{$klien->klien_id}}</p>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Name</h4>
	    	<p class="list-group-item-text">{{$klien->nama_klien}}</p>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Kelamin</h4>
	    	<p class="list-group-item-text">{{$klien->kelamin}}</p>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Tanggal Lahir</h4>
	    	<p class="list-group-item-text">{{$klien->tanggal_lahir}}</p>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Agama</h4>
	    	<p class="list-group-item-text">{{$klien->agama}}</p>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Status Perkawinan</h4>
	    	<p class="list-group-item-text">{{$klien->status_perkawinan}}</p>
  	</li>
  	<li class="list-group-item" style="text-align:right">[ <a href="#">Edit</a> ] [ <a href="#">Kembali ke atas</a> ]</li>
  </ul>
  
</div> <!-- /Pribadi Panel -->

<div class="panel panel-default"> <!-- Kontak Panel -->
    <div class="panel-heading"><a class="in-link" name="informasi-kontak">Informasi Kontak</a></div>
  <ul class="list-group">
  	<li class="list-group-item">
  		<h4 class="list-group-item-heading">Nomor Telepon</h4> 
  		<p class="list-group-item-text">{{$klien->no_telp}}</p>
  	</li>
  	<li class="list-group-item">
  		<h4 class="list-group-item-heading">Alamat</h4> 
  		<p class="list-group-item-text">
  			<ul>
    			<li>
    				@forelse ($alamat2 as $alamat)
							{{ $alamat->alamat }}
							<br />{{ $alamat->kecamatan }}
							<br />{{ $alamat->kabupaten }}
						@empty
							<br /><a href="#">Add Alamat</a>
						@endforelse
					</li>
    		</ul>
  		</p>
  	</li>
    <li class="list-group-item">
  		<h4 class="list-group-item-heading">Email</h4> 
  		<p class="list-group-item-text"><a href="mailto:{{$klien->email}}">{{$klien->email}}</a></p>
  	</li>
  	<li class="list-group-item" style="text-align:right">[ <a href="#">Edit</a> ] [ <a href="#">Kembali ke atas</a> ]</li>
  </ul>
</div> <!-- /Kontak Panel -->

<div class="panel panel-default"> <!-- Tambahan Panel -->
    <div class="panel-heading"><a class="in-link" name="informasi-tambahan">Informasi Tambahan</a></div>
  <ul class="list-group">
    <li class="list-group-item">
	    	<h4 class="list-group-item-heading">Pekerjaan</h4>
	    	<p class="list-group-item-text">{{$klien->pekerjaan}}</p>
	  	</li>
	  	<li class="list-group-item" style="text-align:right">[ <a href="#">Edit</a> ] [ <a href="#">Kembali ke atas</a> ]</li>
  </ul>
</div> <!-- /Tambahan Panel -->