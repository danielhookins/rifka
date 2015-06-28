<div class="panel panel-informasi" style="background:#b6fcb6;"> <!-- Kontak Panel -->
    <div class="panel-heading"><a class="in-link" name="informasi-kontak">Informasi Kontak</a></div>
  <ul class="list-group">
  	@if ($klien->no_telp || (count($alamat2) && $alamat2[0]->alamat) || $klien->email)
	  	@if ($klien->no_telp)
	  	<li class="list-group-item">
	  		<h4 class="list-group-item-heading">Nomor Telepon</h4> 
	  		<p class="list-group-item-text">{{$klien->no_telp}}</p>
	  	</li>
	  	@endif
	  	@if (count($alamat2) && $alamat2[0]->alamat)
	  	<li class="list-group-item">
	  		<h4 class="list-group-item-heading">Alamat</h4> 
	  		<p class="list-group-item-text">
	  			<ul>
	    			<li>
	    				@foreach ($alamat2 as $alamat)
								{{ $alamat->alamat }}
								<br />{{ $alamat->kecamatan }}
								<br />{{ $alamat->kabupaten }}
							@endforeach
						</li>
	    		</ul>
	  		</p>
	  	</li>
	  	@endif
	  	@if($klien->email)
	    <li class="list-group-item">
	  		<h4 class="list-group-item-heading">Email</h4> 
	  		<p class="list-group-item-text"><a href="mailto:{{$klien->email}}">{{$klien->email}}</a></p>
	  	</li>
	  	@endif	
  	@endif
  	<li class="list-group-item" style="background:#d3eaf1;">[ <a href="#">Mengedit</a> ] [ <a href="#">Kembali ke atas</a> ]</li>
  </ul>
</div> <!-- /Kontak Panel -->