@extends('frontend.layouts.master')
@section('content')

<section class="section-30"style="background: #eee;">
        <div class = "container card service">
          <!-- card left -->
          <div class = "service-item">
              <div class = "service-img" >
               <img src="{{asset('images/perfumes/'.$perfume->perfume_pic)}}" alt="" >
              </div>
          </div>
          <!-- card right -->
          <div class = "product-content">
            <h2 class = "product-title">{{$perfume->name}}</h2>
            <div class = "product-detail">
              <h4>about this item: </h4>
              <p>{{$perfume->desc}}</p>
              <ul>
               @foreach ($perfume->perfume_detail as $detail)
               <li>{{$detail->perfume_size->size}} : <span>{{$detail->price}} kyats</span></li>
               @endforeach
              </ul>
            </div>
          </div>
        </div>
</section>

<section class="sec bg-light">
  <div class="container">
     <div class="row">
        <div class="col-sm-12 title_bx">
           <h3 class="mt-4"> Related Yanants</h3>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12 list-slider mt-4">
           <div class="owl-carousel common_wd  owl-theme" id="recent_post">
            @foreach ($relatedPerfs->take(5) as $relatedPerf)
            <div class="item">
               <div class="sq_box shadow">
                  <div class="pdis_img"> 
                     <a href="#">
                        <img src="{{asset('images/perfumes/'.$relatedPerf->perfume_pic)}}"> 
                     </a>
                  </div>
                  <h4 class="mb-1"> <a href="details.php"> {{$relatedPerf->name}} </a> </h4>
                  <div class="price-box mb-2">
                     <span class="price"> <i class="fa fa-list-alt"></i> {{$relatedPerf->category}} perfume</span>
                     {{-- <span class="offer-price"> Offer Price <i class="fa fa-inr"></i> 120 </span> --}}
                  </div>
                  <div class="btn-box text-center">
                     <a class="btn btn-sm" href="{{route('frontend.perfume_detail',$relatedPerf->id)}}"> <i class="fa fa-shopping-cart"></i> View Detail </a>
                  </div>
               </div>
            </div>
            @endforeach
              {{-- <div class="item">
                 <div class="sq_box shadow">
                    <div class="pdis_img"> 
                       <span class="wishlist">
                       <a alt="Add to Wish List" title="Add to Wish List" href="javascript:void(0);"> <i class="fa fa-heart"></i></a>
                       </span>
                       <a href="#">
                       <img src="https://ucarecdn.com/05f649bf-b70b-4cf8-90f7-2588ce404a08/-/resize/680x/"> 
                       </a>
                    </div>
                    <h4 class="mb-1"> <a href="details.php"> Milton Bottle </a> </h4>
                    <div class="price-box mb-2">
                       <span class="price"> Price <i class="fa fa-inr"></i> 200 </span>
                       <span class="offer-price"> Offer Price <i class="fa fa-inr"></i> 120 </span>
                    </div>
                    <div class="btn-box text-center">
                       <a class="btn btn-sm" href="javascript:void(0);"> <i class="fa fa-shopping-cart"></i> Add to Cart </a>
                    </div>
                 </div>
              </div>
              <div class="item">
                 <div class="sq_box shadow">
                    <div class="pdis_img"> 
                       <span class="wishlist">
                       <a alt="Add to Wish List" title="Add to Wish List" href="javascript:void(0);"> <i class="fa fa-heart"></i></a>
                       </span>
                       <a href="#">
                       <img src="https://ucarecdn.com/05f649bf-b70b-4cf8-90f7-2588ce404a08/-/resize/680x/"> 
                       </a>
                    </div>
                    <h4 class="mb-1"> <a href="#"> Milton Bottle </a> </h4>
                    <div class="price-box mb-2">
                       <span class="price"> Price <i class="fa fa-inr"></i> 200 </span>
                       <span class="offer-price"> Offer Price <i class="fa fa-inr"></i> 120 </span>
                    </div>
                    <div class="btn-box text-center">
                       <a class="btn btn-sm" href="javascript:void(0);"> <i class="fa fa-shopping-cart"></i> Add to Cart </a>
                    </div>
                 </div>
              </div> --}}
           </div>
        </div>
     </div>
  </div>
</section>
@endsection