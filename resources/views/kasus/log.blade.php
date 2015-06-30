@extends('layouts.records')

@section('content')

	<h3>Perubuhan</h3>

	<div class="panel-body">
		<a class="btn btn-default pull-right" aria-label="Left Align" href="{{route('kasus.show', $kasus->kasus_id)}}">
		  <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
		  Kembali ke kasus
		</a>
		<div class="clearfix"></div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="{{route('kasus.show', $kasus->kasus_id)}}">Kasus #{{$kasus->kasus_id or 'Unknown'}}</a>
		</div>
		
		<table class="table table-hover table-responsive">
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
								Changed <strong>{{$item->attribute_name}}</strong> from <em>
								{!!(strlen($item->old_attribute_value) > 50) ? 
									'<br />'.substr($item->old_attribute_value, 0, 50).'...' : $item->old_attribute_value;!!}
								</em> to <strong>
								{!!(strlen($item->new_attribute_value) > 50) ? 
									'<br />'.substr($item->new_attribute_value, 0, 50).'...' : $item->new_attribute_value;!!}
								</strong>
							@endif
						</td>
						<td>{{ $item->created_at }}</td>
					</tr>
				
				@empty
					<div class="panel-body">
						<p>No changes logged.</p>
					</div>
				
				@endforelse
				
			@endif
		
		</table>

	<div class="panel-body">
		<a class="btn btn-default pull-right" aria-label="Left Align" href="{{route('kasus.show', $kasus->kasus_id)}}">
		  <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
		  Kembali ke kasus
		</a>
		<div class="clearfix"></div>
	</div>

	</div>

@endsection
