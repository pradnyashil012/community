
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin')}}/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  @yield('style')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{asset('admin')}}/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin')}}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User">
        </div>
        <div class="info">
          <a href="{{ route('user.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item mt-auto">
            <a href="{{ route('category.index') }}" class="nav-link {{ (request()->is('admin/category*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Categories
              </p>
            </a>          
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('tag.index') }}" class="nav-link {{ (request()->is('admin/tag*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Tags
              </p>
            </a>          
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('post.index') }}" class="nav-link {{ (request()->is('admin/post*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-pen-square"></i>
              <p>
                Posts
              </p>
            </a>          
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('admin/user*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>          
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('contact.index') }}" class="nav-link {{ (request()->is('admin/contact*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Messages
              </p>
            </a>          
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('questions.index') }}" class="nav-link {{ (request()->is('admin/questions*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Questions
              </p>
            </a>          
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('searches.index') }}" class="nav-link {{ (request()->is('admin/searches*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Searches
              </p>
            </a>          
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('setting.edit') }}" class="nav-link {{ (request()->is('admin/setting*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
              </p>
            </a>          
          </li>
          <li class="nav-header">Your Account</li>
          <li class="nav-item mt-auto">
            <a href="{{ route('user.profile') }}" class="nav-link {{ (request()->is('admin/user*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Your Profile
              </p>
            </a>          
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
            class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>          
          </li>
          <li class="text-center mt-2">
            <a href="{{ route('website') }}" target="_blank" class="btn btn-primary">
              <p class="mb-0">
                View Website
              </p>
            </a>          
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin')}}/js/adminlte.min.js"></script>
<script src="{{asset('admin')}}/js/bs-custom-file-input.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@yield('script')

<script>
@if(Session::has('success'))
toastr.success("{{ Session::get('success') }}");
@endif
$(document).ready(function () {
  bsCustomFileInput.init()
})
</script>
</body>
</html>
