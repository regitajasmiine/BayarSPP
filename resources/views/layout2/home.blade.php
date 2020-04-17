<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="">
	@include('layout2/link')
</head>
<body>
	<body class="hold-transition layout-fixed header-collapse sidebar-collapse ">
  
  <div class="content mt-3">
    @include('layout2/header')
    <div class="">
      @yield('konten2')
    </div>

     @include('layout2/footer')
   </div>
	@include('layout2/scripts')

</body>
</html>