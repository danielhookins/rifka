<div class="row">
<div class="col-sm-12">
	
	<h3>Ikhtisar</h3>

	<h4>Kasus Baru</h4>
	<ul>
		<li>
			This year ({{ $overview["thisYear"] }}) there have been <strong>{{ $overview["casesThisYear"] }} cases.</strong>
		</li>
		<li>
			Last year ({{ ($overview["thisYear"] - 1) }}) there were <strong>{{ $overview["casesLastYear"] }} cases.</strong>
		</li>
		<li>
			This Month ({{ $overview["thisMonth"] }}) there have been <strong>{{ $overview["casesThisMonth"] }} cases.</strong>
		</li>
		<li>
			This Month Last year ({{ $overview["thisMonth"]."-".($overview["thisYear"] - 1) }}) there were <strong>{{ $overview["casesThisMonthLastYear"] }} cases.</strong>
		</li>
		<li>
			Lihat <a href="{{ route('laporan.tahun.list') }}">Daftar Kasus</a> untuk tahun ini.
		</li>
	</ul>

	<h5>Distribution of cases over a year</h5>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
	  google.load("visualization", "1", {packages:["corechart"]});
	  google.setOnLoadCallback(drawChart);
	  function drawChart() {
	    var data = google.visualization.arrayToDataTable([
	      ["Bulan", "Jumlah Kasus", { role: "style" } ],
	      @foreach ($overview["casesByMonth"] as $key => $value)
	      ["{{ $overview['month'][$key] }}", {{ $value }}, "color: #55aaaa"],
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
	      title: "Kasus untuk tahun ini",
	      width: 900,
	      height: 300,
	      bar: {groupWidth: "95%"},
	      legend: {position: "none" },
	      chartArea: {'width': '100%', 'height': '75%'},
	      vAxis: {textPosition: "none"},
	    };
	    var chart = new google.visualization.ColumnChart(document.getElementById("colchart"));
	    chart.draw(view, options);
	}
	</script>
	<div id="colchart" style="display:inline;width:900px;height:300px;margin-top:40px"></div>
	<p>Lihat laporan <a href="{{ route('laporan.kasusPerBulan') }}">Kasus Per Bulan</a></p>

	<h4>Klien Baru</h4>
		<ul>
			<li>
				There have been <strong>{{ $overview["clientsThisYear"] }} new clients</strong> this year.
			</li>
			<li>
				Last year there were <strong>{{ $overview["clientsLastYear"] }} new clients.</strong>
			</li>
		</ul>	
	
	<h5>Survivor case types for this year:</h5>
	<ul>
		@forelse ($overview["survivorJenisKasus"] as $key => $value)
			<li><strong>{{ $key }}: </strong>{{ $value }}</li>
		@empty
			<li>Belum ada data.</li>
		@endforelse
	</ul>
	<p>Lihat <a href="{{route('laporan.jenis-kasus')}}">Laporan Jenis Kasus</a></p>

</div> <!-- /col -->
</div> <!-- /row -->