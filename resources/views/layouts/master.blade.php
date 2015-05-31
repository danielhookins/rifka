@include('layouts.partials.header')
  <div class="row">

    <div class="col-sm-10 main-content">
    	@yield('content')
    </div> <!-- /main-content -->

    <div class="col-sm-2 side-nav">
      @yield('nav')
    </div> <!-- /side-nav -->

  </div><!-- /row -->
@include('layouts.partials.footer')