@extends('website')
@section('content')
<!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ ('public/maf_assets/images/cover_page/cover_who_we_are_1.jpg') }}">
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
  

    <!-- Section: About -->
    <section> 
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
          <div class="thumb">
                  <img src="{{asset('storage/app/public/upload/'.strtolower('content').'/thumb/'.$content->photo) }}" alt="">
                </div>
          
          </div>
          <div class="col-sm-12 col-md-6">
            <h3 class="text-theme-colored text-uppercase mt-0">{{ $content->name_id }}</h3>
            <p>
            {!! $content->detail_id !!}
            </p>
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <!-- end main-content -->
@endsection