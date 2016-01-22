@extends('layouts.klien')

@section('menu')

	@include('laporan.partials.menu-list')

@endsection

@section('content')

	<div class="laporan-control">
		{!! Form::
			model($daftar["control"], array(
				'route' => array(
					'laporan.'.$daftar["laporan"].'.list.update'),
				'class'=>'form-inline','method' => 'POST')
			)
		!!}
		
			<div class="form-group">
				<label for="year"><h3>Tahun</h3></label>
				<button class="btn btn-default" type="submit" name="change" value="prev">
					<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
				</button>
				<input style="width:70px;text-align:center" autocomplete="off" id="year" name="year" value="{{ $daftar["control"]["year"] }}" class="form-control">
				<button class="btn btn-default" @if($daftar["control"]["year"] == Carbon\Carbon::today()->format('Y')) disabled @endif type="submit" name="change" value="next">
					<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
				</button>
			</div>
			
			<div class="form-group">
				@if(isset($daftar["control"]["dropdown"]))
					@include('laporan.partials.dropdown')
				@endif
			</div>

			<button class="btn btn-default" type="submit" style="margin-top:10px;">Update</button>

		{!! Form::close() !!}
	</div>

	<div>
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
	</div>

@endsection	