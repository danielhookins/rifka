<div class="panel panel-default">

<div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="informasi-pribadi">
      <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
      Informasi Pribadi
    </a>
  </h4>
</div>

<ul class="list-group">
  
  @if($klien->nama_klien)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Nama Klien</strong>
          {{$klien->nama_klien}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-pribadi">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Nama Klien
        </a>
      </p>
    </li>
  @endif

  @if($klien->kelamin)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Kelamin</strong>
          {{$klien->kelamin}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-pribadi">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Kelamin
        </a>
      </p>
    </li>
  @endif

  @if($klien->tanggal_lahir)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Tanggal Lahir</strong>
          {{$klien->tanggal_lahir}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-pribadi">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Tanggal Lahir
        </a>
      </p>
    </li>
  @endif

  @if($klien->nama_orangtua)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Nama Orangtua</strong>
          {{$klien->nama_orangtua}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-pribadi">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Nama Orangtua
        </a>
      </p>
    </li>
  @endif

  @if($klien->agama)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Agama</strong>
          {{$klien->agama}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-pribadi">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Agama
        </a>
      </p>
    </li>
  @endif

  @if($klien->status_perkawinan)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Status Perkawinan</strong>
          {{$klien->status_perkawinan}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-pribadi">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Status Perkawinan
        </a>
      </p>
    </li>
  @endif

</ul>

<div class="panel-body">
  <div class="form-inline">
    <a class="btn btn-default" data-toggle="modal" href="#edit-informasi-pribadi">
      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      Edit
    </a>

  </div>
</div>

</div> <!-- Panel Informasi Pribadi -->


<div class="modal fade" id="edit-informasi-pribadi">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($klien, array(
        'route' => array(
          'klien.updateSection',
          $klien->klien_id, 
          'pribadi'), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Informasi Pribadi</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('nama_klien', 'Nama Klien', array('class' => 'strongLabel')) !!}
          {!! Form::text('nama_klien', null, array(
            'class' => 'form-control',
            'placeholder' => 'Nama Klien', 
            'autocomplete' => 'off')) !!}
        </div>
        <div class="form-group">
        {!! Form::label('kelamin', 'Kelamin', array('class' => 'strongLabel')) !!}
          <div class="form-inline list-group-item-text">
            {!! Form::radio('kelamin', 'Perempuan') !!} Perempuan 
            {!! Form::radio('kelamin', 'Laki-laki') !!} Laki-laki
          </div>
        </div>
        <div class="form-group">
          {!! Form::label('tanggal_lahir', 'Tanggal Lahir', array('class' => 'strongLabel')) !!}
          {!! Form::date('tanggal_lahir', null, array('class' => 'form-control date-picker')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('nama_orangtua', 'Nama Orangtua', array('class' => 'strongLabel')) !!}
          {!! Form::text('nama_orangtua', null, array(
            'class' => 'form-control',
            'placeholder' => 'Nama Orangtua', 
            'autocomplete' => 'off')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('agama', 'Agama', array('class' => 'strongLabel')) !!}
          {!! Form::select('agama', array(
          'Agama'     =>  'Agama', 
          'Islam'     =>  'Islam', 
          'Protestan' =>  'Protestan', 
          'Katolik'   =>  'Katolik', 
          'Hindu'     =>  'Hindu', 
          'Buddha'    =>  'Buddha', 
          'Kong Hu Cu'=>  'Kong Hu Cu', 
          'Lain'      =>  'Lain'
        ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('status_perkawinan', 'Status Perkawinan', array('class' => 'strongLabel')) !!}
          {!! Form::select('status_perkawinan', array(
          'Status Perkawinan' =>  'Status Perkawinan', 
          'Belum Menikah'   =>  'Belum Menikah', 
          'Menikah'       =>  'Menikah', 
          'Cerai'       =>  'Cerai', 
          'Janda'       =>  'Janda'
        ), null, array('class' => 'form-control'))!!}
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          Batal
        </button>
        <button type="submit" class="btn btn-primary" name="submitBtn" value="informasi-pribadi">
          <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
          Simpan
        </button>
      </div>
    
      {!! Form::close() !!}

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->