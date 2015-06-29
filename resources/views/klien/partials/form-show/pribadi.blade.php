<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="informasi-pribadi">Informasi Pribadi</a>
    </h4>
  </div>
  
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
  </ul>
  
  <div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('klien.edit', array($klien->klien_id, 'pribadi'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div>