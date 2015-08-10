<?php $shelterActive = Session::get('shelter-active') ?>

<div class="modal fade" id="shelter-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($shelterActive, array(
        'route' => array('kasus.shelter.update', 
          $shelterActive->kasus_id, 
          $shelterActive->shelter_id), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Shelter</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('mulai_tanggal', 'Mulai Tanggal', array('class' => 'strongLabel')) !!}
          {!! Form::date('mulai_tanggal', null, array('class' => 'form-control date-picker')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('sampai_tanggal', 'Sampai Tanggal', array('class' => 'strongLabel')) !!}
          {!! Form::date('sampai_tanggal', null, array(
            'class' => 'form-control date-picker', 
            'autocomplete' => 'off' )) !!}
        </div>
        <div class="form-group">
          {!! Form::label('keterangan', 'Keterangan', array('class' => 'strongLabel')) !!}
          <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3">{{$shelterActive->keterangan}}</textarea>
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