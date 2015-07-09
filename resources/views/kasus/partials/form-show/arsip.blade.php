<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="arsip">Arsip</a>
    </h4>
  </div>
  
  <ul class="list-group">
    @if($kasus->arsip)
      
      @foreach($kasus->arsip as $arsip)
      
        @if($arsip->no_reg)
        <li class="list-group-item">
          <p class="list-group-item-text">
  	    	  <strong>No Reg</strong> {{$arsip->no_reg}}
          </p>
      	</li>
        @endif

        @if($arsip->lokasi)
        <li class="list-group-item">
          <p class="list-group-item-text">
            <strong>Lokasi</strong> {{$arsip->lokasi}}
          </p>
        </li>
        @endif
      
      @endforeach
  	
  	@else
  	<li class="list-group-item">
	    <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'arsip'))}}">
        Tambah Arsip
      </a>
  	</li>

  	@endif
  </ul>

	<div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('kasus.edit', array($kasus->kasus_id, 'arsip'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div> <!-- / Arsip Panel -->