<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta
    name="keywords"
    content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, material admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template" />
  <meta
    name="description"
    content="MaterialPro is powerful and clean admin dashboard template, inpired from Google's Material Design" />
  <meta name="robots" content="noindex,nofollow" />
  <title>MaterialPro Admin Template by WrapPixel</title>
  <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro/" />
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/background/logo.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom CSS -->

  <link href="/assets/css/style.min.css" rel="stylesheet" />
  <link href="/assets/css/custom.css" rel="stylesheet" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <img src="/assets/images/background/loader.svg" />
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    @include('Layout.header')

    @include('Layout.sidebar')

    @yield('content')

    @yield('main-content')
    @yield('role-content')
    @yield('viewuser')

  </div>
  <div class="chat-windows"></div>
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="/assets/lib/jquery/dist/jquery.min.js"></script>

  <script src="/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- apps -->
  <script src="/assets/js/app.min.js"></script>
  <script src="/assets/js/app.init.js"></script>
  <script src="/assets/js/app-style-switcher.js"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="/assets/js/perfect-scrollbar.jquery.min.js"></script>
  <!--Wave Effects -->
  <script src="/assets/js/waves.js"></script>
  <!--Menu sidebar -->
  <script src="/assets/js/sidebarmenu.js"></script>
  <!--Custom JavaScript -->
  <script src="/assets/js/feather.min.js"></script>
  <script src="/assets/js/custom.min.js"></script>
  <script>
    $(".preloader").fadeOut();
    $("#to-recover").on("click", function() {
      $("#loginform").slideUp();
      $("#recoverform").fadeIn();
    });
  </script>
</body>

</html>