@extends('website')
@section('content')
<!-- Start main-content -->
  <div class="main-content">


    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-stellar-background-ratio="0.5" data-bg-img="{{ ('public/maf_assets/images/cover_page/cover_who_we_are_6.jpg') }}">
      <div class="container pt-100 pb-50">
        <!-- Section Content -->
        <div class="section-content text-center">
          <div class="row"> 
            <div class="col-md-12">
              <h3 class="title text-white">{{ $page_header }}</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Gallery Grid 3 -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
            
              <!-- Portfolio Gallery Grid -->
              <div id="grid" class="gallery-isotope grid-3 gutter clearfix">
                @foreach($galleries as $gallery)
                <!-- Portfolio Item Start -->
                <div class="gallery-item photography">
                  <div class="thumb">
                    <img class="img-fullwidth" src="{{asset('storage/app/public/upload/'.strtolower('gallery').'/thumb/'.$gallery->photo) }}" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="{{asset('storage/app/public/upload/'.strtolower('gallery').'/'.$gallery->photo) }}"><i class="fa fa-photo"></i></a>
                        </div>
                      </div>
                    </div>
                    <!-- <a class="hover-link" data-lightbox="image" href="{{ ('public/maf_assets/images/gallery/thumb/gallery_sample.jpg') }}">View more</a> -->
                  </div>
                </div>
                @endforeach
                <!-- Portfolio Item End -->
               
              </div>
              <!-- End Portfolio Gallery Grid -->
               
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-12">
              {{ $galleries->links() }}
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>
  <!-- end main-content -->
@endsection