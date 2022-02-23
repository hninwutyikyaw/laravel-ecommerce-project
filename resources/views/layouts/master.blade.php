<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/now-ui-dashboard.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">
  
</head>

<body class="">
  <div class="wrapper ">
     
    <div class="sidebar" data-color="black"><!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
         E-shop
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ 'dashboard' == request()->path() ? 'active' : ''  }}">
            <a href="/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ 'role-register' == request()->path() ? 'active' : ''  }}">
            <a href="./role-register">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="{{ 'category' == request()->path() ? 'active' : ''  }}">
            <a href="/category">
              <i class="fas fa-list-ul"></i>
              <p>Categories</p>
            </a>
          </li> 
          <li class="{{ 'product' == request()->path() ? 'active' : ''  }}">
            <a href="/product">
              <i class="fas fa-list-ul"></i>
              <p>List Products</p>
            </a>
          </li>
          <li class="{{ 'brand' == request()->path() ? 'active' : ''  }}">
            <a href="/brand">
              <i class="fas fa-list-ul"></i>
              <p>List Brands</p>
            </a>
          </li>
          <li class="{{ 'order' == request()->path() ? 'active' : ''  }}">
            <a href="/adminorder">
            @php
            $count = App\Order::all()->count();
            @endphp
                <i class="fas fa-shopping-bag"></i>
                All Orders 
              
            </a>
          </li>
          <li class="{{ 'inventory' == request()->path() ? 'active' : ''  }}">
            <a href="/inventory">
              <i class="fas fa-list-ul"></i>
              <p>All Stocks</p>
            </a>
          </li>    
          <li class="{{ 'inventory_stock' == request()->path() ? 'active' : ''  }}">
            <a href="/inventory_stock">
              <i class="fas fa-list-ul"></i>
              <p>Inventory Stocks</p>
            </a>
          </li>   
          <li class="{{ 'blog' == request()->path() ? 'active' : ''  }}">
            <a href="/blog">
              <i class="fas fa-list-ul"></i>
              <p>Blog</p>
            </a>
          </li>         
         
      </div>
      
    </div>

    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Table List</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

       

      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">  
        {{-- @include('admin.message') --}}
        @yield('content')  
        </div>
             

      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  
  <!--   Core JS Files   -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>

  <script src="{{asset('js/dataTables.min.js')}}"></script>
  
  <script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
 
  <!-- Chart JS -->
  <script src="{{asset('js/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('js/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('js/now-ui-dashboard.min.js')}}" type="text/javascript"></script>
  
  
 
  @yield('scripts')

</body>

</html>