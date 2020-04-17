<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="">
	@include('layout/link')
</head>
<body>
	<body class="hold-transition sidebar-mini layout-fixed header-collapse sidebar-fixed control-sidebar-open">
  
  <div class="wrapper">
    @include('layout/header')
    @include('layout/sidebar')
    <div class="content-wrapper">
      @yield('konten')
    </div>

     @include('layout/footer')
   
	@include('layout/scripts')
</body>
</html>