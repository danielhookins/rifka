@include('layouts.partials.header')
  <div class="row">

    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 pull-right">
      @yield('nav')
    </div> <!-- /side-nav -->

    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 pull-left">
    	@yield('content')
    </div> <!-- /main-content -->

  </div><!-- /row -->
@include('layouts.partials.footer')