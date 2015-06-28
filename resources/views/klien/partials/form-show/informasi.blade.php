<div class="panel panel-informasi" style="background:#b6fcb6;"> <!-- Tambahan Panel -->
    <div class="panel-heading"><a class="in-link" name="informasi-tambahan">Informasi Tambahan</a></div>
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
  	<li class="list-group-item" style="background:#d3eaf1;">[ <a href="#">Mengedit</a> ] [ <a href="#">Kembali ke atas</a> ]</li>
  </ul>
</div> <!-- /Tambahan Panel -->