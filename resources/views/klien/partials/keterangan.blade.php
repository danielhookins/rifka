<div class="panel panel-default">

<div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="informasi-keterangan">
      Keterangan
    </a>
  </h4>
</div>

<ul class="list-group">
  
  @if($klien->keterangan)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Keterangan</strong>
          {!! nl2br($klien->keterangan) !!}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-keterangan">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Keterangan
        </a>
      </p>
    </li>
  @endif

</ul>

<div class="panel-body">
  <div class="form-inline">
    <a class="btn btn-default" data-toggle="modal" href="#edit-informasi-keterangan">
      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      Edit
    </a>

  </div>
</div>

</div> <!-- Panel Keterangan -->

<div class="modal fade" id="edit-informasi-keterangan">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($klien, array(
        'route' => array(
          'klien.updateSection',
          $klien->klien_id, 
          'keterangan'), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Keterangan</h4>
      </div>
      
      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('keterangan', 'Keterangan', array('class' => 'strongLabel')) !!}
          <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="15" autocomplete="off">{{ $klien->keterangan}}</textarea>
        </div>
      </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          Batal
        </button>
        <button type="submit" class="btn btn-primary" name="submitBtn" value="informasi-keterangan">
          <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
          Simpan
        </button>
      </div>
    
      {!! Form::close() !!}

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->