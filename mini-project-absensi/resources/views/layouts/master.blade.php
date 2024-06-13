<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<!-- <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> -->
<body class="hold-transition dark-mode sidebar-mini layout-fixed">
<div class="wrapper">

@include('partials.navbar')
@include('partials.sidebar')
@yield('content')
@include('partials.footer')

@include('partials.script')
</div>
</body>
</html>