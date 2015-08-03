<div class="panel panel-default">
	<div class="panel-heading">
	  <h4 class="panel-title">
	    <a class="in-link" name="klien-kasus">
		  	<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
		  	Klien
			</a>
	  </h4>
	</div>

	@if(Session::has('tambah'.$type))
		<div class="panel-body">
			@include('kasus.partials.klien-search')<br />
			<a class="btn btn-default" href="">
		    <span class="glyphicon glyphicon-remove" aria-hidden="true" href=""></span>
		    Batal
		  </a>
		</div>

	@elseif(Session::has(lcfirst($type).'Search'))
		<div class="panel-body">
			@include('kasus.partials.klien-search-results')
			<a class="btn btn-danger" href="">
		    <span class="glyphicon glyphicon-remove" aria-hidden="true" href=""></span>
		    Batal
		  </a>
		</div>

	@else
		<table class="table table-hover table-responsive">
		
		@if(!empty($kasus->klienKasus->toArray()))

				{!! Form::model($kasus, array('route' => array('klien2kasus.delete', $kasus->kasus_id), 'class'=>'form', 'method' => 'POST')) !!}

				<tr>
					<th style="width:1%"></th>
					<th class="col-xs-3">Nama Klien</th>
					<th class="col-xs-2">Jenis</th>
					<th class="col-sm-3 hidden-xs"></th>
				</tr>
				
				<?php $i = 0; ?>
			  @foreach ($kasus->klienKasus as $klien)
					<tr>
						<td style="text-align:center">
							{!! Form::checkbox('toDelete['.$i.']', $klien->klien_id, False) !!}
							<?php $i++ ?>
						</td>
						<td><a href="{{route('klien.show', $klien->klien_id)}}">{{ $klien->nama_klien }}</a></td>
						<td>
							<select 
								class="form-control" 
								id="jenis_klien_{{ $klien->klien_id }}" 
								onChange="updateJenisKlienSelected({{ $klien->klien_id }}, {{ $kasus->kasus_id }})" 
								name="jenis_klien">
								<option value=""
									{!! ($klien->pivot->jenis_klien == null) ? 'selected="selected"' : ''  !!}></option>
								<option value="Korban"
									{!! ($klien->pivot->jenis_klien == 'Korban') ? 'selected="selected"' : ''  !!}>
									Korban</option>
								<option value="Pelaku"
									{!! ($klien->pivot->jenis_klien == 'Pelaku') ? 'selected="selected"' : ''  !!}>
									Pelaku</option>
							</select>
						</td>
						<td class="hidden-xs"></td>
					</tr>

			  @endforeach

		@else
		<ul class="list-group">
			<li class="list-group-item">
	      <p class="list-group-item-text">
	        <a class="tambah-link" data-toggle="modal" href="{{ route('tambah.klien', lcfirst($type))}}">
	          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	          Tambah Klien
	        </a>
	      </p>
	    </li>
	  </ul>

		@endif

			<tr>
		  	<td colspan="4">
		  		<a class="btn btn-sm btn-default" href="{{ route('tambah.klien', lcfirst($type))}}">
			      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			    </a>
			    @if(!empty($kasus->klienKasus->toArray()))
			    <button class="btn btn-sm btn-default" type="submit">
			      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
			    </button>
		  		@endif
		  	</td>
		  </tr>
		  
		  {!! Form::close() !!}
		
		</table>

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
	        <a class="tambah-link" data-toggle="modal" href="#edit-hubungan-klien">
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
	          {{$kasus->lama_hubungan}} {{$kasus->jenis_lama_hub or ''}}
	        </p>
	    </li>
	  @else
	    <li class="list-group-item">
	      <p class="list-group-item-text">
	        <a class="tambah-link" data-toggle="modal" href="#edit-hubungan-klien">
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
        </div>
        <div class="form-group">
        	{!! Form::label('lama_hubungan', 'Lama Hubungan', array('class' => 'strongLabel')) !!}
        	<div class="form-inline">
	          {!! Form::number('lama_hubungan', null, array(
	            'class'     => 'form-control',
	            'placeholder'   => 'Lama Hubungan'))!!}
	          {!! Form::select('jenis_lama_hub', array(
	            'Hari'  =>  'Hari',
	            'Bulan' =>  'Bulan',
	            'Tahun' =>  'Tahun'), 
	            null, array('class' => 'form-control'))!!}
        	</div>
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