<div class="modal fade" id="kons_psikologi-baru">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::open(array('route' => array('kasus.konsPsikologi.store', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Konseling Psikologi</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('tanggal', 'Tanggal', array('class' => 'strongLabel')) !!}
          {!! Form::text('tanggal', null, array('class' => 'form-control date-picker', 'id' => 'tanggal_kons_psikologi', 'autocomplete' => 'off')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('keterangan', 'Keterangan', array('class' => 'strongLabel')) !!}
          <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" autocomplete="off"></textarea>
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