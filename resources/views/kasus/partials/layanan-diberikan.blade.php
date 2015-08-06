<div class="panel panel-default">
	
	<div class="panel-heading">
		<h4 class="panel-title">
			<a class="in-link" name="layanan-diberikan">Layanan Diberikan</a>
		</h4>
	</div>

	<div class="panel-body">
		{!! Form::open(array('route' => array('kasus.layananDiberikan.create', $kasus->kasus_id), 'class'=>'form', 'method' => 'GET')) !!}

		<div class="form-inline">
		Tambah Layanan Debierikan 
			<select class="form-control" name="jenis">
				<option value="jenis">Jenis</option>
				<option value="kons_psikologi">Konseling Psikologi</option>
				<option value="kons_hukum">Konseling Hukum</option>
				<option value="homevisit">Homevisit</option>
				<option value="medis">Medis</option>
				<option value="shelter">Shelter</option>
				<option value="support_group">Support Group</option>
				<option value="mediasi">Mediasi</option>
				<option value="mens_program">Men's Program</option>
				<option value="rujukan">Rujukan</option>
			</select> 
			<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
		</div>
		{!! Form::close() !!}
	</div>

	@if(!empty($kasus->konsPsikologi->toArray()))
		@include('kasus.partials.kons_psikologi')
	@endif



	@if(Session::has('kons_psikologi-baru'))
  	@include('kasus.partials.kons_psikologi-baru')

  @elseif(Session::has('kons_hukum-baru'))

  @elseif(Session::has('homevisit-baru'))

  @elseif(Session::has('medis-baru'))

  @elseif(Session::has('shelter-baru'))

  @elseif(Session::has('support_group-baru'))

  @elseif(Session::has('mediasi-baru'))

  @elseif(Session::has('mens_program-baru'))

  @elseif(Session::has('rujukan-baru'))

	@endif

</div> <!-- / Layanan Diberikan Panel -->

<script type="text/javascript">
  @if(Session::has('kons_psikologi-baru'))
     var kons_psikologi_baru = true;
  @else
     var kons_psikologi_baru = false;
  @endif

  @if(Session::has('kons_hukum-baru'))
     var kons_hukum_baru = true;
  @else
     var kons_hukum_baru = false;
  @endif

</script>