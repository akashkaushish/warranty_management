<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>{{ config('app.name', 'Laravel') }}</title>
<meta content="" name="description">
<meta content="" name="keywords">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<!-- CSS only -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<!-- ======= header ======= -->
<header class="header fixed-top">
  <nav class="navbar navbar-expand-sm navbar-dark">
    <div class="container-fluid">
      <div class="site_logo"><a class="navbar-brand" href="{{ url('/') }}"><img src=" {{ asset('images/logo.png') }}" alt=""></a></div>
      <div class="header_right d-flex">
        <div class="user_login dropdown"> <span class="user_icon">
     
          <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> </li>
            @endif
            
            @if (Route::has('register'))
            <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> </li>
            @endif
            @else
            <li class="nav-item dropdown"> <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
<!--main part-->
<main id="main" class="main_container">
  <div class="container-fluid">
    <div class="flex_container">
     
      <section class="site_content">
        <div class="dashboard_block_container"> @yield('content') </div>
        <!--dashboard_block_container-->
      </section>
      <!--site_content-->
    </div>
    <!--flex_container-->
    <!-- block content end -->
  </div>
  <!--container-fluid-->
</main>
<!--end main part-->
<footer class="footer">
  <div class="container-fluid">
    <div class="footer_bottom">Copyright © 1996 - 2022 panamemory. All rights reserved. | <a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a></div>
  </div>
</footer>
<!-- End Footer -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
<style>.site_content{ width:100%; padding:100px 0px;}.flex_container{min-height:550px;}</style>
