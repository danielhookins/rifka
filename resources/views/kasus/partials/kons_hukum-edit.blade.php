<?php $konsHukumActive = Session::get('kons_hukum-active') ?>

<div class="modal fade" id="kons_hukum-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($konsHukumActive, array(
        'route' => array('kasus.konsHukum.update', 
          $konsHukumActive->kasus_id, 
          $konsHukumActive->kons_hukum_id), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Konseling Hukum</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('tanggal', 'Tanggal', array('class' => 'strongLabel')) !!}
          {!! Form::date('tanggal', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('keterangan', 'Keterangan', array('class' => 'strongLabel')) !!}
          <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3">{{$konsHukumActive->keterangan}}</textarea>
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