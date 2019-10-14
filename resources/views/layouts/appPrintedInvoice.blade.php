<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Technological project - System | Priented
  </title>
  <link href="{{ asset('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="{{ asset('assets/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
</head>
<body>
  <div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <div class="row">
          <div class="col-5">
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">Inicio</a>
          </div>
          <div class="col-5">
            <a class="h4 mb-0 text-white text-uppercase" href="{{ route('bill') }}">facturas</a>
          </div>
        </div>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img src="{{ asset('assets/img/theme/team-1-800x800.jpg') }}">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ ucwords(Auth::user()->name .' '.Auth::user()->lastname)  }}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Bienvenido!</h6>
            </div>
            <a href="examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>Mi Perfil</span>
            </a>
            <a href="examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Configuracion</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="ni ni-user-run"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

          </div>
          </li>
        </ul>
      </div>
    </nav>
   <div class="main-content">
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
       <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <div class="container-fluid mt--8">
    	{{-- contenido --}}
    	@yield('content')
    	{{-- contenido/ --}}
    	<footer class="footer">
	        <div class="row align-items-center justify-content-xl-between">
	          <div class="col-xl-6">
	            <div class="copyright text-center text-xl-left text-muted">
	              &copy; {{ date('Y') }}
	              <a href="http://www.alexisrhc.com.ve" class="font-weight-bold text-muted ml-1" target="_blank">Nodo's Creative</a>
	            </div>
	          </div>
	          <div class="col-xl-6">
	            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
	              <li class="nav-item">
	                <a href="{{ route('home') }}" class="nav-link">
	                  <img src="{{ asset('assets/img/brand/blue_best_best.png') }}" width="140px">
	                </a>
	              </li>
	            </ul>
	          </div>
	        </div>
	    </footer>
    </div>
  </div>
  <!--   Core   -->
  <script src="{{ asset('assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Optional JS   -->
  <script src="{{ asset('assets/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
  <!--   Argon JS   -->
  <script src="{{ asset('assets/js/argon-dashboard.min.js') }}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
  @yield('script')
</body>