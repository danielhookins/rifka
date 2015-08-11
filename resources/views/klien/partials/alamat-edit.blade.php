<?php $alamatActive = Session::get('alamat-active') ?>

<div class="modal fade" id="alamat-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($alamatActive, array(
        'route' => array('klien.alamat.update', 
          $alamatActive->klien_id, 
          $alamatActive->alamat_id), 
        'class'=>'form', 
        'method' => 'PUT')) 
      !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Alamat</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('alamat', 'Alamat', array('class' => 'strongLabel')) !!}
          {!! Form::text('alamat', null, array(
          	'class' => 'form-control',
          	'placeholder' => 'Alamat',
          	'autocomplete' => 'off')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('kecematan', 'Kecematan', array('class' => 'strongLabel')) !!}
          {!! Form::select('kecamatan', array(
          	'Kecamatan'		=>	'Kecamatan',
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
          	'Kabupaten'	=>	'Kabupaten',
          	' '				=>	' ',
          	'Bantul'		=>	'Bantul',
          	'Gunungkidul'	=>	'Gunungkidul',
          	'Kulon Progo'	=>	'Kulon Progo',
          	'Sleman'		=>	'Sleman',
          	'Yogyakarta'	=>	'Yogyakarta',
          ), null, array('class' => 'form-control'))!!}
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