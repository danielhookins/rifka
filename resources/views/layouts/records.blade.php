<?php if(!isset($user)){$user=Auth::User();} ?>
@include('layouts.partials.header')
  
    @yield('content')

@include('layouts.partials.footer')