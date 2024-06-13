
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">

  <!-- <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light"> -->

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('template')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
            width="60">
    </div>
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('dashboard')}}" class="nav-link">Dashbord</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/logout" class="nav-link">Logout</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Fullscreen -->
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <!-- /Navbar Fullscreen-->
        </ul>
    </nav>
    <!-- /.navbar -->