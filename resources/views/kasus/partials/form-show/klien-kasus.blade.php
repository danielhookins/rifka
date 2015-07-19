<div class="panel panel-primary">

	<div class="panel-heading">
	  <h4 class="panel-title">
		<a class="in-link" name="klien-kasus">
		  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
		  Klien
		</a>
	  </h4>
	</div>

	<ul class="list-group">
	  @forelse ($kasus->klienKasus as $klien)
		<li class="list-group-item">
			<p class="list-group-item-text">
				{!! Form::checkbox($klien->klien_id, 1, False) !!}
				<strong>{{$klien->pivot->jenis_klien}}</strong>
				<a href="{{route('klien.show', $klien->klien_id)}}">{{ $klien->nama_klien }}</a>
			</p>
		</li>
	  @empty
		<li class="list-group-item">
		  <a class="tambah-link" href="#">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			Tambah Klien
		  </a>
		</li>
	  @endforelse
	</ul>

		@if(!empty($kasus->klienKasus->toArray()))
		<div class="panel-body">
		  <div class="form-inline">
		    <a class="btn btn-sm btn-default" href="{{route('kasus.edit', array($kasus->kasus_id))}}">
		      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		    </a>
		    <a class="btn btn-sm btn-default" href="{{route('kasus.edit', array($kasus->kasus_id))}}">
		      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		    </a>
		  </div>
		</div>
		@endif
	
	<div class="panel-heading" style="background-color:#f5f5f5; border-color:#ddd;">
	  <h4 class="panel-title" style="color:black;">
		  Hubungan
	  </h4>
	</div>
	
	<ul class="list-group">
	  @if($kasus->hubungan)
	    <li class="list-group-item">
	        <p class="list-group-item-text">
	          <strong>Hubungan</strong>
	          {{$kasus->hubungan}}
	        </p>
	    </li>
	  @else
	    <li class="list-group-item">
	      <p class="list-group-item-text">
	        <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">
	        	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	        	Tambah Hubungan
	        </a>
	      </p>
	    </li>
	  @endif
	  @if($kasus->lama_hubungan)
	    <li class="list-group-item">
	        <p class="list-group-item-text">
	          <strong>Lama Hubungan</strong>
	          {{$kasus->lama_hubungan}}
	        </p>
	    </li>
	  @else
	    <li class="list-group-item">
	      <p class="list-group-item-text">
	        <a class="tambah-link" href="{{route('kasus.edit', array($kasus->kasus_id, 'informasi-kasus'))}}">
	        	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	        	Tambah Lama Hubungan
	        </a>
	      </p>
	    </li>
	  @endif
	</ul>

	@if($kasus->hubungan || $kasus->lama_hubungan)
	<div class="panel-body">
	  <div class="form-inline">
	    <a class="btn btn-default" data-toggle="modal" href="#edit-hubungan-klien">
	      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	      Edit
	    </a>
	  </div>
	</div>
	@endif

</div>


<div class="modal fade" id="edit-hubungan-klien">
  <div class="modal-dialog">
    <div class="modal-content">

      {!! Form::model($kasus, array('route' => array('kasus.update', $kasus->kasus_id), 'class'=>'form', 'method' => 'PUT')) !!}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Hubungan Klien</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('hubungan', 'Hubungan', array('class' => 'strongLabel')) !!}
          {!! Form::text('hubungan', null, array(
            'class'     => 'form-control',
            'placeholder'   => 'Hubungan'))!!}
          {!! Form::label('lama_hubungan', 'Lama Hubungan', array('class' => 'strongLabel')) !!}
          <div class="form-inline">
            {!! Form::number('lama_hubungan', null, array(
              'class'     => 'form-control',
              'placeholder'   => 'Lama Hubungan'))!!}
            {!! Form::select('lama_hub_jenis', array(
              'Hari'  =>  'Hari',
              'Bulan' =>  'Bulan',
              'Tahun' =>  'Tahun'), 
              null, array('class' => 'form-control'))!!}
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    
      {!! Form::close() !!}

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->