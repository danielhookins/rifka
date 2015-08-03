<div class="panel panel-default">
  
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="in-link" name="narasi">Narasi</a>
    </h4>
  </div>

  @if($kasus->narasi)
  <ul class="list-group">
    <li class="list-group-item">
      <p class="list-group-item-text">
        <strong>Narasi Kasus</strong><br />
        {{$kasus->narasi}}
      </p>
    </li>
  </ul>

  <div class="panel-body">
    <div class="form-inline">
      <a class="btn btn-default" data-toggle="modal" href="#edit-narasi">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        Edit
      </a>
    </div>
  </div>

  @else
  <ul class="list-group">
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-narasi">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Narasi
        </a>
      </p>
    </li>
  </ul>
  @endif

</div> <!-- / Narasi Panel -->


<div class="modal fade" id="edit-narasi">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($kasus, array('route' => array('kasus.update', $kasus->kasus_id), 'class'=>'form', 'method' => 'PUT')) !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Narasi Kasus</h4>
      </div>

      <div class="modal-body">

        <div class="form-group">
          {!! Form::label('narasi', 'Narasi Kasus', array('class' => 'strongLabel')) !!}

          <textarea name="narasi" class="form-control" placeholder="Menulis narasi kasus disini." rows="{!! ((strlen($kasus->narasi) / 72) < 5 ) ? '10' : '20'; !!}">{{ $kasus->narasi}}</textarea>
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

