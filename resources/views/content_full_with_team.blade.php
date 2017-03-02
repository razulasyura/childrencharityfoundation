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
         
          <div class="col-sm-12 col-md-12">
            <h3 class="text-theme-colored text-uppercase mt-0">{{ $content->name_id }}</h3>
            <p>
            {!! $content->detail_id !!}
            </p>
          </div>
        </div>
        <br/>
      <!-- </div> -->
    <!-- </section>
    Section: team
    <section> -->
      <!-- <div class="container"> -->
        <div class="section-content">
        <h3 class="text-theme-colored text-uppercase mt-0">Management</h3>
          <div class="row mb-30">
            @foreach($teams as $team)
            <div class="col-md-4">
              <div class="team-member maxwidth400">
                <div class="thumb"><img alt="" src="{{ asset('storage/app/public/upload/'.strtolower('team').'/thumb/'.$team->photo) }}" class="img-fullwidth"></div>
                <div class="info">
                  <h4 class="mb-0">{{ $team->name }} <small>- {{ $team->position }}</small></h4>
                  <p>{!! $team->detail !!}</p>
                 <!--  <ul class="styled-icons icon-theme-colored icon-circled icon-dark icon-sm mt-10 mb-0">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                  </ul> -->
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <!-- end main-content -->
@endsection