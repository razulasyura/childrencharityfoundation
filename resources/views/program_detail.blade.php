@extends('website')
@section('content')
<!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{asset('storage/app/public/upload/'.strtolower('program').'/'.$program->photo) }}">
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
          <div class="col-sm-12 col-md-5">
          <div class="thumb">
                  <img src="{{asset('storage/app/public/upload/'.strtolower('program').'/'.$program->photo) }}" alt="">
                </div>
          
          </div>
          <div class="col-sm-12 col-md-7">
            <h3 class="text-theme-colored text-uppercase mt-0">{{ $program->name }}</h3>
            <p>
            {!! $program->detail !!}
            </p>
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <!-- end main-content -->
@endsection