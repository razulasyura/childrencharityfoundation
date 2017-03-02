@extends('website')
@section('content')
<!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ ('public/maf_assets/images/cover_page/cover_who_we_are_2.jpg') }}">
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
        <div class="row multi-row-clearfix">
          <div class="blog-posts">
           @foreach($events as $event)
            <div class="col-md-4">
              <article class="post clearfix mb-30 bg-lighter">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="{{asset('storage/app/public/upload/'.strtolower('event').'/blog/'.$event->photo) }}" alt="" class="img-responsive img-fullwidth"> 
                  </div>
                </div>
                <div class="entry-content border-1px p-20 pr-10">
                  <div class="entry-meta media mt-0 no-bg no-border">

                    <div class="media-body">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="{{ url('blog_detail/'.strtolower($event->id)) }}">{{ $event->name }}</a></h4>                      
                      </div>
                    </div>
                  </div>
                  <p class="mt-10">{!! str_limit($event->detail,120) !!}</p>
                  <a href="{{ url('blog_detail/'.strtolower($event->id)) }}" class="btn-read-more">Read more</a>
                  <div class="clearfix"></div>
                </div>
              </article>
            </div>
            @endforeach
            <div class="col-md-12">
              {{ $events->links() }}
            </div>
          </div>
        </div>
      </div>
    </section> 
  </div>
@endsection