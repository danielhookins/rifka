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
				<option value="supportGroup">Support Group</option>
				<option value="mediasi">Mediasi</option>
				<option value="mens_program">Men's Program</option>
				<option value="rujukan">Rujukan</option>
			</select> 
			<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
		</div>
	
  	{!! Form::close() !!}
	
  </div>


  <? // If Service information exists display the relevant partial ?>
	@if(!empty($kasus->konsPsikologi->toArray()))
		@include('kasus.partials.kons_psikologi')
	@endif
	@if(!empty($kasus->konsHukum->toArray()))
		@include('kasus.partials.kons_hukum')
	@endif
	@if(!empty($kasus->homevisit->toArray()))
		@include('kasus.partials.homevisit')
	@endif
  @if(!empty($kasus->medis->toArray()))
    @include('kasus.partials.medis')
  @endif
  @if(!empty($kasus->shelter->toArray()))
    @include('kasus.partials.shelter')
  @endif
	@if(!empty($kasus->supportGroup->toArray()))
		@include('kasus.partials.supportGroup')
	@endif
  @if(!empty($kasus->mediasi->toArray()))
    @include('kasus.partials.mediasi')
  @endif
	@if(!empty($kasus->mensProgram->toArray()))
		@include('kasus.partials.mens_program')
	@endif
	@if(!empty($kasus->rujukan->toArray()))
		@include('kasus.partials.rujukan')
	@endif
  

  <? // Show the relevant 'new x' modal based on the user input ?>
	@if(Session::has('kons_psikologi-baru'))
  	@include('kasus.partials.kons_psikologi-baru')
  @elseif(Session::has('kons_hukum-baru'))
  	@include('kasus.partials.kons_hukum-baru')
  @elseif(Session::has('homevisit-baru'))
  	@include('kasus.partials.homevisit-baru')
  @elseif(Session::has('medis-baru'))
  	@include('kasus.partials.medis-baru')
  @elseif(Session::has('shelter-baru'))
    @include('kasus.partials.shelter-baru')
  @elseif(Session::has('supportGroup-baru'))
  	@include('kasus.partials.supportGroup-baru')
  @elseif(Session::has('mediasi-baru'))
  	@include('kasus.partials.mediasi-baru')
  @elseif(Session::has('mens_program-baru'))
  	@include('kasus.partials.mens_program-baru')
  @elseif(Session::has('rujukan-baru'))
  	@include('kasus.partials.rujukan-baru')
	@endif

</div> <!-- / Layanan Diberikan Panel -->

<script type="text/javascript">
  
  // Set variables so JS knows to display the 'new x' modal

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

  @if(Session::has('homevisit-baru'))
    var homevisit_baru = true;
  @else
    var homevisit_baru = false;
  @endif

  @if(Session::has('supportGroup-baru'))
    var supportGroup_baru = true;
  @else
    var supportGroup_baru = false;
  @endif

  @if(Session::has('mens_program-baru'))
    var mens_program_baru = true;
  @else
    var mens_program_baru = false;
  @endif

	@if(Session::has('rujukan-baru'))
    var rujukan_baru = true;
  @else
    var rujukan_baru = false;
  @endif

  @if(Session::has('medis-baru'))
    var medis_baru = true;
  @else
    var medis_baru = false;
  @endif

  @if(Session::has('mediasi-baru'))
    var mediasi_baru = true;
  @else
    var mediasi_baru = false;
  @endif

  @if(Session::has('shelter-baru'))
    var shelter_baru = true;
  @else
    var shelter_baru = false;
  @endif

</script>