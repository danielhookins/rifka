@include('layouts.partials.header')

<div class="col-md-2 col-sm-3">
	@yield('menu')
</div>

<div class="col-md-10 col-sm-9">
	@yield('content')
</div>

@include('layouts.partials.footer')