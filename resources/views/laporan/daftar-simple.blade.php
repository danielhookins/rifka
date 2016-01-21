@extends('layouts.klien')

@section('menu')

	@include('laporan.partials.menu-list')

@endsection

@section('content')

	{!! Form::
		model($daftar, array(
			'route' => array(
				'laporan.'.$daftar["laporan"].'.list.update'),
			'class'=>'form-inline','method' => 'POST')
		)
	!!}

		<h3>
			Tahun 
			<button class="btn btn-default" type="submit" name="change" value="prev">
				<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
			</button>
			<input style="width:70px;text-align:center" autocomplete="off" id="year" name="year" value="{{ $daftar["year"] }}">
			<button class="btn btn-default" @if($daftar["year"] == Carbon\Carbon::today()->format('Y')) disabled @endif type="submit" name="change" value="next">
				<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
			</button>
			<button class="btn btn-default" type="submit">Update</button>
		</h3>

	{!! Form::close() !!}

	<h2>{{ $daftar["title"] }}</h2>

	<table id="datatable" class="table table-hover table-condensed">
		<thead>
			@foreach($daftar["data"][0] as $header => $value)
				<th>{{ $header }}</th>
			@endforeach
		</thead>
		<tbody>
			@foreach($daftar["data"] as $row)
				<tr>
					@foreach($row as $header => $value)
						<td>{{ $value }}</td>
					@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection	