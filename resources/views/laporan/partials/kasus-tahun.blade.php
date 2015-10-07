<div class="row">	
	<div class="col-sm-4">
	{!! Form::open(array('route' => array('laporan.kasusTahun.update'), 
	        'class'=>'form','method' => 'POST')) !!}
		<h3>
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
			<th>Bulan</th>
			<th>Jumlah Kasus</th>
		</tr>
		@foreach ($countArray as $key => $value)
		<tr>
			<td>{{ $month[$key] }}</td>
			<td>{{ $value }}</td>
		</tr>
		@endforeach
	</table>
	</div>

	<div class="col-sm-8">
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
	  google.load("visualization", "1", {packages:["corechart"]});
	  google.setOnLoadCallback(drawChart);
	  function drawChart() {
	    var data = google.visualization.arrayToDataTable([
	      ["Bulan", "Jumlah Kasus", { role: "style" } ],
	      @foreach ($countArray as $key => $value)
	      ["{{ $month[$key] }}", {{ $value }}, "color: #55aaaa"],
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
	      title: "Jumlah kasus per bulan",
	      width: 600,
	      height: 300,
	      bar: {groupWidth: "95%"},
	      legend: { position: "none" },
	      chartArea: {'width': '100%', 'height': '80%'},
	      vAxis: {textPosition: "none"},
	    };
	    var chart = new google.visualization.ColumnChart(document.getElementById("colchart"));
	    chart.draw(view, options);
	}
	</script>
	<div id="colchart" style="width:900px;height:300px;margin-top:40px"></div>
	</div>
</div> <!-- /row -->