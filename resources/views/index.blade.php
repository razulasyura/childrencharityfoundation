@extends('website')
@section('content')
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: home -->
    <section id="home">
      <div class="container-fluid p-0">
        
        <!-- Slider Revolution Start -->
        <div class="rev_slider_wrapper">
          <div class="rev_slider rev_slider_default" data-version="5.0">
            <ul>
             @foreach($slides as $slide)
	             <!-- SLIDE-->
	            <li data-index="{{ $slide->id }}" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{asset('storage/app/public/upload/'.strtolower('slide').'/thumb/'.$slide->photo) }}" data-rotate="0" data-saveperformance="off" data-title="{{ $slide->name }}" data-description="{{ $slide->detail }}">
              <!-- MAIN IMAGE -->
              <img src="{{ asset('storage/app/public/upload/'.strtolower('slide').'/'.$slide->photo) }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
              <!-- LAYERS -->
	            </li>
              @endforeach

            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Call To Action  -->
    <section class="bg-theme-colored">
      <div class="container pt-0 pb-0">
          <div class="call-to-action sm-text-center">
          <div class="row">
            <div class="col-md-9">
              <h3 class="mt-5 text-white sm-text-center">Children Charity Foundation - Bergerak dengan Aksi dan Kasih</h3>
            </div>
            <!-- <div class="col-md-3 text-right flip sm-text-center"> 
              <a href="{{ url('donate') }}" class="btn btn-default btn-circled btn-lg mt-5">Donate Now<i class="fa fa-angle-double-right font-16 ml-10"></i></a> 
            </div> -->
          </div>
        </div>
      </div>
    </section>

    <!-- Section: About -->
    <section id="about2">
      <div class="container">
        <div class="section-content">
          <div class="row mt-10">
            <div class="col-sm-5 col-md-3 mb-sm-20">
              <h3 class="text-uppercase letter-space-1 mt-0">We are  <span class="text-theme-colored">  Children Charity Foundation</span></h3>
              <p class="lead mt-20 mb-30">Children Charity Foundation (CCF) adalah adalah sebuah organisasi sosial amal dengan skala nasional, dimana membantu anak-anak yang hidup dalam panti asuhan dan berpartisipasi merenovasi gedung sekolah yang rusak di wilayah sub urban.</p>
              <a href="{{ url('about')}}" class="btn btn-colored btn-theme-colored btn-sm">View Details</a>
            </div>
            <div class="col-sm-7 col-md-9">
              <div class="owl-carousel-4col">
              @foreach($programs as $program)
                <div class="item">
                  <div class="box-hover-effect effect1 mb-sm-30">
                    <div class="thumb"> <a href="#"><img class="img-fullwidth mb-20" src="{{asset('storage/app/public/upload/'.strtolower('program').'/thumb/'.$program->photo) }}" alt="{{ $program->name }}"></a> </div>
                    <div class="caption">
                      <a href="{{ url('program/'.$program->id)}}"><h4 class="text-uppercase letter-space-1 mt-0"><span class="text-theme-colored">{{ $program->name }}</span></h4></a>
                      <!-- <p>{{ str_limit($program->detail,10) }}</p> -->
                      <!-- <p><a href="#" class="btn btn-theme-colored btn-flat mt-10 btn-sm" role="button">Read More</a></p> -->
                    </div>
                  </div>
                </div>
              @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- divider: Became a Volunteers 1 -->
    <section class="divider parallax layer-overlay overlay-deeper" data-stellar-background-ratio="0.5" data-bg-img="{{ ('public/maf_assets/images/home/become_volunteer.jpg') }}">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-7">
              <h2 class="line-height-1 mt-0 mb-0 pb-20 text-white">Become a<span class="text-theme-colored"> Volunteers</span></h2>
              <p class="mb-30 text-white">Bantuan tidak selalu dengan uang, anda dapat bergabung dengan yayasan ini sebagai tenaga sukarelawan pada beberapa kegiatan dan juga membantu apa yang anda miliki. Anda dapat berkontribusi dengan memberikan pakaian layak pakai atau buku bacaan anak-anak. Kami akan membagikan perlengkapan tersebut pada panti asuhan yang membutuhkan. </p>
              <a class="btn btn-dark btn-theme-colored btn-lg btn-flat pull-left pl-30 pr-30" href="{{ url('http://bit.ly/registrasi_relawan')}}">Join Us</a>
            </div>
           
          </div>
        </div>
      </div>      
    </section>

    <!-- Section: Gallery 1-->
    <section id="gallery1">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-5 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
              <h3 class="mt-0 line-bottom line-height-1">FB <span class="text-theme-colored"> Children Charity Foundation</span></h3>
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=593146847505690";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));
              </script>
            <div class="event-alt" itemscope itemtype="https://schema.org/Event">
              <div class="fb-page" data-href="https://www.facebook.com/Children-Charity-Foundation-441630739359425/" data-tabs="timeline" data-width="450" data-height="350" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
            </div><!-- /.event-alt -->
            </div>
            <div class="col-md-7 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <h3 class="mt-0 line-bottom line-height-1">Photo <span class="text-theme-colored"> Gallery</span></h3>
              <!-- Portfolio Gallery Grid -->
              <div id="grid" class="gallery-isotope grid-3 gutter clearfix">
              @foreach($galleries as $gallery)
                <!-- Portfolio Item Start -->
                <div class="gallery-item photography">
                  <div class="thumb">
                    <img class="img-fullwidth" src="{{asset('storage/app/public/upload/'.strtolower('gallery').'/home/'.$gallery->photo) }}" alt="{{$gallery->name}}">
                    <div class="overlay-shade"></div>
                    <div class="text-holder text-center">
                      <h5 class="title">{{ $gallery->name }}</h5>
                    </div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="{{asset('storage/app/public/upload/'.strtolower('gallery').'/'.$gallery->photo) }}"><i class="fa fa-plus"></i></a>
                        </div>
                      </div>
                    </div>
                    <!-- <a class="hover-link" data-lightbox="image" href="http://placehold.it/200x111">View more</a> -->
                  </div>
                </div>
                <!-- Portfolio Item End -->
                @endforeach

              </div>
              <!-- End Portfolio Gallery Grid -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Clients -->
    <section class="clients bg-theme-colored">
      <div class="container pt-10 pb-10">
        <div class="row">
          <div class="col-md-12">
          </div>
        </div>
      </div>
    </section>
    
             
  </div>
  <!-- end main-content -->
@endsection

@section('css')
<!-- Revolution Slider 5.x CSS settings -->
<link  href="{{ asset('public/maf_assets/js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css"/>
<link  href="{{ asset('public/maf_assets/js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css"/>
<link  href="{{ asset('public/maf_assets/js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('js')
<!-- Revolution Slider 5.x SCRIPTS -->
<script src="{{ asset('public/maf_assets/js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('public/maf_assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('public/maf_assets/js/extra-rev-slider.js') }}"></script>
@endsection