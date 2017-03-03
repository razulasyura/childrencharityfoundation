@extends('website')
@section('content')
<!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="{{asset('storage/app/public/upload/'.strtolower('event').'/thumb/'.$event->photo) }}">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">{{ $event->name }}</h2>
              
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Blog -->
    <section>
      <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
          <div class="col-md-9">
            <div class="blog-posts single-post">
              <article class="post clearfix mb-0">
                <div class="entry-header">
                  <div class="post-thumb thumb"> <img src="{{asset('storage/app/public/upload/'.strtolower('event').'/thumb/'.$event->photo) }}" alt="" class="img-responsive img-fullwidth"> </div>
                </div>
                <div class="entry-content">

                  <br/>
                  <h3 class="entry-title text-white text-uppercase pt-0 mt-0"><a href="blog-single-right-sidebar.html">{{ $event->name }}</a></h3>
                  <p class="mb-15">{!! $event->detail !!}</p>
                  <br/>
                  <!-- photo -->
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
              </article>
             
              
              <div id="comments" class="comments-area pt-50">
              <h3 class="mt-0 line-bottom line-height-1">Share to<span class="text-theme-colored"> Social Media</span></h3>
              <div id="share"></div>
                <!-- Facebook Comments plugin 
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=409125935834772";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

                <h3 id="comments-title"><span><fb:comments-count href="http://pc1/themeforest/thememascot/godown-latest/demo/blog-single-facebook-comments.html"></fb:comments-count></span> Comments</h3>
                
                <div class="fb-comments" data-href="http://pc1/themeforest/thememascot/godown-latest/demo/blog-single-facebook-comments.html" data-numposts="5"></div>
                <!-- Facebook Comments end -->

              </div>
              <br/>
              <h3 class="mt-0 line-bottom line-height-1">Ruang<span class="text-theme-colored"> Diskusi</span></h3>
              <div id="disqus_thread"></div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="sidebar sidebar-right mt-sm-30">
              <div class="widget">
                <h5 class="widget-title line-bottom">Others Event</h5>
                <div class="latest-posts">
                 @foreach($events as $r)
                    <article class="post media-post clearfix pb-0 mb-10">
                      <a href="{{ url('blog_detail/'.$r->id)}}" class="post-thumb"><img width="80px" height="55px" alt="" src="{{asset('storage/app/public/upload/'.strtolower('event').'/blog/'.$r->photo) }}"></a>
                      <div class="post-right">
                        <h5 class="post-title mt-0 mb-5"><a href="{{ url('blog_detail/'.$r->id)}}">{{$r->name}}</a></h5>
                        <!-- <p class="post-date mb-0 font-12">Mar 08, 2015</p> -->
                      </div>
                    </article>
                  @endforeach
                 
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </section> 

  </div>
@endsection
@section('css')
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
@endsection
@section('js')
<!-- CK EDITOR -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<script>
  $("#share").jsSocials({
      showLabel: false,
  showCount: false,
  shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest"]
      });
</script>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://children-charity-foundation.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection
