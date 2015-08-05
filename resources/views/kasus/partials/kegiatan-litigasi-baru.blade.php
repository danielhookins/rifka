<div class="modal fade" id="kegiatan-litigasi-baru">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::open(array('route' => array('kasus.litigasi.kegiatan.store', $kasus->kasus_id, $litigasi->litigasi_id), 'class'=>'form', 'method' => 'POST')) !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Kegiatan Litigasi</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('tanggal', 'Tanggal', array('class' => 'strongLabel')) !!}
          {!! Form::date('tanggal', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('kegiatan', 'Kegiatan', array('class' => 'strongLabel')) !!}
          <textarea name="kegiatan" class="form-control" placeholder="Kegiatan" rows="3"></textarea>
        </div>
        <div class="form-group">
          {!! Form::label('informasi', 'Informasi', array(
            'class' => 'strongLabel')) 
          !!}
          <textarea name="informasi" class="form-control" placeholder="Informasi" rows="3"></textarea>
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