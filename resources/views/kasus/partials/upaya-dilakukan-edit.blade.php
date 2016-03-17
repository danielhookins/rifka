<?php $upayaActive = Session::get('upayaDilakukan-active') ?>

<div class="modal fade" id="upaya-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($upayaActive, array(
        'route' => array('kasus.upayaDilakukan.update', 
          $upayaActive->kasus_id, 
          $upayaActive->upaya_id), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Upaya Dilakukan</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('jenis_upaya', 'Jenis Upaya', array('class' => 'strongLabel')) !!}
          {!! Form::select('jenis_upaya', array(
            'Upaya Dilakukan'
              =>  'Upaya Dilakukan',
            'Mendiskusikan dengan pasangan/pelaku'
              => 'Mendiskusikan dengan pasangan/pelaku',
            'Musyawarah yang melibatkan keluarga besar' 
              => 'Musyawarah yang melibatkan keluarga besar',
            'Melaporkan pada pihak kepolisian' 
              =>  'Melaporkan pada pihak kepolisian',
            'Melibatkan pemuka agama'  
              =>  'Melibatkan pemuka agama',
            'Lain-lain' 
              =>  'Lain-lain'
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('hasil', 'Hasil', array('class' => 'strongLabel')) !!}
          <textarea name="hasil" class="form-control" placeholder="Hasil" rows="3" autocomplete="off">{{ $upayaActive->hasil }}</textarea>
        </div>
        <div class="form-group">
          {!! Form::label('diupdate', 'Diupdate', array('class' => 'strongLabel')) !!}
          {{ $upayaActive->updated_at }}
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