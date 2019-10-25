<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Technological project - System | Dashboard
  </title>
  <link href="{{ asset('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="{{ asset('assets/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
</head>
<body>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand pt-0" href="{{route('home')}}">
        <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img">
      </a>
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img src="{{ asset('assets/img/theme/team-1-800x800.jpg') }}">
              </span>
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
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ route('home') }}">
                <img src="{{ asset('assets/img/brand/blue.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation  telefono-->

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('home') || Request::is('home/create')  ? 'active' : '' }}" href="{{ route('home') }}">
              <img src="{{ asset('assets/img/svg/home.svg') }}" width="18px" class="mr-3">
              Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('bill') || Request::is('bill/create')  ? 'active' : '' }}" href="{{ route('bill') }}">
              <i class="ni ni-folder-17 text-primary"></i>
              Facturas
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ Request::is('client') || Request::is('client/create') ? 'active' : '' }}" href="{{ route('client') }}">
              <img src="{{ asset('assets/img/svg/client.svg') }}" width="18px" class="mr-3">
              Clientes
            </a>
          </li>
        </ul>

        {{-- admin --}}
        @if(Auth::user()->rol_user == 'admin' || Auth::user()->rol_user == 'administrativy')
        <hr class="my-3">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('store') || Request::is('store/create') ? 'active' : '' }}" href="{{ route('store') }}">
              <img src="{{ asset('assets/img/svg/store.svg') }}" width="18px" class="mr-3">
              Tiendas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('product') || Request::is('product/create') ? 'active' : '' }}" href="{{ route('product') }}">
              <img src="{{ asset('assets/img/svg/layers-3_primary.svg') }}" width="18px" class="mr-3">
              Productos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('employee') || Request::is('employee/create') ? 'active' : '' }}" href="{{ route('employee') }}">
              <img src="{{ asset('assets/img/svg/seller.svg') }}" width="18px" class="mr-3">
              Empleados
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('provider') || Request::is('provider/create') ? 'active' : '' }}" href="{{ route('provider') }}">
              <img src="{{ asset('assets/img/svg/seller.svg') }}" width="18px" class="mr-3">
              Proveedores
            </a>
          </li>
        </ul>
        @endif

      </div>
    </div>
  </nav>
  <div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">
          @if(Session::has('store'))
            {{
              strtoupper(Session::get('store')[0]->name)
            }}
          @endif
        </a>
        <!-- Form de buscar -->
        {{-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Buscar" type="text">
            </div>
          </div>
        </form> --}}
        <!-- User -->
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
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
       <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          {{-- <div class="row">
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                      <span class="h2 font-weight-bold mb-0">350,897</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                      <span class="h2 font-weight-bold mb-0">2,356</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
    <div class="container-fluid mt--8">
      @yield('content')
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