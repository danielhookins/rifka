<div class="panel panel-default">

<div class="panel-heading">
  <h4 class="panel-title">
    <a class="in-link" name="informasi-tambahan">
      Informasi Tambahan
    </a>
  </h4>
</div>

<ul class="list-group">
  
  @if($klien->jumlah_anak)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Jumlah Anak</strong>
          {{$klien->jumlah_anak}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-tambahan">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Jumlah Anak
        </a>
      </p>
    </li>
  @endif

  @if($klien->pendidikan && $klien->pendidikan != "Pendidikan")
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Pendidikan</strong> (Klien telah lulus)
          {{$klien->pendidikan}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-tambahan">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Pendidikan
        </a>
      </p>
    </li>
  @endif

  @if($klien->pekerjaan)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Pekerjaan</strong>
          {{$klien->pekerjaan}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-tambahan">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Pekerjaan
        </a>
      </p>
    </li>
  @endif

  @if($klien->jabatan)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Jabatan</strong>
          {{$klien->jabatan}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-tambahan">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Jabatan
        </a>
      </p>
    </li>
  @endif

  @if($klien->penghasilan)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Penghasilan</strong>
          {{$klien->penghasilan}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-tambahan">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Penghasilan
        </a>
      </p>
    </li>
  @endif

  @if($klien->kondisi_klien)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Kondisi Klien</strong>
          {{$klien->kondisi_klien}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-tambahan">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Kondisi Klien
        </a>
      </p>
    </li>
  @endif

  @if($klien->dirujuk_oleh)
    <li class="list-group-item">
        <p class="list-group-item-text">
          <strong>Dirujuk Oleh</strong>
          {{$klien->dirujuk_oleh}}
        </p>
    </li>
  @else
    <li class="list-group-item">
      <p class="list-group-item-text">
        <a class="tambah-link" data-toggle="modal" href="#edit-informasi-tambahan">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Tambah Dirujuk Oleh
        </a>
      </p>
    </li>
  @endif

</ul>

<div class="panel-body">
  <div class="form-inline">
    <a class="btn btn-default" data-toggle="modal" href="#edit-informasi-tambahan">
      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      Edit
    </a>

  </div>
</div>

</div> <!-- Panel Tambahan -->

<div class="modal fade" id="edit-informasi-tambahan">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($klien, array(
        'route' => array(
          'klien.updateSection',
          $klien->klien_id, 
          'tambahan'), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Informasi Tambahan</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('jumlah_anak', 'Jumlah Anak', array('class' => 'strongLabel')) !!}
          {!! Form::number('jumlah_anak', null, array(
            'class' => 'form-control',
            'placeholder' => 'Jumlah Anak',
            'autocomplete' => 'off')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('pendidikan', 'Pendidikan', array('class' => 'strongLabel')) !!}
          (Klien telah lulus)
          {!! Form::select('pendidikan', array(
            'Pendidikan'  => 'Pendidikan',
            'Tidak Sekolah' => 'Tidak Sekolah',
            'TK' => 'TK',
            'SD' => 'SD',
            'SLTP' => 'SLTP',
            'SLTA' => 'SLTA',
            'S1' => 'S1',
            'S2' => 'S2',
            'S3' => 'S3',
            'D3' => 'D3'), null, array(
              'class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('pekerjaan', 'Pekerjaan', array('class' => 'strongLabel')) !!}
          {!! Form::text('pekerjaan', null, array(
            'class' => 'form-control',
            'placeholder' => 'Pekerjaan', 
            'autocomplete' => 'off')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('jabatan', 'Jabatan', array('class' => 'strongLabel')) !!}
          {!! Form::text('jabatan', null, array(
            'class' => 'form-control',
            'placeholder' => 'Jabatan', 
            'autocomplete' => 'off')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('penghasilan', 'Penghasilan', array('class' => 'strongLabel')) !!}
          {!! Form::select('penghasilan', array(
            'Penghasilan'           => 'Penghasilan',
            '< Rp 500.000'          =>  '< Rp 500.000',
            '> Rp 500.000 < Rp 1.000.000' =>  '> Rp 500.000 < Rp 1.000.000',
            '> Rp 1.000.000'        =>  '> Rp 1.000.000'), null, array(
              'class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('kondisi_klien', 'Kondisi Klien', array('class' => 'strongLabel')) !!}
          {!! Form::text('kondisi_klien', null, array(
            'class' => 'form-control',
            'placeholder' => 'Kondisi Klien', 
            'autocomplete' => 'off')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('dirujuk_oleh', 'Dirujuk Oleh', array('class' => 'strongLabel')) !!}
          {!! Form::text('dirujuk_oleh', null, array(
            'class' => 'form-control',
            'placeholder' => 'Dirujuk Oleh', 
            'autocomplete' => 'off')) !!}
        </div>
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          Batal
        </button>
        <button type="submit" class="btn btn-primary" name="submitBtn" value="informasi-tambahan">
          <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
          Simpan
        </button>
      </div>
    
      {!! Form::close() !!}

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->