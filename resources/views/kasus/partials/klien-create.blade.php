<div class="panel panel-{!!($type == "Korban" ? 'primary' : 'warning')!!}">
	<div class="panel-heading">
		<h3 class="panel-title"><a name="{{ lcfirst($type) }}-panel">{{$type}}</a></h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12">

				@if(Session::has('tambah'.$type))
					<div class="row">
						<div class="col-sm-12 opt-leftx">
							@include('kasus.partials.form-create.klien-search')
						</div>
						<!-- TODO: Add New-Client functionality
						<div class="col-sm-6">
							@include('klien.partials.new')
						</div>
						-->
					</div>
					<a href="" class="btn btn-danger">Cancel</a>

				@elseif(Session::has(lcfirst($type).'Search'))
					<div class="row">
						<div class="col-sm-12">
							@include('kasus.partials.form-create.klien-search-results')
						</div>
					</div>
					<a href="" class="btn btn-danger">Cancel</a>
				
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
					  		<td colspan=2><button type="submit" name="delete{{$type}}" value="True">Delete</button></td>
					  	</tr>
						</table>
						@else
							<p>Belum ada {{$type}}.</p>
						@endif
						{!! Form::close() !!}
				  
					<a href="{{ route('tambah.klien', lcfirst($type))}}" class="btn btn-{!!(($type == "Korban" && !Session::has('korban2')) ? 'primary' : 'default')!!} pull-right">Tambah {{$type}}</a>
				
				@endif
				
			</div>
		</div>
	</div>
</div>