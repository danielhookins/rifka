<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="informasi-tambahan">Informasi Tambahan</a>
    </h4>
  </div>
  
  <ul class="list-group">
    
    @if ($klien->jumlah_anak || $klien->jumlah_tanggungan)
    <li class="list-group-item">
    	<h4 class="list-group-item-heading">Keluarga</h4>
    	<p class="list-group-item-text">{!! ($klien->jumlah_anak) ? $klien->jumlah_anak." anak" : null !!}</p>
  	</li>
  	@endif
    
    @if ($klien->pekerjaan || $klien->jabatan || $klien->penghasilan)
    <li class="list-group-item">
    	<h4 class="list-group-item-heading">Pekerjaan</h4>
    	<p class="list-group-item-text">{!! ($klien->pekerjaan) ? $klien->pekerjaan : null !!}</p>
    	<p class="list-group-item-text">{!! ($klien->jabatan) ? "(".$klien->jabatan.")" : null !!}</p>
    	<p class="list-group-item-text">Penghasilan: {{$klien->penghasilan or null}}</p>
  	</li>
  	@endif
  	
    @if ($klien->dirujuk_oleh || $klien->kondisi_klien)
  	<li class="list-group-item">
    	<h4 class="list-group-item-heading">Lain</h4>
    	<p class="list-group-item-text">{!! ($klien->kondisi_klien) ? "Kondisi ".$klien->kondisi_klien : null !!}</p>
    	<p class="list-group-item-text">
    		{!! ($klien->dirujuk_oleh) ? "Dirujuk oleh ".$klien->dirujuk_oleh : null !!}</p>
  	</li>
  	@endif
  	
  </ul>
  
  <div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('klien.edit', array($klien->klien_id, 'tambahan'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div>