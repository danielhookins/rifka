@extends('layouts.records')

@section('content')

	<h3>Perubuhan</h3>

	<div class="panel-body">
		<a class="btn btn-default pull-right" aria-label="Left Align" href="{{route('klien.show', $klien->klien_id)}}">
		  <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
		  Kembali ke klien
		</a>
		<div class="clearfix"></div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<a class="in-link" name="change-log">{{$klien->nama_klien or 'Change Log'}}</a>
		</div>
		
		<table class="table table-compact">
			<th>User</th>
			<th>Action</th>
			<th>Date</th>	

			@if(isset($log))
					
				@forelse ($log as $item)
					<tr>
						<td>{{$item->username}}</td>
						<td>
							@if($item->action)
								<strong>{{$item->action}}</strong>
							@elseif($item->attribute_name)
								Changed <strong>{{$item->attribute_name}}</strong> from <em>{{$item->old_attribute_value}}</em> to <strong>{{$item->new_attribute_value}}</strong>
							@endif
						</td>
						<td>{{ $item->created_at }}</td>
					</tr>
				
				@empty
						<p>No changes logged.</p>
				
				@endforelse
				
			@endif
		
		</table>

	<div class="panel-body">
		<a class="btn btn-default pull-right" aria-label="Left Align" href="{{route('klien.show', $klien->klien_id)}}">
		  <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
		  Kembali ke klien
		</a>
		<div class="clearfix"></div>
	</div>

	</div>

@endsection
