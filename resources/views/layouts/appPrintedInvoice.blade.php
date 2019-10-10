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