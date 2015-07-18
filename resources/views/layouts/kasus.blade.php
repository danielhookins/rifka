@include('layouts.partials.header')

<div class="row">
	
	<div class="col-md-2 col-sm-3">
		@yield('menu')
	</div>

	<div class="col-md-10 col-sm-9">
		@yield('content')
	</div>

	<a href="#" class="btn btn-info back-to-top" aria-label="Left Align">
	  <span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span><br />
	  Kembali ke atas
	</a>
</div>

@include('layouts.partials.footer')