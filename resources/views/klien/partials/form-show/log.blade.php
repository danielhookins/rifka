<div class="panel panel-info"> <!-- Log Panel -->
	<div class="panel-heading"><a class="in-link" name="change-log">Change Log</a></div>
	<table class="table">
			@if(isset($log))
				<th>User</th>
				<th>Action</th>
				<th>Date</th>

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
</div> <!-- /Log Panel -->