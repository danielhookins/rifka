<table id="datatable" class="table table-hover table-condensed">
	<thead>
		@foreach($data["selected"] as $header => $name)
			<th>{{ $name }}</th>
		@endforeach
		@if($groupBy != "semua")
			<th>Jumlah</th>
		@endif
	</thead>
	<tbody>
		@foreach($data["rows"] as $row)
			<tr>
				@foreach(array_keys($data["selected"]) as $attribute)
					<td>
						{{ $row[$attribute] }}
					</td>
				@endforeach
				@if($groupBy != "semua")
					<td>{{ $row["jumlah"]}}</td>
				@endif
			</tr>
		@endforeach
	</tbody>
</table>