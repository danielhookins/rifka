<div class="row">
<div class="col-sm-6">
	
	{!! Form::open(array('route' => array('laporan.jenis-kasus.update'), 
	        'class'=>'form','method' => 'POST')) !!}
		<h3>
			Jenis Kasus 
			<button class="btn btn-default" type="submit" name="change" value="prev">
				<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
			</button>
			<input style="width:70px;text-align:center" autocomplete="off" id="year" name="year" value="{{ $year }}">
			<button class="btn btn-default" @if($year == Carbon\Carbon::today()->format('Y')) disabled @endif type="submit" name="change" value="next">
				<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
			</button>
		</h3>
		<div class="form-group">
			<button type="submit">Update</button>
		</div>
	{!! Form::close() !!}

	<table class="table table-condensed table-hover">
		<tr>
			<th>Jenis</th>
			<th>Berapa</th>
		</tr>
		<tr>
			<td>KTI</td>
			<td>{{ $countArray["KTI"] }}</td>
		</tr>
		<tr>
	    <td>KDP</td>
			<td>{{ $countArray["KDP"] }}</td>
		</tr>
		<tr>
	    <td>Perkosaan</td>
			<td>{{ $countArray["Perkosaan"] }}</td>
		</tr>
		<tr>
	    <td>Pel-Seks</td>
			<td>{{ $countArray["Pel-Seks"] }}</td>
		</tr>
		<tr>
	    <td>KDK</td>
			<td>{{ $countArray["KDK"] }}</td>
		</tr>
		<tr>
	   	<td>Lain</td>
			<td>{{ $countArray["Lain"] }}</td>
		</tr>
	</table>
</div> <!-- /col -->

<div class="col-sm-6">
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
	  google.load("visualization", "1", {packages:["corechart"]});
	  google.setOnLoadCallback(drawChart);
	  function drawChart() {
	    var data = google.visualization.arrayToDataTable([
	      ["Jenis Kasus", "Jumlah", { role: "style" } ],
	      ["KTI", {{ $countArray['KTI'] }}, "#b87333"],
	      ["KDP", {{ $countArray['KDP'] }}, "silver"],
	      ["Perkosaan", {{ $countArray['Perkosaan'] }}, "gold"],
	      ["Pel-Seks", {{ $countArray['Pel-Seks'] }}, "color: #e5e4e2"],
	      ["KDK", {{ $countArray['KDK'] }}, "blue"],
	      ["Lain", {{ $countArray["Lain"] }}, "grey"]
	    ]);

	    var view = new google.visualization.DataView(data);
	    view.setColumns([0, 1,
	                     { calc: "stringify",
	                       sourceColumn: 1,
	                       type: "string",
	                       role: "annotation" },
	                     2]);

	    var options = {
	      title: "{{ $title }}",
	      width: 500,
	      height: 300,
	      bar: {groupWidth: "95%"},
	      legend: { position: "none" },
	      chartArea: {'width': '70%', 'height': '80%'}
	    };
	    var chart = new google.visualization.BarChart(document.getElementById("barchart"));
	    chart.draw(view, options);
	}
	</script>
	<div id="barchart" style="width:900px;height:300px;margin-top:40px"></div>

</div> <!-- /col -->

</div> <!-- /row -->