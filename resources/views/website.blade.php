<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="{{ config('app.name') }} | {{ isset($page_description) ? $page_description : 'Default' }}" />
<meta name="keywords" content="{{ isset($page_description) ? $page_description : 'Default' }}" />
<meta name="author" content="{{ config('app.name') }}" />

<!-- Page Title -->
<title>{{ config('app.name') }} | {{ isset($page_header) ? $page_header : 'Default' }}</title>

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

@yield('css')

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
                  <a href="#" class="text-white">Contact : 021-22827792 </a>
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
            <a href="{{ url('index') }}" class="menuzord-brand pull-left flip" href="javascript:void(0)"><img src="{{ asset('public/maf_assets/images/logo-wide.png') }}" alt=""></a>
            <ul class="menuzord-menu">
              <li><a href="{{ url('index') }}">Home</a></li>
              <li style=""><a href="#">About<span class="indicator"></span></a>
                <ul class="dropdown" style="right: auto; display: none;">
                  <li><a href="{{ url('about') }}">About</a></li>
                  <li><a href="{{ url('profil') }}">Profil</a></li>
                </ul>
              </li>
              <li><a href="{{ url('program') }}">Program</a></li>
              <li><a href="{{ url('blog') }}">Kegiatan</a></li>
              <li><a href="{{ url('gallery') }}">Gallery</a></li>
              <li style=""><a href="#">Registrasi<span class="indicator"></span></a>
                <ul class="dropdown" style="right: auto; display: none;">
                  <li><a target="blank" href="http://bit.ly/registrasi_anggota">Anggota</a></li>
                  <li><a target="blank" href="http://bit.ly/registrasi_sukarelawan">Sukarelawan</a></li>
                </ul>
              </li>
              <li><a href="{{ url('donate') }}">Donate</a></li>
              <li><a href="{{ url('contact') }}">Contact</a></li>

            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>

 @yield('content')

 <!-- Footer -->
  <footer id="footer" class="bg-black-222">
    <div class="container pt-80 pb-30">
      <div class="row border-bottom-black">

        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Useful Links</h5>
            <ul class="list angle-double-right list-border">
              <li><a href="{{ url('index') }}">Home</a></li>
              <li><a href="{{ url('program') }}">Program</a></li>
              <li><a href="{{ url('kegiatan') }}">Kegiatan</a></li>
              <li><a href="{{ url('gallery') }}">Gallery</a></li>
              <li><a href="{{ url('donate') }}">Donate</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Donation</h5>
            <ul class="list angle-double-right list-border">
              <li>
              Children Charity Foundation<br/>
              Bank Tabungan Negara (BTN)<br/>
              00614.01.50.001396.2<br/>
              <br/>
              Children Charity Foundation<br/>
              Bank Mandiri<br/>
              129-00-1084491-4<br/>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Latest Event</h5>
            <div class="latest-posts">
            @foreach($albums as $album)
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="{{ url('album/'.$album->id)}}" class="post-thumb"><img alt="" src="{{asset('storage/app/public/upload/'.strtolower('album').'/home/'.$album->photo) }}"></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="{{ url('album/'.$album->id)}}">{{$album->name}}</a></h5>
                  <!-- <p class="post-date mb-0 font-12">Mar 08, 2015</p> -->
                </div>
              </article>
            @endforeach
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
          <?php /*$contact = App\Contact::whereId(1)->firstOrFail();*/ ?>
            <h5 class="widget-title line-bottom">Contact Us</h5>
            <p>{{ $contact->address }}</p>
            <ul class="list-inline mt-5">
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a class="text-gray" href="#">{{ $contact->phone1 }} </a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a class="text-gray" href="#">{{ $contact->phone2 }}</a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a class="text-gray" href="#">{{ $contact->email1 }}</a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i> <a class="text-gray" href="#">{{ $contact->website }}</a> </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
    <div class="footer-bottom bg-black-333">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6">
            <p class="font-11 text-black-777 m-0">2015 - Children Charity Foundation</p>
          </div>
          <div class="col-md-6 text-right">

          </div>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- external javascripts -->
<script src="{{ asset('public/maf_assets/js/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('public/maf_assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/maf_assets/js/bootstrap.min.js') }}"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="{{ asset('public/maf_assets/js/jquery-plugin-collection.js') }}"></script>
<!-- JS | Custom script for all pages -->
<script src="{{ asset('public/maf_assets/js/custom.js') }}"></script>
<script src="{{ asset('public/maf_assets/js/extra.js') }}"></script>
@yield('js')
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89448058-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
