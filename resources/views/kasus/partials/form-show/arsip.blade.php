<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="arsip">Arsip</a>
    </h4>
  </div>
  
  <ul class="list-group">
    @forelse ($arsip2 as $arsip)
    <li class="list-group-item">
	    	<h4 class="list-group-item-heading">No Reg: {{$arsip->no_reg}}</h4>
	    	<p class="list-group-item-text">Lokasi: {{$arsip->lokasi}}</p>
  	</li>
  	
  	@empty
  	<li class="list-group-item">
	    	<p class="list-group-item-text">Tidak ada Arsip untuk kasus ini.</p>
  	</li>

  	@endforelse
  </ul>

	<div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('kasus.edit', array($kasus->kasus_id, 'arsip'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div> <!-- / Arsip Panel -->