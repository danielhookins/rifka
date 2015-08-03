<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="bentuk-kekerasan">Bentuk Kekerasan</a>
    </h4>
  </div>
  
    @forelse ($kasus->bentuk as $bentuk)
    <ul class="list-group">
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
          </div>
        </p>
    	</li>
      <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Keterangan</strong><br />
          {{ $bentuk->keterangan }}
        </p>
      </li>
  </ul>

  <div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-default" data-toggle="modal" href="#edit-bentuk">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        Edit
      </a>
    </div>
  </div>
  	
	@empty
  <ul class="list-group">
  	<li class="list-group-item">
	    <a class="tambah-link" data-toggle="modal" href="#tambah-bentuk">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Tambah Bentuk Kekerasan
      </a>
  	</li>
  </ul>
	@endforelse

</div> <!-- / Bentuk Kekerasan Panel -->

@include('kasus.partials..bentuk-kekerasan-baru')
@if(!empty($bentukKekerasan))
  @include('kasus.partials..bentuk-kekerasan-edit')
@endif
