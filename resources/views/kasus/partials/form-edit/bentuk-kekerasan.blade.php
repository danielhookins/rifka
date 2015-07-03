<div class="panel panel-warning">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="bentuk-kekerasan">Bentuk Kekerasan</a>
    </h4>
  </div>

  <ul class="list-group">
    
    @forelse ($kasus->bentuk as $bentuk)
    <input type="hidden" name="bentuk_id" value="{{$bentuk->bentuk_id}}">
    <input type="hidden" name="kasus_id" value="{{$bentuk->kasus_id}}">

    <li class="list-group-item">
      <h4 class="list-group-item-heading">Jenis Kekerasan</h4>
      <p class="list-group-item-text">
          <div class="form-inline">
          <div class="checkbox">
            <label>
              {!! Form::checkbox('emosional', 1, $bentuk->emosional) !!} Emosional
            </label>
          </div>
          <div class="checkbox">
            <label>
              {!! Form::checkbox('fisik', 1, $bentuk->fisik) !!} Fisik
            </label>
          </div>
          <div class="checkbox">
            <label>
              {!! Form::checkbox('ekonomi', 1, $bentuk->ekonomi) !!} Ekonomi
            </label>
          </div>
          <div class="checkbox">
            <label>
              {!! Form::checkbox('seksual', 1, $bentuk->seksual) !!} Seksual
            </label>
          </div>
          <div class="checkbox">
            <label>
              {!! Form::checkbox('sosial', 1, $bentuk->sosial) !!} Sosial
            </label>
          </div>
      </p>
    </li>
    
    <li class="list-group-item">
    	<h4 class="list-group-item-heading">Keterangan</h4>
      <p class="list-group-item-text">
    		<div class="form-group">
					<textarea name="keterangan" class="form-control" placeholder="keterangan" rows="3">{{ $bentuk->keterangan}}</textarea>
				</div>
    	</p>
  	</li>
    @empty
      belum ada

    @endforelse
  </ul>


</div>