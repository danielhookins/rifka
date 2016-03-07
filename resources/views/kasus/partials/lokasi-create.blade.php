<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Informasi Lokasi Kasus</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      
      <div class="col-sm-12">
        
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
            'Tempat Prifat' =>  'Tempat Prifat',
            'Lain'          =>  'Lain'
          ), null, array('class' => 'form-control'))!!}
        </div>

        <div class="form-group">
          {!! Form::label('deskripsi_lokasi', 'Deskripsi', array('class' => 'strongLabel')) !!} (tentang lokasi)
          {!! Form::text('deskripsi_lokasi', null, array('class' => 'form-control', 'autocomplete' => 'off')) !!}
        </div>

      </div>
    </div>
  </div>
</div>