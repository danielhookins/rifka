<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="bentuk-kekerasan">Bentuk Kekerasan</a>
    </h4>
  </div>
  
  <ul class="list-group">
    @forelse ($kasus->bentuk as $bentuk)
    <li class="list-group-item" style="margin-bottom:-10px;">
	    	<p class="list-group-item-text">
          <strong>Jenis Kekerasan</strong>
            <div style="margin-top:3px;" class="form-group form-inline">
            <div class="checkbox">
              <label>
                {!! Form::checkbox('emosional', 1, $bentuk->emosional, array('disabled')) !!} Emosional
              </label>
            </div>
            <div class="checkbox">
              <label>
                {!! Form::checkbox('fisik', 1, $bentuk->fisik, array('disabled')) !!} Fisik
              </label>
            </div>
            <div class="checkbox">
              <label>
                {!! Form::checkbox('ekonomi', 1, $bentuk->ekonomi, array('disabled')) !!} Ekonomi
              </label>
            </div>
            <div class="checkbox">
              <label>
                {!! Form::checkbox('seksual', 1, $bentuk->seksual, array('disabled')) !!} Seksual
              </label>
            </div>
            <div class="checkbox">
              <label>
                {!! Form::checkbox('sosial', 1, $bentuk->sosial, array('disabled')) !!} Sosial
              </label>
            </div>
        </p>
  	</li>
    
    <li class="list-group-item">
      <p class="list-group-item-text">
        <strong>Keterangan</strong><br />
        {{ $bentuk->keterangan }}
      </p>
    </li>
  	
  	@empty
  	<li class="list-group-item">
	    <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'bentuk-kekerasan'))}}">Tambah Bentuk Kekerasan</a>
  	</li>

  	@endforelse
  </ul>

	<div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-info" href="{{route('kasus.edit', array($kasus->kasus_id, 'bentuk-kekerasan'))}}">Mengedit</a>
      <a class="btn btn-default" href="#">Kembali ke atas</a>
    </div>
  </div>

</div> <!-- / Bentuk Kekerasan Panel -->