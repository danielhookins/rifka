<div class="panel panel-informasi" style="background:#b6fcb6;"> <!-- Tambahan Panel -->
    <div class="panel-heading"><a class="in-link" name="informasi-tambahan">Informasi Tambahan</a></div>
  <ul class="list-group">

    <li class="list-group-item">
    	<h4 class="list-group-item-heading">Keluarga</h4>
    	<div class="list-group-item-text">
        {!! Form::label('jumlah_anak', 'Jumlah Anak', array('class' => 'strongLabel')) !!}
        {!! Form::number('jumlah_anak', null, array('class' => 'form-control')) !!}
      </div>
  	</li>

    <li class="list-group-item">
    	<h4 class="list-group-item-heading">Pekerjaan</h4>
    	<ul class="list-group">
        <li class="list-group-item">
          <div class="list-group-item-text">{!! Form::text('pekerjaan', null, array('class' => 'form-control', 'placeholder' => 'Pekerjaan')) !!}</div>
        </li>
        <li class="list-group-item">
          <div class="list-group-item-text">{!! Form::text('jabatan', null, array('class' => 'form-control', 'placeholder' => 'Jabatan')) !!}</div>
        </li>
        <li class="list-group-item">
          <div class="list-group-item-text">
            {!! Form::label('penghasilan', 'Penghasilan', array('class' => 'strongLabel')) !!}
            {!! Form::select('penghasilan', array(
              'Penghasilan'           => 'Penghasilan',
              '< Rp 500.000'          =>  '< Rp 500.000',
              '> Rp 500.000 < Rp 1.000.000' =>  '> Rp 500.000 < Rp 1.000.000',
              '> Rp 1.000.000'        =>  '> Rp 1.000.000'
            ), null, array('class' => 'form-control'))!!}
          </div>
        </li>
      </ul>
  	</li>

  	<li class="list-group-item">
    	<h4 class="list-group-item-heading">Lain</h4>
      <ul class="list-group">
        <li class="list-group-item">
          <div class="list-group-item-text">
            {!! Form::label('kondisi_klien', 'Kondisi Klien', array('class' => 'strongLabel')) !!}
            {!! Form::text('kondisi_klien', null, array('class' => 'form-control', 'placeholder' => 'Kondisi Klien')) !!}</div>
        </li>
        <li class="list-group-item">
          <div class="list-group-item-text">
            {!! Form::label('dirujuk_oleh', 'Dirujuk Oleh', array('class' => 'strongLabel')) !!}
            {!! Form::text('dirujuk_oleh', null, array('class' => 'form-control', 'placeholder' => 'Dirujuk Oleh')) !!}</div>
        </li>
      </ul>
  	</li>
  </ul>
</div> <!-- /Tambahan Panel -->