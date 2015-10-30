<div class="row legroom">
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
			<button class="btn btn-default" type="submit">Update</button>
		</h3>
	{!! Form::close() !!}

	<table class="table table-condensed table-hover">
		<tr>
			<th>Jenis</th>
			<th>Berapa</th>
		</tr>
		@foreach ($countArray as $key => $value)
		<tr>
			<td>{{ $key }}</td>
			<td>{{ $value }}</td>
		</tr>
		@endforeach
	</table>
</div> <!-- /col -->

<div class="col-sm-6 legroom">
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
	      title: "{{ $title }}",
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

<div class="row">
	<div class="col-sm-12">
	{!! Form::open(array('route' => array('kasusOlehJenis.xls'),
			'class'=>'form form-inline well', 'method' => 'POST')) !!}
			<h3>Expor data jenis kasus ke Excel</h3>
			<label for="mulai">Tahun Mulai</label>
			<input class="form-control" name="mulai" placeholder="Tahun Mulai" />
			<label for="sampai">Tahun Sampai</label>
			<input class="form-control" name="sampai" placeholder="Tahun Sampai" />
			<button type="submit">
				<span class="glyphicon glyphicon-download" aria-hidden="true"></span>
				Download
			</button>
		{!! Form::close() !!}
	</div>
</div>