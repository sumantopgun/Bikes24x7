<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bikes24x7 | @yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin_template/node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_template/node_modules/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_template/node_modules/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_template/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('admin_template/node_modules/font-awesome/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{ asset('admin_template/node_modules/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
  
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin_template/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('logo/favicon.png')}}" />
  @stack('style')
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('workshop_main.workshop')}}"><img src="{{ asset('logo/logo.png')}}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{route('workshop_main.workshop')}}"><img src="{{ asset('logo/mini_logo.png')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        {{-- <ul class="navbar-nav">
          <li class="nav-item dropdown d-none d-lg-flex">
            <a class="nav-link dropdown-toggle nav-btn" id="actionDropdown" href="#" data-toggle="dropdown">
              <span class="btn">+ Create new</span>
            </a>
            <div class="dropdown-menu navbar-dropdown dropdown-left" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="#">
                <i class="icon-user text-primary"></i>
                User Account
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="icon-user-following text-warning"></i>
                Admin User
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="icon-docs text-success"></i>
                Sales report
              </a>
            </div>
          </li>
        </ul> --}}
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
              
              My Profile
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
              <a class="dropdown-item font-weight-medium" href="{{ route('workshop_main.profileupdate')}}">
                Edit profile
              </a>
              {{-- <div class="dropdown-divider"></div>
              <a class="dropdown-item font-weight-medium" href="#">
                <i class="flag-icon flag-icon-es"></i>
                Change Password
              </a> --}}
              <div class="dropdown-divider"></div>
              <a class="dropdown-item font-weight-medium" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                {{-- <i class="flag-icon flag-icon-lt"></i> --}}
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles primary"></div>
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles pink"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default"></div>
            </div>
          </div>
        </div>
        
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <div class="nav-link">
                <div class="profile-image">
                  <img src="@if(Auth::user()->user_profile_pic==null){{asset('storage/profiles/dummy.jpg')}}@else{{asset('storage/'.Auth::user()->user_profile_pic)}}@endif" alt="image"/>
                  <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
                </div>
                <div class="profile-name">
                  <p class="name">
                    {{ Auth::user()->user_first_name.' '.Auth::user()->user_last_name }}
                  </p>
                  <p class="designation">
                    City Admin
                  </p>
                </div>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('workshop_main.workshop')}}">
                <i class="icon-rocket menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                {{-- <span class="badge badge-success">New</span> --}}
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#user-layouts" aria-expanded="false" aria-controls="user-layouts">
                <i class="fa fa-user-o menu-icon"></i>
                <span class="menu-title">Assigned List</span>
                {{-- <span class="badge badge-warning">4</span> --}}
              </a>

              <div class="collapse" id="user-layouts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('workshop_main.categories.index') }}">Bike Brands</a></li>                
                  <li class="nav-item"><a class="nav-link" href="{{ route('workshop_main.models.index') }}">Make</a></li>                    
                  {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('workshop_main.bike-assigned.index') }}">Bike Assigned List</a></li> --}}
                  {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('workshop_main.bike_works') }}">Bike Working List</a></li> --}}
                  <li class="nav-item"> <a class="nav-link" href="{{ route('workshop_main.works_done') }}">Bike Work Done List</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('workshop_main.bike_repaired') }}">Bike Repaired List</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('workshop_main.sale.index')}}">
                <i class="icon-flag menu-icon"></i>
                <span class="menu-title">Bike Entry for Selling</span>
                {{-- <span class="badge badge-success">New</span> --}}
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('workshop_main.offers.index')}}">
                <i class="icon-flag menu-icon"></i>
                <span class="menu-title">Create offers </span>
                {{-- <span class="badge badge-success">New</span> --}}
              </a>
            </li>
          
            
          </ul>
        </nav>
        <!-- partial -->
        @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a href="http://aetostechnologies.in/">Aetos Technologies</a>. All rights reserved.</span>
            
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('admin_template/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('admin_template/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{ asset('admin_template/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('admin_template/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('admin_template/node_modules/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
  <script src="{{ asset('admin_template/node_modules/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{ asset('admin_template/node_modules/raphael/raphael.min.js')}}"></script>
  <script src="{{ asset('admin_template/node_modules/morris.js/morris.min.js')}}"></script>
  <script src="{{ asset('admin_template/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('admin_template/js/off-canvas.js')}}"></script>
  <script src="{{ asset('admin_template/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('admin_template/js/misc.js')}}"></script>
  <script src="{{ asset('admin_template/js/settings.js')}}"></script>
  <script src="{{ asset('admin_template/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('admin_template/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
  
  @stack('scripts')

  <script>
    $('#orderlisting').dataTable({
      "paging": false
    });
  </script>
</body>

</html>
