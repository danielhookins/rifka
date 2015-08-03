<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="arsip">Arsip</a>
    </h4>
  </div>
  
  
  @if(!empty($kasus->arsip->toArray()))
    <ul class="list-group">
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
    </ul>

    <div class="panel-body">
      <div class="form-inline">
        <a class="btn btn-default" href="{{route('kasus.edit', array($kasus->kasus_id, 'arsip'))}}">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          Edit
        </a>
      </div>
    </div>

	@else
  	<ul class="list-group">
      <li class="list-group-item">
  	    <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'arsip'))}}">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Arsip
        </a>
    	</li>
    </ul>
  	@endif

</div> <!-- / Arsip Panel -->