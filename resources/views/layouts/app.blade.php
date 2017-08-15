<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ATM BERAS</title>

    <!-- Styles -->
    <!-- Bootstrap -->
    <link href="{{ asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('gentelella/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="{{ ('gentelella/production/css/maps/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet"/>

    <!-- Custom styling plus plugins -->
    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body class="nav-md">
    <body class="nav-md">
      <div class="container body">
        <div class="main_container">
          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href="index.html" class="site_title"><i class="fa fa-credit-card"></i> <span>ATM BERAS</span></a>
              </div>

              <div class="clearfix"></div>

              <br />

              <!-- sidebar menu -->
              @include('layouts.sidebar-menu')
              <!-- /sidebar menu -->
            </div>
          </div>

          <!-- top navigation -->
          <div class="top_nav">
            <div class="nav_menu">
              <nav class="" role="navigation">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    @if (auth()->check())
                  <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      {{ auth()->user()->name }}
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><a href="/profile"> Profile
                          <i class="fa fa-user pull-right"></i>
                      </a></li>
                      <li>
                        <a href="/setting">
                          Settings
                          <i class="fa fa-gear pull-right"></i>
                        </a>
                      </li>
                      <li>

                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                              <i class="fa fa-sign-out pull-right"></i>
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                    </ul>
                  </li>
                  @endif

                </ul>
              </nav>
            </div>
          </div>
          <!-- /top navigation -->

          <!-- page content -->
          <div class="right_col" role="main">
            @yield('content')
          </div>
          <!-- /page content -->

          <!-- footer content -->
          <footer>
            <div class="pull-right">
              KABUPATEN PURWAKARTA
            </div>
            <div class="clearfix"></div>
          </footer>
          <!-- /footer content -->
        </div>
      </div>

      <!-- jQuery -->
      <script src="{{ asset('gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
      <!-- Bootstrap -->
      <script src="{{ asset('gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
      <!-- FastClick -->
      <script src="{{ asset('gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>

      @stack('scripts')

      <!-- Custom Theme Scripts -->
      <script src="{{ asset('gentelella/build/js/custom.min.js') }}"></script>
    </body>
  </html>
