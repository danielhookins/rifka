@include('layouts.partials.header')

<div class="row">
	@yield('content')
</div>

<div class="row" style="margin-top:60px">
	<a href="#" class="btn btn-info back-to-top" aria-label="Left Align">
	  <span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span><br />
	  Kembali ke atas
	</a>
</div>

@include('layouts.partials.footer')