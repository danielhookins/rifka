<div class="row">
<div class="col-sm-6">
	
	{!! Form::open(array('route' => array('laporan.kabupaten.update'), 
	        'class'=>'form','method' => 'POST')) !!}
		<h3>
			{{ $title }}
			<button class="btn btn-default" type="submit" name="change" value="prev">
				<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
			</button>
			<input style="width:70px;text-align:center" autocomplete="off" id="year" name="year" value="{{ $year }}">
			<button class="btn btn-default" @if($year == Carbon\Carbon::today()->format('Y')) disabled @endif type="submit" name="change" value="next">
				<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
			</button>
			<button class="btn btn-default" type="submit">Update</button>
		</h3>
	{!! Form::close() !!}

	<table class="table table-condensed table-hover">
		<tr>
			<th>Kabupaten</th>
			<th>Jumlah</th>
		</tr>
		@foreach ($countArray as $key => $value)
		<tr>
			<td>{{ $key }}</td>
			<td>{{ $value }}</td>
		</tr>
		@endforeach
	</table>
</div> <!-- /col -->

<div class="col-sm-6">
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
	  google.load("visualization", "1", {packages:["corechart"]});
	  google.setOnLoadCallback(drawChart);
	  function drawChart() {
	    var data = google.visualization.arrayToDataTable([
	      ["Jenis Kasus", "Jumlah Kasus", { role: "style" } ],
	      @foreach ($countArray as $key => $value)
	      ["{{ $key }}", {{ $value }}, "color: #55aaaa"],
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
	      title: "Jumlah Kasus Untuk Kabupaten",
	      width: 500,
	      height: 400,
	      bar: {groupWidth: "95%"},
	      legend: { position: "none" },
	      chartArea: {'width': '65%', 'height': '80%'},
	      hAxis: {textPosition: "none"},
	    };
	    var chart = new google.visualization.BarChart(document.getElementById("barchart"));
	    chart.draw(view, options);
	}
	</script>
	<div id="barchart" style="width:900px;height:300px;margin-top:40px"></div>

</div> <!-- /col -->

</div> <!-- /row -->