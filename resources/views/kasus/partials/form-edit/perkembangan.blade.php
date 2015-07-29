{!! Form::model($kasus, array('route' => array('kasus.perkembangan.update', $perkembangan->kasus_id, $perkembangan->perkembangan_id), 'class'=>'form', 'method' => 'PUT')) !!}

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Edit Perkembangan</h4>
  </div>

  <div class="modal-body">
    <div class="form-group">
      {!! Form::label('tanggal', 'Tanggal', array('class' => 'strongLabel')) !!}
      {!! Form::date('tanggal', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
      {!! Form::label('intervensi', 'Intervensi', array('class' => 'strongLabel')) !!}
      {!! Form::text('intervensi', null, array(
        'class' => 'form-control',
        'placeholder' => 'Intervensi')) 
      !!}
    </div>
    <div class="form-group">
      {!! Form::label('kesimpulan', 'Kesimpulan', array(
        'class' => 'strongLabel')) 
      !!}
      {!! Form::text('kesimpulan', null, array(
        'class' => 'form-control',
        'placeholder' => 'Kesimpulan')) 
      !!}
    </div>
    <div class="form-group">
      {!! Form::label('kesepakatan', 'Kesepakatan', array(
        'class' => 'strongLabel')) 
      !!}
      {!! Form::text('kesepakatan', null, array(
        'class' => 'form-control',
        'placeholder' => 'Kesepakatan')) 
      !!}
    </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">
      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
      Batal
    </button>
    <button type="submit" class="btn btn-primary">
      <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
      Simpan
    </button>
  </div>

  {!! Form::close() !!}