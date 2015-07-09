<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="kasus-pentutup">Kasus Pentutup</a>
    </h4>
  </div>
  
  <ul class="list-group">
	@if ($kasus->kasusPentutup)

		@if($evaluasi_kons = rifka\Konselor::find($kasus->kasusPentutup->evaluasi_kons_id))
			<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Evaluasi Konselor</h4>
	    	<p class="list-group-item-text">{{ $evaluasi_kons->nama_konselor }}</p>
			</li>
		@else
			<li class="list-group-item">
	    	<p class="list-group-item-text">
	    		<a href="{{route('kasus.edit', array($kasus->kasus_id, 'kasus-pentutup'))}}">Tambah Evaluasi Konselor</a>
	    	</p>
			</li>
		@endif

		@if($evaluasi_akhir = rifka\Konselor::find($kasus->kasusPentutup->evaluasi_akhir_id))
			<li class="list-group-item">
	    	<h4 class="list-group-item-heading">Evaluasi Akhir</h4>
	    	<p class="list-group-item-text">{{ $evaluasi_akhir->nama_konselor }}</p>
			</li>
		@else
			<li class="list-group-item">
	    	<p class="list-group-item-text">
	    		<a href="{{route('kasus.edit', array($kasus->kasus_id, 'kasus-pentutup'))}}">Tambah Evaluasi Akhir</a>
	    	</p>
			</li>
		@endif

		<li class="list-group-item">
    	<h4 class="list-group-item-heading">Tanggal Ditututp</h4>
    	<p class="list-group-item-text">{{ $kasus->kasusPentutup->tanggal or '' }}</p>
		</li>


	@else
	<li class="list-group-item">
		<p class="list-group-item-text">
			<a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'kasus-pentutup'))}}">Tambah Kasus Pentutup</a>
		</p>
	</li>

	@endif
	</ul>

	<div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('kasus.edit', array($kasus->kasus_id, 'kasus-pentutup'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div> <!-- / Kasus Pentutup Panel -->