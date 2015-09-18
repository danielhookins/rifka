@extends('layouts.records')

@section('content')

@if(Session::has('konselorMsgs'))
	<div class="alert alert-info alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	  <strong>Perhatian</strong>
	  <ul>
		  @foreach(Session::get('konselorMsgs') as $msg) 
		  	<li>{{ $msg }}</li>
		  @endforeach
	  </ul>
	</div>
@endif

	<h2>Konselor</h2>

	{!! Form::open(array(
		'route' => array('konselor.search'),
		'class' => 'form-inline',
		'method' => 'POST')) 
	!!}

	<div class="form-group">
		{!! Form::text('search_query', null, array(
		  'class'     => 'form-control',
		  'autocomplete' => 'off',
		  'placeholder'   => 'Cari konselor'))
		!!}
	</div>

	<div class="form-group">
  	<button type="submit" class="btn btn-default form-control" id="search-button">
		  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Penelusuran
		</button>
	</div>

	{!! Form::close() !!}


	{!! Form::open(array(
		'route' => array('konselor2.delete'),
		'class' => 'form-inline',
		'method' => 'POST')) 
	!!}

	<div class="daftar-table" style="margin-top:20px">
		<table class="table table-hover">
			<tr>
				<th></th>
				<th>Nama Konselor</th>
				<th>User ID</th>
			</tr>

			<?php $i = 0; ?>
			@forelse($konselor2 as $konselor)
				<tr>
					<td style="text-align:center">
						{!! Form::checkbox('toDelete['.$i.']', $konselor->konselor_id, False) !!}
          	<?php $i++ ?>
          </td>
					<td>
						<a href="{{ route('konselor.show', $konselor->konselor_id) }}">
							{{$konselor->nama_konselor}}
						</a>
					</td>
					<td>{{$konselor->user_id}}</td>
				</tr>
			@empty
				<tr>
					<td colspan=4>Belum ada konselor.</td>
				</tr>
			@endforelse
		</table>

		<a class="btn btn-sm btn-default" href="{{ route('konselor.create') }}">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		</a>
		<button class="btn btn-sm btn-default" type="submit">
      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
	</div>

	{!! Form::close() !!}

@endsection