<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Children Charity Foundation - Bergerak dengan Aksi dan Kasih" />
<meta name="keywords" content="Charity,Nonprofit,Crowdfunding,Donation & Fundraising" />
<meta name="author" content="Children Charity Foundation" />

<!-- Page Title -->
<title>Children Charity Foundation - Bergerak dengan Aksi dan Kasih</title>

<!-- Favicon and Touch Icons 
<link href="{{ asset('public/maf_assets/images/favicon.png') }}" rel="shortcut icon" type="image/png">
<link href="{{ asset('public/maf_assets/images/apple-touch-icon.png" rel="apple-touch-icon') }}">
<link href="{{ asset('public/maf_assets/images/apple-touch-icon-72x72.png') }}" rel="apple-touch-icon" sizes="72x72">
<link href="{{ asset('public/maf_assets/images/apple-touch-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114">
<link href="{{ asset('public/maf_assets/images/apple-touch-icon-144x144.png') }}" rel="apple-touch-icon" sizes="144x144">
-->

<!-- Stylesheet -->
<link href="{{ asset('public/maf_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/maf_assets/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/maf_assets/css/animate.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/maf_assets/css/css-plugin-collections.css') }}" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="{{ asset('public/maf_assets/css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="{{ asset('public/maf_assets/css/style-main.css') }}" rel="stylesheet" type="text/css">

<!-- CSS | Theme Color -->

<link href="{{ asset('public/maf_assets/css/colors/theme-skin-red.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="{{ asset('public/maf_assets/css/preloader.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="{{ asset('public/maf_assets/css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="{{ asset('public/maf_assets/css/responsive.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="{{ asset('public/maf_assets/js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css"/>
<link  href="{{ asset('public/maf_assets/js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css"/>
<link  href="{{ asset('public/maf_assets/js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css"/>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="">
<div id="wrapper">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <!-- <i class="flaticon-charity-shelter font-60 text-theme-colored floating"></i> -->
      <!-- <h5 class="line-height-50 font-18">Loading...</h5> -->
    </div>
    <!-- <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div> -->
  </div>

  <!-- Header -->
  <header class="header">
    <div class="header-top bg-theme-colored sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5">
                <li>
                  <a href="#" class="text-white">Contact : 123-456-7890</a>
                </li>
                
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget no-border m-0">
              <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container">
          <nav id="menuzord-right" class="menuzord red no-bg">
            <a class="menuzord-brand pull-left flip" href="javascript:void(0)"><img src="{{ asset('public/maf_assets/images/logo-wide.png') }}" alt=""></a>
            <ul class="menuzord-menu">
              <li><a href="{{ url('index') }}">Home</a></li>
              <li><a href="{{ url('about') }}">Who We Are</a></li>
              <li><a href="{{ url('before-and-after') }}">Before & After</a></li>
              <li><a href="{{ url('gallery') }}">Gallery</a></li>
              <li><a href="{{ url('contact') }}">Contact</a></li>  
              <li><a href="#">Donate</a></li>
             
              
              
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>