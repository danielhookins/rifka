<h3>Jenis Kasus {{ $year }}</h3>

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