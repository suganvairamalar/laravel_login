<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title') | Hexamarvel</title> 
    <meta name="description" content="@yield('meta_description')">  
    <meta name="keywords" content="@yield('meta_keyword')">  
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">  
     
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
   
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/css/mdb.min.css')}}">      
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    
  </head>
  <body>
    <!-- Start your project here-->
    @include('layouts.inc.front-navbar')
    <main>
      @yield('content')
    </main>
 
    <!-- End your project here-->
    
     <!-- scripts -->
    <!-- jQuery -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('assets/js/mdb.min.js')}}"></script>

    
    @yield('script')
  </body>
</html>
