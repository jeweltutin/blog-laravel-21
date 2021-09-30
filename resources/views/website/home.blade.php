@extends('layouts.template')
@section('content')
<!--<div class="slidersec">
  <div class="slideshow-container">

  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <a href="#"><img src="{{ asset('website')}}/slider/slides/img_nature_wide.jpg" alt="Image" class="img-fluid rounded" style="width:100%"></a>
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <a href="#"><img src="{{ asset('website')}}/slider/slides/img_snow_wide.jpg" alt="Image" class="img-fluid rounded" style="width:100%"></a>
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <a href="#"><img src="{{ asset('website')}}/slider/slides/img_mountains_wide.jpg" alt="Image" class="img-fluid rounded" style="width:100%"></a>
    <div class="text">Caption Three</div>
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

  </div>
  <br>

  <div style="text-align:center">
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
  </div>
 https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_slideshow_auto 
</div>-->
<div class="slidersec">
<!-- https://getbootstrap.com/docs/4.0/components/carousel/ -->
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{ asset('website')}}/slider/slides/img_nature_wide.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>First Slide Title</h5>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Repudiandae consectetur maxime delectus dolores dolorum enim laborum voluptates iusto quisquam et!
             Quidem soluta nisi asperiores, officia optio possimus quas laborum velit.
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('website')}}/slider/slides/img_snow_wide.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('website')}}/slider/slides/img_mountains_wide.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="site-section bg-light">
      <div class="container">
        <div class="row align-items-stretch retro-layout-2">
          <div class="col-md-4">
            @foreach($firstTwo as $f2)
            <a href="{{ route('website.post', ['slug' => $f2->slug] ) }}" class="h-entry mb-30 v-height gradient" style="background-image: url( '{{ $f2->image }}');">
              
              <div class="text">
                <h2>{{ $f2->title }}</h2>
                <span class="date">{{ $f2->created_at->format('M d, Y') }}</span>
              </div>
            </a>
            @endforeach
          </div>
          <div class="col-md-4">
          @foreach($middleOne as $m1)
            <a href="{{ route('website.post', ['slug' => $m1->slug] ) }}" class="h-entry img-5 h-100 gradient" style="background-image: url( '{{ $m1->image }}');">
              
              <div class="text">
                <div class="post-categories mb-3">
                  <span class="post-category bg-danger">{{ $m1->category->name }}</span>
                  <span class="post-category bg-primary">Food</span>
                </div>
                <h2>{{ $m1->title }}.</h2>
                <span class="date">{{ $m1->created_at->format('M d, Y') }}</span>
              </div>
            </a>
          @endforeach
          </div>
          <div class="col-md-4">
             @foreach($lastTwo as $l2)
              <a href="{{ route('website.post', ['slug' => $l2->slug] ) }}" class="h-entry mb-30 v-height gradient" style="background-image: url( '{{ $l2->image }}');">
                
                <div class="text">
                  <h2>{{ $l2->title }}</h2>
                  <span class="date">{{ $l2->created_at->format('M d, Y') }}</span>
                </div>
              </a>
              @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h2>Recent Posts</h2>
          </div>
        </div>
        <div class="row">
          @foreach($recentPosts as $rpost)
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <!--<a href="single.html"><img src="{{ asset('website')}}/images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>-->
              <a href="{{ route('website.post', ['slug' => $rpost->slug] ) }}"><img src="{{ $rpost->image }}" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-secondary mb-3">{{ $rpost->category->name }}</span>

              <h2><a href="{{ route('website.post', ['slug' => $rpost->slug] ) }}">{{ $rpost->title }}</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <!-- <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure> -->
                <figure class="author-figure mb-0 mr-3 float-left"><img src="@if ($rpost->user->image) {{ asset($rpost->user->image) }} @else {{ asset('website/images/user.png') }} @endif" alt="Image" class="img-fluid"></figure>
                @if (isset(Auth::user()->name))
                  <span class="d-inline-block mt-1">By <a href="#"> {{  /*Auth::user()->name*/ $rpost->user->name }}</a></span>
                @endif
                <span>&nbsp;-&nbsp; {{ $rpost->created_at->format('M d, Y') }}</span>
              </div>
              
                <p>{{ Str::limit($rpost -> description, 100) }}</p>
                <p><a href="{{ route('website.post', ['slug' => $rpost->slug] ) }}">Read More</a></p>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            {{ $recentPosts->links('pagination::bootstrap-4') }}
            <!--<div class="custom-pagination">
              <span>1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <span>...</span>
              <a href="#">15</a>
            </div>-->
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row align-items-stretch retro-layout">
          
          <div class="col-md-5 order-md-2">
            @foreach($lFirstOne as $lfo)
            <a href="{{ route('website.post', ['slug' => $lfo->slug] ) }}" class="hentry img-1 h-100 gradient" style="background-image: url( {{ $lfo->image }} )">
              <span class="post-category text-white bg-danger">{{ $lfo->category->name }}</span>
              <div class="text">
                <h2>{{ $lfo->title }}</h2>
                <span>{{ $lfo->created_at->format('M d, Y') }}</span>
              </div>
            </a>
            @endforeach
          </div>

          <div class="col-md-7">
          @foreach($lLastOne as $ll1)
            <a href="{{ route('website.post', ['slug' => $ll1->slug] ) }}" class="hentry img-2 v-height mb30 gradient" style="background-image: url( '{{ $ll1->image }}');">
              <span class="post-category text-white bg-success">{{ $ll1->category->name }}</span>
              <div class="text text-sm">
                <h2>{{ $ll1->title }}</h2>
                <span>{{ $ll1->created_at->format('M d, Y') }}</span>
              </div>
            </a>
          @endforeach
            
            <div class="two-col d-block d-md-flex justify-content-between">
              @foreach($lMiddleTwo as $lm2)
                <a href="{{ route('website.post', ['slug' => $lm2->slug] ) }}" class="hentry v-height img-2 gradient" style="background-image: url( {{ $lm2->image }}">
                  <span class="post-category text-white bg-primary">{{ $lm2->category->name }}</span>
                  <div class="text text-sm">
                    <h2>{{ $lm2->title }}</h2>
                    <span>{{ $lm2->created_at->format('M d, Y') }}</span>
                  </div>
                </a>
              @endforeach
            </div>  
            
          </div>
        </div>

      </div>
    </div>


    <div class="site-section bg-lightx">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-5">
            <div class="subscribe-1 ">
              <h2>Subscribe to our newsletter</h2>
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
              <form action="#" class="d-flex">
                <input type="text" class="form-control" placeholder="Enter your email address">
                <input type="submit" class="btn btn-primary" value="Subscribe">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script>
$('.carousel').carousel({
  interval: 2000,
  pause: false
});
</script>
@endsection

{{-- 
@section('style')
  <link rel="stylesheet" href="{{ asset('website')}}/slider/jslider.css">
@endsection

@section('script')
  <script src="{{ asset('website') }}/slider/jslider.js"></script>
@endsection --}}

