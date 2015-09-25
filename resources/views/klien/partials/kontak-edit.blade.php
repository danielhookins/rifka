<div class="modal fade" id="kontak-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($klien, array(
        'route' => array(
          'klien.updateSection',
          $klien->klien_id, 
          'kontak'), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Kontak</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('no_telp', 'Nomor Telepon', array('class' => 'strongLabel')) !!}
          {!! Form::text('no_telp', null, array(
            'class' => 'form-control',
            'placeholder' => 'Nomor Telepon',
            'autocomplete' => 'off')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('email', 'Email', array('class' => 'strongLabel')) !!}
          {!! Form::text('email', null, array(
            'class' => 'form-control',
            'placeholder' => 'Email',
            'autocomplete' => 'off')) !!}
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          Batal
        </button>
        <button type="submit" class="btn btn-primary" name="submitBtn" value="informasi-kontak">
          <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
          Simpan
        </button>
      </div>
    
      {!! Form::close() !!}

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->