<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="kasus-pentutup">Kasus Pentutup</a>
    </h4>
  </div>
  
	@if (isset($kasus->kasusPentutup))
	<ul class="list-group">
		
		@if($evaluasi_kons = rifka\Konselor::find($kasus->kasusPentutup->evaluasi_kons_id))
			<li class="list-group-item">
	    	<p class="list-group-item-text">
	    		<strong>Evaluasi Konselor</strong>
	    		{{ $evaluasi_kons->nama_konselor }}
	    	</p>
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
	    	<p class="list-group-item-text">
	    		<strong>Evaluasi Akhir</strong>
	    		{{ $evaluasi_akhir->nama_konselor }}
	    	</p>
			</li>
		@else
			<li class="list-group-item">
	    	<p class="list-group-item-text">
	    		<a href="{{route('kasus.edit', array($kasus->kasus_id, 'kasus-pentutup'))}}">Tambah Evaluasi Akhir</a>
	    	</p>
			</li>
		@endif

		<li class="list-group-item">
    	<p class="list-group-item-text">
    		<strong>Tanggal Ditututp<strong>
    		{{ $kasus->kasusPentutup->tanggal or '' }}
    	</p>
		</li>
	</ul>

	<div class="panel-body">
	  <div class="form-inline">
	    <a class="btn btn-default" href="{{route('kasus.edit', array($kasus->kasus_id, 'kasus-pentutup'))}}">
	      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	      Edit
	    </a>
	  </div>
	</div>

	@else
	<ul class="list-group">
		<li class="list-group-item">
			<p class="list-group-item-text">
				<a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'kasus-pentutup'))}}">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					Tambah Kasus Pentutup
				</a>
			</p>
		</li>
	</ul>

	@endif

</div> <!-- / Kasus Pentutup Panel -->