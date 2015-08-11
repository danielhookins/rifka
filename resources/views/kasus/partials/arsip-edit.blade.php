<?php $arsipActive = Session::get('arsip-active') ?>

<div class="modal fade" id="arsip-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($arsipActive, array(
        'route' => array('kasus.arsip.update', 
          $arsipActive->kasus_id, 
          $arsipActive->arsip_id), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Arsip</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('no_reg', 'No Reg', array('class' => 'strongLabel')) !!}
          {!! Form::Number('no_reg', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('media', 'Media', array('class' => 'strongLabel')) !!}
          {!! Form::select('media', array(
            'Media'       =>  'Media',
            'Tatap Muka'  =>  'Tatap Muka',
            'Telepon'     =>  'Telepon',
            'Outreach'    =>  'Outreach',
            'Email'       =>  'Email',
            'Internet'    =>  'Internet',
            'Surat'       =>  'Surat',
            'Lain'        =>  'Lain'
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('lokasi', 'Lokasi', array('class' => 'strongLabel')) !!}
          {!! Form::Text('lokasi', null, array('class' => 'form-control')) !!}
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