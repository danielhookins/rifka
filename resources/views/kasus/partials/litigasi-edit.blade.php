<?php $litigasiActive = Session::get('litigasi-active') ?>

<div class="modal fade" id="litigasi-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($litigasiActive, array(
        'route' => array('kasus.litigasi.update', 
          $litigasiActive->kasus_id, 
          $litigasiActive->litigasi_id), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Litigasi</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('jenis_litigasi', 'Jenis Litigasi', array('class' => 'strongLabel')) !!}
          {!! Form::select('jenis_litigasi', array(
            'Jenis Litigasi'
              =>  'Jenis Litigasi',
            'Pidana langsung' => 'Pidana langsung',
            'Pidana tidak langsung' => 'Pidana tidak langsung',
            'Perdata' => 'Perdata'
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('undang_digunakan', 'Undang Digunakan', array('class' => 'strongLabel')) !!}
          {!! Form::text('undang_digunakan', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('kepolisian_wilayah', 'Kepolisian Wilayah', array('class' => 'strongLabel')) !!}
          {!! Form::text('kepolisian_wilayah', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('nama_penyidik', 'Nama Penyidik', array('class' => 'strongLabel')) !!}
          {!! Form::text('nama_penyidik', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('pengadilan_wilayah', 'Pengadilan Wilayah', array('class' => 'strongLabel')) !!}
          {!! Form::text('pengadilan_wilayah', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('nama_hakim', 'Nama Hakim', array('class' => 'strongLabel')) !!}
          {!! Form::text('nama_hakim', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('nama_jaksa', 'Nama Jaksa', array('class' => 'strongLabel')) !!}
          {!! Form::text('nama_jaksa', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('tuntutan', 'Tuntutan', array('class' => 'strongLabel')) !!}
          {!! Form::text('tuntutan', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('putusan', 'Putusan', array('class' => 'strongLabel')) !!}
          {!! Form::text('putusan', null, array('class' => 'form-control')) !!}
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