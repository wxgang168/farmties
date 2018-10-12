<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="stylesheet" href="/css/dark.css" type="text/css">
    <link rel="stylesheet" href="/css/font-icons.css" type="text/css">
    <link rel="stylesheet" href="/css/animate.css" type="text/css">
    <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css">

    <link rel="stylesheet" href="/css/responsive.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Document Title
    ============================================= -->
    <title>Farmties | Login</title>

</head>
<body class="stretched">

  <!-- Document Wrapper
  ============================================= -->
  <div id="wrapper" class="clearfix">

    <!-- Content
    ============================================= -->
    <section id="content">

      <div class="content-wrap nopadding">

        @yield('content')

      </div>

    </section>

  </div>


  <!-- Go To Top
  ============================================= -->
  <div id="gotoTop" class="icon-angle-up"></div>

  <!-- External JavaScripts
  ============================================= -->
  <script type="text/javascript" src="/js/jquery.js"></script>
  <script type="text/javascript" src="/js/plugins.js"></script>

  <!-- Footer Scripts
  ============================================= -->
  <script type="text/javascript" src="/js/functions.js"></script>



  @yield('scripts')

</body>
</html>
