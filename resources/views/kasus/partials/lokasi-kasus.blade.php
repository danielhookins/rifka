<div class="panel panel-default">

<div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="lokasi-kasus">
      Lokasi Kasus
    </a>
  </h4>
</div>

<ul class="list-group">
  
  @if($kasus->kabupaten)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Kabupaten</strong>
          {{$kasus->kabupaten}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-lokasi-kasus">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Kabupaten
        </a>
      </p>
    </li>
  @endif

	@if($kasus->jenis_lokasi)
    <li class="list-group-item">
      	<p class="list-group-item-text">
          <strong>Jenis Lokasi</strong>
          {{$kasus->jenis_lokasi}}
        </p>
  	</li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-lokasi-kasus">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Jenis Lokasi
        </a>
      </p>
    </li>
  @endif

  @if($kasus->deskripsi_lokasi)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Deskripsi</strong> (tentang lokasi)
          {{$kasus->deskripsi_lokasi}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-lokasi-kasus">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Deskripsi
        </a>
      </p>
    </li>
  @endif
</ul>

<div class="panel-body">
  <div class="form-inline">
    <a class="btn btn-default" data-toggle="modal" href="#edit-lokasi-kasus">
      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      Edit
    </a>

  </div>
</div>

</div> <!-- Panel Lokasi Kasus -->

<div class="modal fade" id="edit-lokasi-kasus">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($kasus, array('route' => array('kasus.update', $kasus->kasus_id), 'class'=>'form', 'method' => 'PUT')) !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Lokasi Kasus</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('kabupaten', 'Kabupaten', array('class' => 'strongLabel')) !!}
          {!! Form::select('kabupaten', array(
            'Kabupaten'   =>  'Kabupaten',
            'Bantul'      =>  'Bantul',
            'Gunungkidul' =>  'Gunungkidul',
            'Kulon Progo' =>  'Kulon Progo',
            'Sleman'      =>  'Sleman',
            'Yogyakarta'  =>  'Yogyakarta',
            'Lain'        =>  'Lain'
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          <strong>Jenis Lokasi:</strong><br />
          {!! Form::select('jenis_lokasi', array(
            'Jenis'         =>  'Jenis',
            'Tempat Umum'   =>  'Tempat Umum',
            'Tempat Privat' =>  'Tempat Privat',
            'Lain'          =>  'Lain'
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('deskripsi_lokasi', 'Deskripsi', array('class' => 'strongLabel')) !!} (tentang lokasi)
          {!! Form::text('deskripsi_lokasi', null, array('class' => 'form-control', 'autocomplete' => 'off')) !!}
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