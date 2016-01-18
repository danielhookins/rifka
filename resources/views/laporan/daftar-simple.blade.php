@extends('layouts.klien')

@section('menu')

	@include('laporan.partials.menu-list')

@endsection

@section('content')

	{!! Form::
		model($data, array(
			'route' => array(
				'laporan.'.$data["laporan"].'.list.update'),
			'class'=>'form-inline','method' => 'POST')
		)
	!!}

		<h3>
			Tahun 
			<button class="btn btn-default" type="submit" name="change" value="prev">
				<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
			</button>
			<input style="width:70px;text-align:center" autocomplete="off" id="year" name="year" value="{{ $data["year"] }}">
			<button class="btn btn-default" @if($data["year"] == Carbon\Carbon::today()->format('Y')) disabled @endif type="submit" name="change" value="next">
				<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
			</button>
			<button class="btn btn-default" type="submit">Update</button>
		</h3>

	{!! Form::close() !!}

	<h2>{{ $data["title"] }}</h2>

	<table id="datatable" class="table table-hover table-condensed">
		<thead>
			@foreach($data["headers"] as $header)
				<th>{{ $header }}</th>
			@endforeach
		</thead>
		<tbody>
			@foreach($data["rows"] as $row)
				<tr>
					@foreach($data["headers"] as $header)
						<td>
							{{ $header }}
						</td>
					@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection	