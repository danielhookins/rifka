<div class="modal fade" id="pemicu-baru">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::open(array('route' => array('kasus.faktorPemicu.store', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Faktor Pemicu</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <strong>Jenis Pemicu:</strong><br />
          {!! Form::select('jenis_pemicu', array(
            'Jenis'               =>  'Jenis',
            'Masalah ekonomi'     =>  'Masalah ekonomi',
            'Masalah agama'       =>  'Masalah agama',
            'Masalah pendidikan'  =>  'Masalah pendidikan',
            'Masalah lain'        =>  'Masalah lain'
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('keterangan', 'Keterangan', array('class' => 'strongLabel')) !!}
          {!! Form::text('keterangan', null, array('class' => 'form-control', 'autocomplete' => 'off')) !!}
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