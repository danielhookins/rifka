@extends('layouts.records')

@section('content')

<h2>{{$user->name}}</h2>

<h3>Log</h3>

<table class="table table-hover">
	<th>Action</th>
	<th>Date</th>	

	@if(isset($log))
		
		@forelse ($log as $item)
			<tr>
				<td>
					
					@if(isset($item->action))
						<strong>{{$item->action}} </strong> 
						@if(isset($item->klien_id))
							#<em>{{$item->klien_id}}</em><br />
						@endif
						
						@if(isset($item->kasus_id))
							@if($item->action == "Removed client")
								from Case #<em>{{$item->kasus_id}}</em><br />
							@else
								#<em>{{$item->kasus_id}}</em><br />
							@endif
						@endif
					
					@endif
					
					@if(isset($item->attribute_name))
						@if(isset($item->klien_id))
							<strong>Edited Client</strong> #<em>{{$item->klien_id}}</em>:<br />
						@endif

						@if(isset($item->kasus_id))
							<strong>Edited Case</strong> #<em>{{$item->kasus_id}}</em>:<br />
						@endif
						
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
				<p>No activity logged.</p>
			</div>
		
		@endforelse
		
	@endif

</table>

@endsection