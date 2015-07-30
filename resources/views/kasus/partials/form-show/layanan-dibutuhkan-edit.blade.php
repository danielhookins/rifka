<?php $layananActive = Session::get('layanan-dbth-active') ?>

<div class="modal fade" id="layanan-dbth-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($layananActive, array(
        'route' => array('kasus.layananDibutuhkan.update', 
          $layananActive->kasus_id, 
          $layananActive->layanan_dbth_id), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Layanan Dibutuhkan</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('jenis_layanan', 'Jenis Layanan', array('class' => 'strongLabel')) !!}
          {!! Form::select('jenis_layanan', array(
            'Layanan Dibutuhkan'
              =>  'Layanan Dibutuhkan',
            'Konseling Psikologis'
              => 'Konseling Psikologis',
            'Konseling Hukum' 
              => 'Konseling Hukum',
            'Litigasi' 
              =>  'Litigasi',
            'Home visit'  
              =>  'Home visit',
            'Mens program'  
              =>  'Mens program',
            'Medis'  
              =>  'Medis',
            'Support group'  
              =>  'Support group',
            'Shelter'  
              =>  'Shelter',
            'Mediasi'  
              =>  'Mediasi',
            'Lain-lain' 
              =>  'Lain-lain'
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('status', 'Status', array('class' => 'strongLabel')) !!}
          {!! Form::select('status', array(
            ''
              =>  '',
            'Belum Diberikan' 
              => 'Belum Diberikan',
              'Sudah Diberikan'
              => 'Sudah Diberikan',
            'Dibatalkan' 
              =>  'Dibatalkan'
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('diupdate', 'Diupdate', array('class' => 'strongLabel')) !!}
          {{ $layananActive->updated_at }}
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