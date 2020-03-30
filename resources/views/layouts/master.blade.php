<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Aplikasi Laundry Ujikom By - Roni Surya">
    <meta name="keywords" content="Aplikasi Laundry">
    <meta name="author" content="JQuin">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laundry - @yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('admin/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/components.min.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/simple-line-icons/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/card-statistics.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/vertical-timeline.min.css')}}">

    @yield('css')
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns  fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
           
    <!-- BEGIN: Header-->
    @include('layouts.includes._navbar')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
      @include('layouts.includes._sidebar')
    <!-- END: Main Menu-->


    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- <div id="app">  -->
                @yield('content')
            <!-- </div> -->
        </div>
      </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Customizer-->
    <!-- Untuk config right -->
    <!-- End: Customizer-->

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">
         Copyright © <script>document.write(new Date().getFullYear());</script>. Dikembangkan Oleh - Roni Surya
      </span></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    {{-- <script src="{{asset('admin/app-assets/vendors/js/charts/apexcharts/apexcharts.min.js')}}"></script>--}}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin/app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/core/app.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/customizer.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
     {{-- <script src="{{asset('admin/app-assets/js/scripts/cards/card-statistics.min.js')}}"></script> --}}
    <!-- END: Page JS-->
    
    @yield('footer')


    <!-- VueJs -->
     {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
  </body>
  <!-- END: Body-->
</html>