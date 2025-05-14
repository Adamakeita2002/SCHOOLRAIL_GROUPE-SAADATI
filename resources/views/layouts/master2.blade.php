<!DOCTYPE html>
<html lang="fr">
    <head>
  <meta charset="utf-8">
  <title>SIV - Compte Securité</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/securiteCssJs/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/securiteCssJs/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/securiteCssJs/css/style.css" rel="stylesheet">

  <link href="/securiteCssJs/css/main.css" rel="stylesheet" media="all">

  <!-- =======================================================
    Theme Name: Bell
    Theme URL: https://bootstrapmade.com/bell-free-bootstrap-4-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->

  
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/style.css">

<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/util.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">


    <style type="text/css">

    input{
      color:#fff;
    }

    input::-webkit-input-placeholder { color: yellow;}
    input:-moz-placeholder { color: yellow;}
    input::-moz-placeholder { color: yellow;}
    input:-ms-input-placeholder { color: yellow;}

    .btn-circle.btn-xl {
      width: 150px;
      height: 150px;
      padding: 10px 16px;
      font-size: 24px;
      line-height: 1.33;
      border-radius: 75px;
    }


    </style>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    </head>
   

    <body >

      <!-- Header -->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.html"><img src="/images/lgsiv.png" alt="SIV" height="40" width="40" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

        
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="/securite"><i class="fa fa-home"></i> Accueil</a></li>
          <li><a href="#"><i class="fa fa-info-circle"></i> Infos Utiles</a></li>
          <li><a href="#"><i class="fa fa-phone"></i> Contact Utiles</a></li>
          <li><a href="#"><i class="fa fa-envelope"></i> Signaler un problème</a></li>
        </ul>
      </nav>

      <!-- #nav-menu-container  -->

      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-user-circle"></i> <u>{{$securite->login}}</u></a>
        <a href="/securite/logout"><i class="fa fa-sign-in"></i>Se deconnecter? </a>
      </nav>
      
    </div>
  </header>
  <!-- #header -->



      <!-- CONTENT -->
          @yield ('content')
      <!-- CONTENT -->


      <!-- FOOTER 
          @include('layouts.footer')
       FOOTER -->




    </body>

  <!-- Required JavaScript Libraries -->
  <script src="/securiteCssJs/lib/jquery/jquery.min.js"></script>
  <script src="/securiteCssJs/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/securiteCssJs/lib/superfish/hoverIntent.js"></script>
  <script src="/securiteCssJs/lib/superfish/superfish.min.js"></script>
  <script src="/securiteCssJs/lib/tether/js/tether.min.js"></script>
  <script src="/securiteCssJs/lib/stellar/stellar.min.js"></script>
  <script src="/securiteCssJs/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/securiteCssJs/lib/counterup/counterup.min.js"></script>
  <script src="/securiteCssJs/lib/waypoints/waypoints.min.js"></script>
  <script src="/securiteCssJs/lib/easing/easing.js"></script>
  <script src="/securiteCssJs/lib/stickyjs/sticky.js"></script>
  <script src="/securiteCssJs/lib/parallax/parallax.js"></script>
  <script src="/securiteCssJs/lib/lockfixed/lockfixed.min.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="/securiteCssJs/js/custom.js"></script>

  <script src="/securiteCssJs/contactform/contactform.js"></script>


</html>
