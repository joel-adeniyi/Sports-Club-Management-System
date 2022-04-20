<!doctype html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="noindex,nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> Westminster F.C. Management System</title>
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/main/favicon.png') }}">

  <!-- Bootstrap -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <!----css3---->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="{{ asset('icons/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
 
</head>

<body>
  <div class="wrapper">
    <div class="body-overlay"></div>
    <!-- Sidebar  -->
    <nav id="sidebar" class="sidebar-nav">
      <div class="sidebar-header">
        <h3 class="text-center click" id="sidebarCollapse">
          <i class="fa fa-bars d-none  d-lg-inline-block"></i>
          <span class=""></span>
        </h3>
      </div>


      <ul class="list-unstyled components" id="sidebarnav">

        <li class="">
          <a href="{{ url('/') }}" class=""><i class="fa solid fa-house"></i><span>Home</span></a>
        </li>

        
        <li class="dropdown">
        
          <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            
            <i class="fa fa-address-book"></i><span>Registration Setup</span></a>
          <ul class="collapse list-unstyled menu" id="pageSubmenu1" data-parent="#sidebar">
          @if(Auth::user()->role==1)
            <li><a href="{{ route('view.team') }}"> <i class="fa fa-minus"></i> Team Category Setup </a></li>
            <li><a href="{{ route('view.squad') }}"><i class="fa fa-minus"></i>Squad Setup </a></li>
            
            <li><a href="{{ route('view.contract') }}"><i class="fa fa-minus"></i>Contract Type Setup</a></li>
            @endif

          </ul>
        </li>

        <li class="dropdown">
          <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-user"></i><span>Coach Management</span></a>
          <ul class="collapse list-unstyled menu" id="pageSubmenu2" data-parent="#sidebar">
            @if(Auth::user()->role==1)
            <li>
              <a href="{{ route('new.coach') }}"><i class="fa fa-minus"></i>Coach Registration</a>
            </li>
            @endif
            <li>
              <a href="{{ route('view.coach') }}"><i class="fa fa-minus"></i>View Coaches </a>
            </li>


          </ul>
        </li>


        <li class="dropdown">
          <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-male"></i><span>Player Management</span></a>
          <ul class="collapse list-unstyled menu" id="pageSubmenu3" data-parent="#sidebar">
          @if(Auth::user()->role==1) 
            <li>
              <a href="{{ route('new.player') }}"><i class="fa fa-minus"></i>Player Registration </a>
            </li>
            @endif
            <li>
              <a href="{{ route('view.player') }}"><i class="fa fa-minus"></i>View Players</a>
            </li>

          </ul>
        </li>


        <li class="dropdown">
          <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-users"></i><span>Teams</span></a>
          <ul class="collapse list-unstyled menu" id="pageSubmenu4" data-parent="#sidebar">

            <li>
              <a href="{{ route('alliance.create') }}"><i class="fa fa-minus"></i>Create Team </a>
            </li>

            <li>
              <a href="{{ route('alliance.index') }}"><i class="fa fa-minus"></i>View Teams </a>
            </li>

          </ul>
        </li>

        <li class="dropdown">
          <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-globe"></i><span>Fixtures</span></a>
          <ul class="collapse list-unstyled menu" id="pageSubmenu5" data-parent="#sidebar">

            <li>
              <a href="{{ route('fixture.create') }}"><i class="fa fa-minus"></i>Add Fixture </a>
            </li>

            <li>
              <a href="{{ route('fixture.index') }}"><i class="fa fa-minus"></i>View Fixtures </a>
            </li>

          </ul>
        </li>

        <li class="dropdown">
          <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa-solid fa-chart-simple"></i><span>Generate Reports</span></a>
          <ul class="collapse list-unstyled menu" id="pageSubmenu6" data-parent="#sidebar">

            <li>
              <a href="{{ route('generate.statistic') }}"><i class="fa fa-minus"></i>Statistical Reports </a>
            </li>



          </ul>
        </li>



      </ul>
    </nav>



    <!-- Page Content  -->
    <div id="content">

      <div class="top-navbar">
        <nav class="navbar  ">
          <div class="container-fluid d-flex justify-content-between">
            <div>
              <span class="d-inline-block d-lg-none ml-auto menu-button click">
                <i class="fa fa-bars "></i>
              </span>

              <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('images/main/logo-text.png') }}" alt="logo" class="dark-logo">

                <span class="logo-part">
                  <img src="{{ asset('images/main/logo-icon.png') }}" alt="logo" class="dark-logo">
              </a>



            </div>

            <div>




              <div class="btn-group me-3 ">
                <span class=" d-flex align-items-center click" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="d-none  d-sm-inline-block me-2">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} </span>
                  
                </span>
                <ul class="dropdown-menu dropdown-menu-end menu-dropdown">
                  <li><a href="{{ route('change.pass') }}" class="dropdown-item" href="#">Change Password</a></li>
                  <li><a onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" class="dropdown-item" href="#">{{ __('Logout') }}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>


      <div class="main-content container-fluid p-4">
        @yield('content')
      </div>
      <footer class="footer">
        <div class="container">
          <p class="text-center "><small>Westminster F.C. Management System</small></p>
        </div>
      </footer>
    </div>
  </div>

  <!-- JavaScript -->

  <script src="https://kit.fontawesome.com/4dceba3fac.js" crossorigin="anonymous"></script>
  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <!--Menu sidebar -->
  <script src="{{ asset('js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
      });

      $('.menu-button,.body-overlay').on('click', function() {
        $('#sidebar,.body-overlay').toggleClass('show-nav');
      });

  

    });

    
  </script>
</body>

</html>