@extends('layouts.klien')

@section('content')

	<h2>Laporan</h2>

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

	@if($groupBy != "semua" && $data["rows"]->count() < 10)
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("visualization", "1", {packages:["corechart"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
		    var data = google.visualization.arrayToDataTable([
		      ["{{ $groupBy }}", "Jumlah Kasus", { role: "style" } ],
		      @foreach ($data["rows"] as $row)
		      	["{!! implode(', ', $row->toArray()) !!}", {{ $row['jumlah'] }}, "color: #55aaaa"],
		      @endforeach
		    ]);

		    var view = new google.visualization.DataView(data);
		    view.setColumns([0, 1,
		                     { calc: "stringify",
		                       sourceColumn: 1,
		                       type: "string",
		                       role: "annotation" },
		                     2]);

		    var options = {
		      title: "Chart",
		      bar: {groupWidth: "95%"},
		      legend: { position: "none" },
		      chartArea: {'width': '50%', 'height': '80%'},
		      hAxis: {textPosition: "none"},
		    };
		    var chart = new google.visualization.BarChart(document.getElementById("barchart"));
		    chart.draw(view, options);
		}
		</script>
		<div id="barchart" style="width:900px;height:300px;margin-top:40px"></div>	
	@endif
	

@endsection	