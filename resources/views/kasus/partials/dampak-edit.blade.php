<?php $dampakActive = Session::get('dampak-active') ?>

<div class="modal fade" id="dampak-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($dampakActive, array(
        'route' => array('kasus.dampak.update', 
          $dampakActive->kasus_id, 
          $dampakActive->dampak_id), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Dampak</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('jenis_dampak', 'Jenis Dampak', array('class' => 'strongLabel')) !!}
          {!! Form::select('jenis_dampak', array(
            'Dampak' =>  'Dampak',
            'Kekerasan Fisik' => 'Kekerasan Fisik',
            'Kesehatan Jiwa' => 'Kesehatan Jiwa',
            'Perilaku tidak sehat' => 'Perilaku tidak sehat',
            'Kesehatan reproduksi' => 'Kesehatan reproduksi',
            'Kondisi klinis' => 'Kondisi klinis',
            'Ekonomi' => 'Ekonomi',
            'Anak/Keluarga' => 'Anak/Keluarga',
            'Lain-lain' =>  'Lain-lain'
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('keterangan', 'Keterangan', array('class' => 'strongLabel')) !!}
          <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" autocomplete="off">{{ $dampakActive->keterangan }}</textarea>
        </div>
        <div class="form-group">
          {!! Form::label('diupdate', 'Diupdate', array('class' => 'strongLabel')) !!}
          {{ $dampakActive->updated_at }}
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