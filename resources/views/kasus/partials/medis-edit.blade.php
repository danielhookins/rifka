<?php $medisActive = Session::get('medis-active') ?>

<div class="modal fade" id="medis-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($medisActive, array(
        'route' => array('kasus.medis.update', 
          $medisActive->kasus_id, 
          $medisActive->medis_id), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Medis</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('tanggal', 'Tanggal', array('class' => 'strongLabel')) !!}
          {!! Form::date('tanggal', null, array('class' => 'form-control date-picker', 'id' => 'tanggal_medis')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('jenis_medis', 'Jenis Medis', array('class' => 'strongLabel')) !!}
          {!! Form::text('jenis_medis', null, array(
            'class' => 'form-control', 
            'autocomplete' => 'off',
            'placeholder' => 'Jenis Layanan Medis')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('keterangan', 'Keterangan', array('class' => 'strongLabel')) !!}
          <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3">{{$medisActive->keterangan}}</textarea>
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

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->