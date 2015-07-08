<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Kasus #{{$kasus->kasus_id}}</h3>
	</div>
	<div class="panel-body">
		<div class="row">

			<div class="col-sm-4">
				
			</div>


			
			<div class="col-sm-4">
				<div class="well">
					<p style="text-align:center">
						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Options</strong>
					</p>
					<ul style="margin-left:-22px;">
						<li>
							<a href="{{route('kasus.edit', $kasus->kasus_id)}}">Mengedit Kasus</a>
						</li>
						<li>
							<a href="{{route('kasus.changes', $kasus->kasus_id)}}">Melihat Perubuhan</a>
						</li>
						<li>
							<a href="{{route('kasus.delete', $kasus->kasus_id)}}" style="color:red">Menghapus Kasus</a>
						</li>
					</ul>
				</div> <!-- /well -->	
			</div>

		</div> <!-- /Row -->
	</div> <!-- /Panel Body -->
</div> <!-- /Panel Primary -->