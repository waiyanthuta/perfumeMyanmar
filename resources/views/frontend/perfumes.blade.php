@extends('frontend.layouts.master')
@section('content')

      <section class="section parallax-container bg-black" data-parallax-img="{{asset('images/perfumes.jpg')}}">
        <div class="parallax-content">
          <div class="section-60 section-md-90 section-xl-120">
            <div class="container text-center">
              <div class="row row-40 justify-content-lg-center">
                <div class="col-sm-12">
                  <h3>Our Yanant Perfumes</h3>
                </div>
                <div class="col-lg-11 col-xl-9">
                  <div class="owl-carousel-inverse">
                    <div class="owl-carousel owl-nav-position-numbering" data-autoplay="true" data-items="1" data-stage-padding="0" data-loop="false" data-margin="30" data-nav="true" data-numbering="#owl-numbering-1" data-animation-in="fadeIn" data-animation-out="fadeOut">
                      <div class="item">
                      </div>
                      <div class="item">
                              <blockquote class="quote-minimal quote-minimal-inverse">
                                <div class="quote-body">
                                  <p>
                                    <q>အားပေးလို့ကျေးဇူးအထူးတင်ရှိပါတယ်ရှင်</q>
                                  </p>
                                </div>
                              </blockquote>
                      </div>
                      <div class="item">
                              <blockquote class="quote-minimal quote-minimal-inverse">
                                <div class="quote-body">
                                  <p>
                                    <q>John and his staff were great with making us feel comfortable during the process. They kept us updated on our case progress and were very helpful with all of the paperwork we needed to complete. We are very pleased with the outcome of everything.</q>
                                  </p>
                                </div>
                              </blockquote>
                      </div>
                    </div>
                    <div class="owl-numbering owl-numbering-default" id="owl-numbering-1">
                      <div class="numbering-current"></div>
                      <div class="numbering-separator"></div>
                      <div class="numbering-count"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  

    <section class="section-60 section-lg-100">
      <div class="container">
        <h3 class="text-center">Yanant Unique Perfumes</h3>
          <div class="row row-40 align-items-sm-end">
            @foreach ($uniqueperfumes as $uniqueperfume)
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src="{{('images/perfumes/'.$uniqueperfume->perfume_pic)}}" alt="" width="246px" height="300px"/>
                  </figure>
                  <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="#">+959 400 58 4721</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="#">pwintphyu@yanantofficial.com</a></div>
                    <div class="link-group mt-4"><a class="button button-responsive button-small button-primary-outline-v2" href="{{route('frontend.perfume_detail',$uniqueperfume->id)}}">View Detail</a></div>
                  </div>
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="{{route('frontend.perfume_detail',$uniqueperfume->id)}}">{{$uniqueperfume->name}}</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Unique Yanant</p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
      </div>
    </section>


    <section class="section-60 section-lg-100">
      <div class="container">
        <h3 class="text-center">Yanant Inspire Perfumes</h3>
          <div class="row row-40 align-items-sm-end">
          @foreach ($inspireperfumes as $inspireperfume)
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src="{{asset('images/perfumes/'.$inspireperfume->perfume_pic)}}" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="#">+959 400 58 4721</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="#">pwintphyu@yanantofficial.com</a></div>
                    <div class="link-group mt-4"><a class="button button-responsive button-small button-primary-outline-v2" href="{{route('frontend.perfume_detail',$inspireperfume->id)}}">View Detail</a></div>
                  </div>
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="{{route('frontend.perfume_detail',$inspireperfume->id)}}">{{$inspireperfume->name}}</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">
                      {{-- @foreach ($inspireperfume->perfume_detail as $perfume_detail)
                        {{$perfume_detail->perfume_size->size}} - {{$perfume_detail->price}}
                      @endforeach --}}Inspire Yanant
                    </p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
      </div>
    </section>
@endsection