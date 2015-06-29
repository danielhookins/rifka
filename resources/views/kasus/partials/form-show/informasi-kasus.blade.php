<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="informasi-kasus">Informasi Kasus</a>
    </h4>
  </div>

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
  </ul>

	<div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div> <!-- / Kasus Panel -->