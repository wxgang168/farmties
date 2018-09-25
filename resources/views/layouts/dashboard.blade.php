
<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Crypto ICO admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, crypto ico admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title', 'Farmties | Dashboard')</title>
    <link rel="apple-touch-icon" href="/profile/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/profile/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="/profile/app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="/profile/app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="/profile/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="/profile/app-assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="/profile/app-assets/css/core/menu/menu-types/vertical-compact-menu.css">
    <link rel="stylesheet" type="text/css" href="/profile/app-assets/vendors/css/cryptocoins/cryptocoins.css">
    <link rel="stylesheet" type="text/css" href="/profile/app-assets/css/pages/timeline.css">
    <link rel="stylesheet" type="text/css" href="/profile/app-assets/css/pages/dashboard-ico.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/profile/assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">



    <!-- fixed-top-->
    
    {{-- top navigation --}}
    @include('partials.profile.nav')

    {{-- sidebar navigation --}}
    @include('partials.profile.sidenav')

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          @yield('header')
        </div>
        @yield('extra-plus')
        <div class="content-body">
          @yield('content')
        </div>
        @yield('extras')
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-transparent">
      @include('partials.profile.footer')
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="/profile/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="/profile/app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="/profile/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>
    <script src="/profile/app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="/profile/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="/profile/app-assets/js/core/app.js" type="text/javascript"></script>
    <script src="/js/sweetalert.min.js"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="/profile/app-assets/js/scripts/pages/dashboard-ico.js" type="text/javascript"></script>
    <script src="/js/scripts.js"></script>
    <!-- END PAGE LEVEL JS-->

    @yield('scripts')

    @include('flash')

    @yield('modals')

  </body>
</html>