@extends('frontend.layouts.master')
@section('content')

      <section>
        <div class="swiper-container swiper-slider swiper-variant-1 bg-black" data-loop="false" data-autoplay="5500" data-simulate-touch="true">
          <div class="swiper-wrapper text-center">
            <div class="swiper-slide" data-slide-bg="images/home-slider-slide-1.jpg">
              <div class="swiper-slide-caption text-center">
                {{-- <div class="container">
                  <div class="row justify-content-md-center">
                    <div class="col-md-11 col-lg-10 col-xl-9">
                      <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                        <h3 class="medium text-primary">With Us</h3>
                      </div>
                      <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">You Are Always One Step Ahead</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Strategies of our attorneys will help you solve very complex legal issues.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="#">Request a Free Consultation</a></div>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
            <div class="swiper-slide" data-slide-bg="images/home-slider-slide-2.jpg">
              <div class="swiper-slide-caption text-center">
                {{-- <div class="container">
                  <div class="row justify-content-md-center">
                    <div class="col-md-11 col-lg-10 col-xl-9">
                      <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                        <h3 class="medium text-primary">We Offer</h3>
                      </div>
                      <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">Affordable and Effective Legal Help</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Our expert team of attorneys and consultants will be glad to provide necessary legal assistance.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="#">Request a Free Consultation</a></div>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
            <div class="swiper-slide" data-slide-bg="images/home-slider-slide-3.jpg">
              <div class="swiper-slide-caption text-center">
                {{-- <div class="container">
                  <div class="row justify-content-md-center">
                    <div class="col-md-11 col-lg-10 col-xl-9">
                      <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                        <h3 class="medium text-primary">With Our Services</h3>
                      </div>
                      <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">You Will Get Extensive Legal Support</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">We have years of experience in providing legal help in various spheres of law.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="#">Request a Free Consultation</a></div>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
          <div class="swiper-scrollbar d-lg-none"></div>
          <div class="swiper-nav-wrap">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </section>

      <section class="bg-displaced-wrap">
        <div class="bg-displaced-body">
          <div class="container">
            <div class="inset-xl-left-70 inset-xl-right-70">
              <article class="box-cart bg-ebony-clay">
                <div class="box-cart-image"><img src="{{asset('images/about-us-index.jpg')}}" alt="" width="342" height="338"/>
                </div>
                <div class="box-cart-body">
                  <blockquote class="blockquote-complex blockquote-complex-inverse">
                    <h3>About Yanant</h3>
                    <p>
                      <q>
                        ကျွန်မတို့ရဲ့ Yanantက ရနံ့ချစ်တဲ့သူတွေကြားထဲမှာ မမေ့နိုင်တဲ့အမှတ်တရလေးတွေကို ဖန်တီးပေးနိုင်လိမ့်မယ်လို့ ယုံကြည်ပါတယ်...</q>
                    </p>
                    <div class="quote-footer">
                      <cite>Pwint Phyu</cite><small>Founder of Yanant Myanmar</small>
                    </div>
                  </blockquote>
                  <div class="button-wrap inset-md-left-70"><a class="button button-responsive button-medium button-primary-outline-v2" href="{{route('frontend.perfumes')}}">View Yanant Perfumes</a></div>
                </div>
              </article>
            </div>
          </div>
        </div>
        <div class="bg-displaced bg-image" style="background-image: url(images/home-1.jpg); filter: blur(7px); -webkit-filter: blur(7px);"></div>
      </section>

      <section class="section-60 section-lg-100">
        <div class="container">
          <div class="row row-40 align-items-sm-end">
            @foreach ($perfumes->take(3) as $perfume)
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src="{{('images/perfumes/'.$perfume->perfume_pic)}}" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="#">+959 400 58 4721</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="#">pwintphyu@yanantofficial.com</a></div>
                    <div class="link-group mt-4"><a class="button button-responsive button-small button-primary-outline-v2" href="{{route('frontend.perfume_detail',$perfume->id)}}">View Detail</a></div>
                  </div>
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="{{route('frontend.perfume_detail',$perfume->id)}}">{{$perfume->name}}</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Yanant Perfumes</p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            
            <div class="col-sm-6 col-md-12 col-lg-3 text-center">
              <div class="block-wrap-1">
                <div class="block-number">08</div>
                <h3 class="text-normal">Perfumes</h3>
                <p class="h5 h5-smaller text-style-4">in Yanant</p>
                <p>Yanant Perfumes have unique scents combined with worldwide trends.</p><a class="link link-group link-group-animated link-bold link-secondary" href="{{route('frontend.perfumes')}}"><span>See More</span><span class="novi-icon icon icon-xxs icon-primary fa fa-angle-right"></span></a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section parallax-container bg-black numcatpic" data-parallax-img="images/progress-bars-parallax-1.jpg">
        <div class="parallax-content">
          <div class="section-50 section-md-90">
            <div class="container">
              <div class="row row-40">
                <div class="col-sm-6 col-md-3">
                  <div class="box-counter box-counter-inverse"><span class="novi-icon icon icon-lg icon-primary mercury-icon-group"></span>
                    <div class="text-large counter">18</div>
                    <p class="box-header">Yanants</p>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="box-counter box-counter-inverse"><span class="novi-icon icon icon-lg-smaller icon-primary mercury-icon-scales"></span>
                    <div class="text-large counter">120</div>
                    <p class="box-header">Products</p>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="box-counter box-counter-inverse"><span class="novi-icon icon icon-lg-smaller icon-primary mercury-icon-partners"></span>
                    <div class="text-large counter counter-percent">90%</div>
                    <p class="box-header">Long lasting scent</p>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="box-counter box-counter-inverse"><span class="novi-icon icon icon-lg icon-primary mercury-icon-case"></span>
                    <div class="text-large counter">{{$shops->count()}}</div>
                    <p class="box-header">Branches</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      @if ($reviews->count())
      <section class="section-66 section-md-90 section-xl-bottom-100">
        <div class="container">
          <h3 class="text-center">Yanant Reviews By Celebrities</h3>
          <div class="owl-carousel owl-spacing-1 owl-nav-classic owl-style-minimal" data-autoplay="true" data-items="1" data-md-items="2" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="true" data-nav="true" data-dots="true" data-dots-each="1">
            @foreach ($reviews as $review)
            <div class="item">
              <blockquote class="quote-bordered">
                <div class="quote-body">
                  <div class="quote-open">
                    <svg version="1.1" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37px" height="27px" viewbox="0 0 21 15" preserveAspectRatio="none">
                      <path d="M9.597,10.412c0,1.306-0.473,2.399-1.418,3.277c-0.944,0.876-2.06,1.316-3.349,1.316                    c-1.287,0-2.414-0.44-3.382-1.316C0.482,12.811,0,11.758,0,10.535c0-1.226,0.58-2.716,1.739-4.473L5.603,0H9.34L6.956,6.37                    C8.716,7.145,9.597,8.493,9.597,10.412z M20.987,10.412c0,1.306-0.473,2.399-1.418,3.277c-0.944,0.876-2.06,1.316-3.35,1.316                    c-1.288,0-2.415-0.44-3.381-1.316c-0.966-0.879-1.45-1.931-1.45-3.154c0-1.226,0.582-2.716,1.74-4.473L16.994,0h3.734l-2.382,6.37                    C20.106,7.145,20.987,8.493,20.987,10.412z"></path>
                    </svg>
                  </div>
                  <div class="quote-body-inner">
                    <h6>{{$review->headline}}</h6>
                    <p>
                      <q>{{$review->review}}</q>
                    </p>
                  </div>
                </div>
                <div class="quote-footer">
                  <div class="unit unit-horizontal unit-spacing-sm align-items-center">
                    <div class="unit-left"><img class="img-circle" src="{{asset('images/reviews/'.$review->author_pic)}}" alt="" width="68" height="68"/>
                    </div>
                    <div class="unit-body">
                      <cite>{{$review->name}}</cite>
                      <p class="text-primary">{{$review->job}}</p>
                    </div>
                  </div>
                </div>
              </blockquote>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      @endif

      
      {{-- Latest New --}}
      <section class="section-50 section-md-75 section-xl-100">
        <div class="container">
          <h3 class="text-center">Yanant Branches</h3>
          <div class="row row-40 row-offset-1 justify-content-sm-center justify-content-md-start">
            @foreach ($shops as $shop)
            <div class="col-sm-9 col-md-6 col-lg-4 col-xl-3">
              <article class="post-boxed">
                <div class="post-boxed-image"><img src="{{asset("images/shops/".$shop->shop_pic)}}" alt="" width="268" height="182"/>
                </div>
                <div class="post-boxed-body">
                  <div class="post-boxed-title"><a href="#">{{$shop->name}}</a></div>
                  <div class="post-boxed-footer">
                    <ul class="post-boxed-meta">
                      {{-- <li>
                        <time datetime="2019-06-14">JUNE 14, 2019</time>
                      </li> --}}
                      <li>{{$shop->location}}</li>
                    </ul>
                  </div>
                </div>
              </article>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      @endsection