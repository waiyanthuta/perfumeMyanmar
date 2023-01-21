@extends('frontend.layouts.master')
@section('content')
<section class="section-30 section-md-40 section-lg-66 section-xl-bottom-90 bg-gray-dark page-title-wrap" style="background-image: url(images/bg-image-1.jpg);">
    <div class="container">
      <div class="page-title">
        <h2>Shops</h2>
      </div>
    </div>
  </section>

  {{-- <section class="section-35 section-md-top-75 section-md-bottom-50">
    <div class="container">
      <div class="row row-40">
        <div class="col-md-6">
          <h1>Heading 1</h1>
          <div class="inset-lg-right-40 inset-xl-right-70">
            <p>Dictum non consectetur a erat nam at lectus. Lacinia at quis risus sed vulputate odio ut enim blandit. Orci phasellus egestas tellus rutrum. Aenean et tortor at risus viverra adipiscing at. Lobortis feugiat vivamus at augue eget. </p>
          </div>
        </div>
        <div class="col-md-6">
          <h2>Heading 2</h2>
          <div class="inset-lg-right-40 inset-xl-right-70">
            <p>Dictum non consectetur a erat nam at lectus. Lacinia at quis risus sed vulputate odio ut enim blandit. Orci phasellus egestas tellus rutrum. Aenean et tortor at risus viverra adipiscing at. Lobortis feugiat vivamus at augue eget. </p>
          </div>
        </div>
        <div class="col-md-6">
          <h3>Heading 3</h3>
          <div class="inset-lg-right-40 inset-xl-right-70">
            <p>Dictum non consectetur a erat nam at lectus. Lacinia at quis risus sed vulputate odio ut enim blandit. Orci phasellus egestas tellus rutrum. Aenean et tortor at risus viverra adipiscing at. Lobortis feugiat vivamus at augue eget. </p>
          </div>
        </div>
        <div class="col-md-6">
          <h4>Heading 4</h4>
          <div class="inset-lg-right-40 inset-xl-right-70">
            <p>Dictum non consectetur a erat nam at lectus. Lacinia at quis risus sed vulputate odio ut enim blandit. Orci phasellus egestas tellus rutrum. Aenean et tortor at risus viverra adipiscing at. Lobortis feugiat vivamus at augue eget. </p>
          </div>
        </div>
        <div class="col-md-6">
          <h5>Heading 5</h5>
          <div class="inset-lg-right-40 inset-xl-right-70">
            <p>Dictum non consectetur a erat nam at lectus. Lacinia at quis risus sed vulputate odio ut enim blandit. Orci phasellus egestas tellus rutrum. Aenean et tortor at risus viverra adipiscing at. Lobortis feugiat vivamus at augue eget. </p>
          </div>
        </div>
        <div class="col-md-6">
          <h6>Heading 6</h6>
          <div class="inset-lg-right-40 inset-xl-right-70">
            <p>Dictum non consectetur a erat nam at lectus. Lacinia at quis risus sed vulputate odio ut enim blandit. Orci phasellus egestas tellus rutrum. Aenean et tortor at risus viverra adipiscing at. Lobortis feugiat vivamus at augue eget. </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-35">
    <div class="container">
      <h3>Blockquote</h3>
      <div class="quote-wrap" style="max-width: 530px;">
        <blockquote class="quote-default">
          <div class="quote-open">
            <svg version="1.1" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="21px" height="15px" viewbox="0 0 21 15" overflow="scroll" xml:space="preserve">
              <path d="M9.597,10.412c0,1.306-0.473,2.399-1.418,3.277c-0.944,0.876-2.06,1.316-3.349,1.316            c-1.287,0-2.414-0.44-3.382-1.316C0.482,12.811,0,11.758,0,10.535c0-1.226,0.58-2.716,1.739-4.473L5.603,0H9.34L6.956,6.37            C8.716,7.145,9.597,8.493,9.597,10.412z M20.987,10.412c0,1.306-0.473,2.399-1.418,3.277c-0.944,0.876-2.06,1.316-3.35,1.316            c-1.288,0-2.415-0.44-3.381-1.316c-0.966-0.879-1.45-1.931-1.45-3.154c0-1.226,0.582-2.716,1.74-4.473L16.994,0h3.734l-2.382,6.37            C20.106,7.145,20.987,8.493,20.987,10.412z"></path>
            </svg>
          </div>
          <div class="quote-body">
            <p>
              <q>It has been a pleasure doing business with you, keep up the exceptional work that you are doing!</q>
            </p>
          </div>
          <div class="quote-close">
            <svg version="1.1" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="21px" height="15px" viewbox="0 0 21 15" overflow="scroll" xml:space="preserve">
              <path d="M11.39,4.593c0-1.306,0.473-2.399,1.418-3.277C13.752,0.44,14.869,0,16.157,0c1.287,0,2.414,0.44,3.382,1.316            c0.966,0.879,1.448,1.931,1.448,3.154c0,1.226-0.58,2.716-1.739,4.473l-3.865,6.062h-3.737l2.384-6.37            C12.271,7.86,11.39,6.512,11.39,4.593z M0,4.593c0-1.306,0.473-2.399,1.418-3.277C2.362,0.44,3.478,0,4.768,0            c1.288,0,2.415,0.44,3.381,1.316c0.966,0.879,1.45,1.931,1.45,3.154c0,1.226-0.582,2.716-1.74,4.473l-3.865,6.062H0.259l2.382-6.37            C0.881,7.86,0,6.512,0,4.593z"></path>
            </svg>
          </div>
        </blockquote>
      </div>
    </div>
  </section>

  <section class="section-md-50">
    <div class="container">
      <h3>Text Formatting</h3>
      <div class="box-text"><a class="link link-primary-inline" href="#">Link text</a><a class="link link-primary-inline hover" href="#">Hover link text</a><a class="link link-primary-inline active" href="#">Press link</a><span class="mark">highlighted text</span><span class="text-strike">strickethrough text</span><span class="text-underline">underlined text.</span></div>
    </div>
  </section>

  <section class="section-35">
    <div class="container">
      <h3>Image Centered</h3>
      <figure><img src="images/typography-1-1169x610.jpg" alt="" width="1169" height="610"/>
      </figure>
      <p class="text-secondary">Our priority is to measure our success based on the growth in the quality of our work and the complexity of our legal services.</p>
    </div>
  </section> --}}
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