<div class="panel panel-default">

<div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="informasi-kasus">
      <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
      Informasi Kasus
    </a>
  </h4>
</div>

<ul class="list-group">
  
  @if($kasus->created_at)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Tanggal Kasus Dibuka</strong>
          {{$kasus->created_at}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-kasus">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Tanggal Kasus Dibuka
        </a>
      </p>
    </li>
  @endif

	@if($kasus->jenis_kasus)
    <li class="list-group-item">
      	<p class="list-group-item-text">
          <strong>Jenis Kasus</strong>
          {{$kasus->jenis_kasus}}
        </p>
  	</li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-kasus">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Jenis Kasus
        </a>
      </p>
    </li>
  @endif

  @if($kasus->sejak_kapan)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Sejak Kapan</strong> (kekerasan mulai)
          {{$kasus->sejak_kapan}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-kasus">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Sejak kapan
        </a>
      </p>
    </li>
  @endif

  @if($kasus->seberapa_sering)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Seberapa Sering</strong>
          {{$kasus->seberapa_sering}} {{$kasus->jenis_seberapa_sering}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-kasus">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Seberapa Sering
        </a>
      </p>
    </li>
  @endif

  @if($kasus->harapan_korban)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Harapan Korban</strong>
          {{$kasus->harapan_korban}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-kasus">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Harapan Korban
        </a>
      </p>
    </li>
  @endif

  @if($kasus->rencana_korban)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Rencana Korban</strong>
          {{$kasus->rencana_korban}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-kasus">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Rencana Korban
        </a>
      </p>
    </li>
  @endif

</ul>

<div class="panel-body">
  <div class="form-inline">
    <a class="btn btn-default" data-toggle="modal" href="#edit-informasi-kasus">
      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      Edit
    </a>

  </div>
</div>

</div> <!-- Panel Informasi Kasus -->

<div class="modal fade" id="edit-informasi-kasus">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($kasus, array('route' => array('kasus.update', $kasus->kasus_id), 'class'=>'form', 'method' => 'PUT')) !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Informasi Kasus</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('created_at', 'Tanggal Kasus Dibuka', array('class' => 'strongLabel')) !!}
          {!! Form::text('created_at', null, array('class' => 'form-control date-picker')) !!}
        </div>
        <div class="form-group">
          <strong>Jenis Kasus:</strong><br />
          {!! Form::select('jenis_kasus', array(
            'Jenis'       =>  'Jenis',
            'KTI'         =>  'KTI',
            'KDP'         =>  'KDP',
            'Perkosaan'   =>  'Perkosaan',
            'Pel-Seks'    =>  'Pel-Seks',
            'KDK'         =>  'KDK',
            'Trafficking' =>  'Trafficking',
            'Lain'        =>  'Lain'
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('sejak_kapan', 'Sejak Kapan', array('class' => 'strongLabel')) !!} (kekerasan mulai)
          {!! Form::text('sejak_kapan', null, array('class' => 'form-control date-picker')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('seberapa_sering', 'Seberapa Sering', array('class' => 'strongLabel')) !!}
          <div class="form-inline">
            {!! Form::number('seberapa_sering', null, array('class' => 'form-control',
            'placeholder'   => 'Seberapa Sering')) !!}
            {!! Form::select('jenis_seberapa_sering', array(
              'kali'     =>  'kali',
              'kali per hari'     =>  'kali per hari',
              'kali per bulan'     =>  'kali per bulan',
              'kali per tahun'     =>  'kali per tahun'
            ), null, array('class' => 'form-control'))!!}
          </div>
        </div>
        <div class="form-group">
          {!! Form::label('harapan_korban', 'Harapan Korban', array('class' => 'strongLabel')) !!}
          {!! Form::text('harapan_korban', null, array(
            'class'     => 'form-control',
            'placeholder'   => 'Harapan Korban'
          ))
          !!}
        </div>
        <div class="form-group">
          {!! Form::label('rencana_korban', 'Rencana Korban', array('class' => 'strongLabel')) !!}
          {!! Form::text('rencana_korban', null, array(
            'class'     => 'form-control',
            'placeholder'   => 'Rencana Korban Selanjutnya'
          ))
          !!}
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