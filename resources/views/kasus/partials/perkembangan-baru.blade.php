<div class="modal fade" id="perkembangan-baru">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($kasus, array('route' => array('kasus.perkembangan.store', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Perkembangan</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('tanggal', 'Tanggal', array('class' => 'strongLabel')) !!}
          {!! Form::date('tanggal', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('intervensi', 'Intervensi', array('class' => 'strongLabel')) !!}
          <textarea name="intervensi" class="form-control" placeholder="Intervensi" rows="3"></textarea>
        </div>
        <div class="form-group">
          {!! Form::label('kesimpulan', 'Kesimpulan', array(
            'class' => 'strongLabel')) 
          !!}
          <textarea name="kesimpulan" class="form-control" placeholder="Kesimpulan" rows="3"></textarea>
        </div>
        <div class="form-group">
          {!! Form::label('kesepakatan', 'Kesepakatan', array(
            'class' => 'strongLabel')) 
          !!}
          <textarea name="kesepakatan" class="form-control" placeholder="Kesepakatan" rows="3"></textarea>
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