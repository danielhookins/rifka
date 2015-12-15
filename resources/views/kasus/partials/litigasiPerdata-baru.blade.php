<div class="modal fade" id="litigasiPerdata-baru">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::open(array('route' => array('kasus.litigasiPerdata.store', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Litigasi Perdata</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('nomor_perkara', 'Nomor Perkara Pengadilan', array('class' => 'strongLabel')) !!}
          {!! Form::text('nomor_perkara', null, array('class' => 'form-control', 'autocomplete' => 'off')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('pengadilan_wilayah_jenis', 'Pengadilan Wilayah Jenis', array('class' => 'strongLabel')) !!}
          {!! Form::select('pengadilan_wilayah_jenis', array(
            'Negeri' =>  'Negeri',
            'Agama' => 'Agama',
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('pengadilan_wilayah_kabupaten', 'Pengadilan Wilayah Kabupaten', array('class' => 'strongLabel')) !!}
          {!! Form::select('pengadilan_wilayah_kabupaten', array(
            'Bantul' =>  'Bantul',
            'Gunungkidul' => 'Gunungkidul',
            'Kulon Progo' => 'Kulon Progo',
            'Sleman' => 'Sleman',
            'Yogyakarta' => 'Yogyakarta',
            'Lain' => 'Lain',
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('nama_hakim', 'Nama Hakim', array('class' => 'strongLabel')) !!}
          {!! Form::text('nama_hakim', null, array('class' => 'form-control', 'autocomplete' => 'off')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('cerai', 'Cerai', array('class' => 'strongLabel')) !!}
          {!! Form::select('cerai', array(
            '' => '',
            'Cerai gugat' =>  'Cerai guguat',
            'Cerai talak' => 'Cerai talak',
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('putusan_status', 'Putusan Status', array('class' => 'strongLabel')) !!}
          {!! Form::select('putusan_status', array(
            'Diterima' =>  'Diterima',
            'Ditolak' => 'Ditolak',
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('diterima', 'Diterima', array('class' => 'strongLabel')) !!}
          {!! Form::select('diterima', array(
            '' => '',
            'Cerai' =>  'Cerai',
            'Nafkah' => 'Nafkah',
            'Huk asuh anak' => 'Huk asuh anak',
            'Gono-gini' => 'Gono-gini',
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('nafkah', 'Nafkah', array('class' => 'strongLabel')) !!}
          {!! Form::text('nafkah', null, array('class' => 'form-control', 'autocomplete' => 'off')) !!}
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