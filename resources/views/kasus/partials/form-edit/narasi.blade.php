<div class="panel panel-warning">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="narasi">Narasi</a>
    </h4>
  </div>

  <ul class="list-group">
    
    <li class="list-group-item">
    	<p class="list-group-item-text">
    		<div class="form-group">
					<textarea name="narasi" class="form-control" placeholder="Narasi Kasus" rows="{!! ((strlen($kasus->narasi) / 72) < 5 ) ? '10' : '20'; !!}">{{ $kasus->narasi}}</textarea>
				</div>
    	</p>
  	</li>

  </ul>

</div>