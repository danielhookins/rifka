<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><a name="{{ lcfirst($type) }}-panel">{{$type}}</a></h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12">

				@if(Session::has('tambah'.$type))
					<div class="row">
						<div class="col-sm-12 opt-leftx">
							@include('search.partials.klien')
						</div>
					</div>
					<a href="" class="btn btn-danger">Batal</a>

				@elseif(Session::has(lcfirst($type).'Search'))
					<div class="row">
						<div class="col-sm-12">
							@include('kasus.partials.klien-search-results')
						</div>
					</div>
					<a href="" class="btn btn-danger">Batal</a>
				
				@else
					
				  	{!! Form::open(array('route' => 'seshRemoveKlien')) !!}
						@if(Session::has(lcfirst($type).'2'))
						<table class="table">
							<?php $i = 0; ?>
							@foreach(Session::get(lcfirst($type).'2') as $klien)
					  	<tr>
						  	<td>{!! Form::checkbox('selected['.$i.']', $klien->klien_id) !!}</td>
						  	<td>{{ $klien->nama_klien }}</td>
					  	<?php $i++ ?>
					  	</tr>
					  	@endforeach
					  	<tr>
					  		<td colspan="2">
					  		  <a class="btn btn-sm btn-default" data-toggle="modal" href="{{ route('tambah.klien', lcfirst($type))}}">
					  		    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					  		  </a>
					  		  <button class="btn btn-sm btn-default" name="delete{{$type}}" type="submit" value="True">
					  		    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					  		  </button>
					  		</td>
					  	</tr>
						</table>
						@else
							<p>Belum ada {{$type}}.</p>

							<a href="{{ route('tambah.klien', lcfirst($type))}}" class="btn btn-default pull-right">Tambah {{$type}}</a>
						@endif
						{!! Form::close() !!}
				  
				@endif
				
			</div>
		</div>
	</div>
</div>