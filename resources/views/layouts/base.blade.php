<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('tempo/img/favicon.png')}}" rel="icon">
  <link href="{{asset('tempo/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('tempo/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('tempo/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('tempo/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('tempo/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('tempo/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('tempo/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('tempo/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Tempo - v2.2.0
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    @include('tempoparts.navbar')
    
  </header><!-- End Header -->
  
  <!-- End #main -->
 @yield('content')
  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('tempo/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('tempo/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('tempo/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('tempo/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('tempo/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('tempo/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('tempo/vendor/owl.carousel/owl.carousel.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('tempo/js/main.js')}}"></script>

</body>

</html>