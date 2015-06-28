<div class="panel panel-informasi" style="background:#b6fcb6;"> <!-- Pribadi Panel -->
    <div class="panel-heading"><a class="in-link" name="informasi-pribadi">Informasi Pribadi</a></div>
  <ul class="list-group">
    <li class="list-group-item">
	    	<h4 class="list-group-item-heading">Klien ID</h4>
	    	<p class="list-group-item-text">{{$klien->klien_id}}</p>
  	</li>
  	<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Nama</h4>
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
  	<li class="list-group-item" style="background:#d3eaf1;">[ <a href="#">Mengedit</a> ] [ <a href="#">Kembali ke atas</a> ]</li>
  </ul>
  
</div> <!-- /Pribadi Panel -->