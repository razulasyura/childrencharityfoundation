@extends('website')
@section('content')
<!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ ('public/maf_assets/images/cover_page/cover_who_we_are.jpg') }}">
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

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <iframe src="https://embed.kitabisa.com/helpsyria" frameborder="0" width="100%" height="400px"></iframe>
            <iframe src="https://embed.kitabisa.com/helpsyria" frameborder="0" width="100%" height="400px"></iframe>
            <iframe src="https://embed.kitabisa.com/helpsyria" frameborder="0" width="100%" height="400px"></iframe>
          </div>
        </div>
      </div>
    </section>


  </div>
  <!-- end main-content -->
@endsection
