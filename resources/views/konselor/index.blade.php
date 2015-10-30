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
		'route' => array('konselor2.delete'),
		'class' => 'form-inline',
		'method' => 'POST')) 
	!!}

	<div class="daftar-table" style="margin-top:20px">
		<table id ="datatable" class="table table-hover table-compact table-striped">
			<thead>
			<tr>
				<th style="text-align:center">
					<button class="" type="submit">
				    <span class="glyphicon glyphicon-trash" aria-hidden="true" />
				  </button>
				</th>
				<th>Nama Konselor</th>
				<th>User ID</th>
			</tr>
			</thead>
			<tbody>
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
			</tbody>
			<a class="btn btn-small" href="{{ route('konselor.create') }}">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				Tambah Konselor
			</a>
		</table>

	</div>

	{!! Form::close() !!}

@endsection