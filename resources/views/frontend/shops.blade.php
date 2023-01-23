@extends('frontend.layouts.master')
@section('content')
<section class="section-30 section-md-40 section-lg-66 section-xl-bottom-90 bg-gray-dark page-title-wrap" style="background-image: url(images/shops.jpg);">
    <div class="container">
      <div class="page-title">
        <h2>Shops</h2>
      </div>
    </div>
</section>

@foreach ($shops as $shop)
<section class="section-35 section-md-50">
  <div class="container">
    <h3>{{$shop->name}}(Yangon)</h3>
    <div class="row row-30 flex-row-md-reverse justify-content-lg-between">
      <div class="col-md-6">
      <img src="{{asset('images/shops/'.$shop->shop_pic)}}" alt="" width="570px !important" height="386px !important"/>
        
      </div>
      <div class="col-md-6">
        <div class="inset-lg-right-40 inset-xl-right-85 text-secondary">
          <h6>{{$shop->desc}}</h6>
          <h6>Location {{$shop->location}}</h6>
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach

  <section class="section-40 section-md-bottom-100 section-xl-bottom-165">
    <div class="container">
      <h3>စံရိပ်ငြိမ် ဂမုန်းပွင့်ဆိုင်ခွဲ(Yangon)</h3>
      <div class="row row-30 justify-content-lg-between">
        <div class="col-md-6">
          <figure><img src="images/typography-3-570x386.jpg" alt="" width="570" height="386"/>
          </figure>
        </div>
        <div class="col-md-6">
          <div class="inset-lg-left-40 inset-xl-left-70 text-secondary">
            <p>Welcome to our wonderful world. We sincerely hope that each and every user entering our website will find exactly what he/she is looking for. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company.</p>
            <p>We endeavour to establish long-lasting relationships with our clients. Every assignment is preceded by a careful assessment of the work, costs and realistic results. We carry out our assignments in close consultation with the client. This goes some way to explaining why we are justifiably proud of our many long-standing and close client relationships. In the course of long-term engagements, each client has a specific contact attorney within the firm who is familiar with the client's business operations and maintains close communication with the client.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-35 section-md-50">
    <div class="container">
      <h3>City Mall ဆိုင်ခွဲ(Taungyi)</h3>
      <div class="row row-30 flex-row-md-reverse justify-content-lg-between">
        <div class="col-md-6">
          <figure><img src="images/typography-2-570x386.jpg" alt="" width="570" height="386"/>
          </figure>
        </div>
        <div class="col-md-6">
          <div class="inset-lg-right-40 inset-xl-right-85 text-secondary">
            <p>Our approach is practical and client-oriented, and we are committed to providing efficient, effective, and top-quality legal services. Other firms measure success by their growth in size. Our priority is to measure our success based on the growth in the quality of our work and the complexity of our legal services.</p>
            <p>We endeavour to establish long-lasting relationships with our clients. Every assignment is preceded by a careful assessment of the work, costs and realistic results. We carry out our assignments in close consultation with the client. This goes some way to explaining why we are justifiably proud of our many long-standing and close client relationships. In the course of long-term engagements, each client has a specific contact attorney within the firm who is familiar with the client's business operations and maintains close communication with the client.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection