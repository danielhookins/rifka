<div class="modal fade" id="alamat-baru">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::open(array('route' => array('klien.alamat.store', $klien->klien_id), 'class'=>'form', 'method' => 'POST')) !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Alamat</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('alamat', 'Alamat', array('class' => 'strongLabel')) !!}
          <p class="helper-label">Contoh: Jl. Jambu no. 123</p>
          {!! Form::text('alamat', null, array(
          	'class' => 'form-control',
          	'placeholder' => 'Alamat',
          	'autocomplete' => 'off')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('kecematan', 'Kecematan', array('class' => 'strongLabel')) !!}
          {!! Form::select('kecamatan', array(
          	' '				=>	' ',
          	'Bambanglipuro'	=>	'Bambanglipuro',
          	'Banguntapan'	=>	'Banguntapan',
          	'Bantul'		=>	'Bantul',
          	'Berbah'		=>	'Berbah',
          	'Cangkringan'	=>	'Cangkringan',
          	'Danurejan'		=>	'Danurejan',
          	'Depok'			=>	'Depok',
          	'Dlingo'		=>	'Dlingo',
          	'Galur'			=>	'Galur',
          	'Gamping'		=>	'Gamping',
          	'Gedangsari'	=>	'Gedangsari',
          	'Gedongtengen'	=>	'Gedongtengen',
          	'Girimulyo'		=>	'Girimulyo',
          	'Girisubo'		=>	'Girisubo',
          	'Godean'		=>	'Godean',
          	'Gondokusuman'	=>	'Gondokusuman',
          	'Gondomanan'	=>	'Gondomanan',
          	'Imogiri'		=>	'Imogiri',
          	'Jetis'			=>	'Jetis',
          	'Kalasan'		=>	'Kalasan',
          	'Kalibawang'	=>	'Kalibawang',
          	'Karangmojo'	=>	'Karangmojo',
          	'Kasihan'		=>	'Kasihan',
          	'Kokap'			=>	'Kokap',
          	'Kotagede'		=>	'Kotagede',
          	'Kraton'		=>	'Kraton',
          	'Kretek'		=>	'Kretek',
          	'Lendah'		=>	'Lendah',
          	'Mantrijeron'	=>	'Mantrijeron',
          	'Mergangsan'	=>	'Mergangsan',
          	'Minggir'		=>	'Minggir',
          	'Mlati'			=>	'Mlati',
          	'Moyudan'		=>	'Moyudan',
          	'Nanggulan'		=>	'Nanggulan',
          	'Ngaglik'		=>	'Ngaglik',
          	'Ngampilan'		=>	'Ngampilan',
          	'Ngawen'		=>	'Ngawen',
          	'Ngemplak'		=>	'Ngemplak',
          	'Nglipar'		=>	'Nglipar',
          	'Pajangan'		=>	'Pajangan',
          	'Pakem'			=>	'Pakem',
          	'Pakualaman'	=>	'Pakualaman',
          	'Paliyan'		=>	'Paliyan',
          	'Pandak'		=>	'Pandak',
          	'Panggang'		=>	'Panggang',
          	'Panjatan'		=>	'Panjatan',
          	'Patuk'			=>	'Patuk',
          	'Pengasih'		=>	'Pengasih',
          	'Piyungan'		=>	'Piyungan',
          	'Playen'		=>	'Playen',
          	'Pleret'		=>	'Pleret',
          	'Ponjong'		=>	'Ponjong',
          	'Prambanan'		=>	'Prambanan',
          	'Pundong'		=>	'Pundong',
          	'Purwosari'		=>	'Purwosari',
          	'Rongkop'		=>	'Rongkop',
          	'Samigaluh'		=>	'Samigaluh',
          	'Sanden'		=>	'Sanden',
          	'Saptosari'		=>	'Saptosari',
          	'Sedayu'		=>	'Sedayu',
          	'Semanu'		=>	'Semanu',
          	'Semin'			=>	'Semin',
          	'Sentolo'		=>	'Sentolo',
          	'Sewon'			=>	'Sewon',
          	'Seyegan'		=>	'Seyegan',
          	'Sleman'		=>	'Sleman',
          	'Srandakan'		=>	'Srandakan',
          	'Tanjungsari'	=>	'Tanjungsari',
          	'Tegalrejo'		=>	'Tegalrejo',
          	'Temon'			=>	'Temon',
          	'Tempel'		=>	'Tempel',
          	'Tepus'			=>	'Tepus',
          	'Turi'			=>	'Turi',
          	'Umbulharjo'	=>	'Umbulharjo',
          	'Wates'			=>	'Wates',
          	'Wirobrajan'	=>	'Wirobrajan',
          	'Wonosari'		=>	'Wonosari'
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('kabupaten', 'Kabupaten', array('class' => 'strongLabel')) !!}
          {!! Form::select('kabupaten', array(
          	' '				=>	' ',
          	'Bantul'		=>	'Bantul',
          	'Gunungkidul'	=>	'Gunungkidul',
          	'Kulon Progo'	=>	'Kulon Progo',
          	'Sleman'		=>	'Sleman',
          	'Yogyakarta'	=>	'Yogyakarta',
          ), null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
          {!! Form::label('provinsi', 'Provinsi', array('class' => 'strongLabel')) !!}
          {!! Form::select('provinsi', array(
            '' => '',
            'Yogyakarta'        =>  'Yogyakarta',
            'Jakarta'         =>  'Jakarta',
            'Jawa Barat'        =>  'Jawa Barat',
            'Jawa Tengah'       =>  'Jawa Tengah',
            'Jawa Timur'        =>  'Jawa Timur',
            'Aceh'            =>  'Aceh',
            'Sumatera Utara'      =>  'Sumatera Utara',
            'Sumatera Barat'      =>  'Sumatera Barat',
            'Riau'            =>  'Riau',
            'Jambi'           =>  'Jambi',
            'Sumatera Selatan'      =>  'Sumatera Selatan',
            'Bengkulu'          =>  'Bengkulu',
            'Lampung'         =>  'Lampung',
            'Kepulauan Bangka Belitung' =>  'Kepulauan Bangka Belitung',
            'Kepulauan Riau'      =>  'Kepulauan Riau',
            'Banten'          =>  'Banten',
            'Bali'            =>  'Bali',
            'Nusa Tenggara Timur'   =>  'Nusa Tenggara Timur',
            'Nusa Tenggara Barat'   =>  'Nusa Tenggara Barat',
            'Kalimantan Barat'      =>  'Kalimantan Barat',
            'Kalimantan Tengah'     =>  'Kalimantan Tengah',
            'Kalimantan Selatan'    =>  'Kalimantan Selatan',
            'Kalimantan Timur'      =>  'Kalimantan Timur',
            'Kalimantan Utara'      =>  'Kalimantan Utara',
            'Sulawesi Utara'      =>  'Sulawesi Utara',
            'Sulawesi Tengah'     =>  'Sulawesi Tengah',
            'Sulawesi Selatan'      =>  'Sulawesi Selatan',
            'Sulawesi Tenggara'     =>  'Sulawesi Tenggara',
            'Sulawesi Barat'      =>  'Sulawesi Barat',
            'Gorontalo'         =>  'Gorontalo',
            'Maluku'          =>  'Maluku',
            'Maluku Utara'        =>  'Maluku Utara',
            'Papua'           =>  'Papua',
            'Papua Barat'       =>  'Papua Barat',
           ), null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('jenis', 'Jenis', array('class' => 'strongLabel')) !!}
          <select id="jenisSelect" name="jenis">
            <option value="Jenis">Jenis</option>
            <option value="KTP">KTP</option>
            <option value="Domisili">Domisili</option>
            <option value="KTPDomisili">KTP & Domisili</option>
          </select>
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