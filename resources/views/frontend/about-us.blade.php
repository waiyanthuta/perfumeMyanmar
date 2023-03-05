@extends('frontend.layouts.master')
@section('content')

      <section class="section-30 section-md-40 section-lg-66 section-xl-bottom-90 bg-gray-dark page-title-wrap" style="background-image: url(images/bg-image-1.jpg);">
        <div class="container">
          <div class="page-title">
            <h2>About Us</h2>
          </div>
          <div class="text">
            <p>this is text</p>
          </div>
        </div>
      </section>

      <section class="section-66 section-md-90 section-xl-bottom-120">
        <div class="container">
          <h3>About Yanant</h3>
          <div class="row row-40 justify-content-xl-between align-items-lg-center">
            <div class="col-md-6 col-xl-5 text-secondary">
              <div class="inset-md-right-15 inset-xl-right-0">
                <p>Yanant Colognes & Perfume Business comprises of Colognes and Perfumes in different sizes and packages according to customers preference which will help increase sales, popularity and profit making.</p>
                <p>
                  There are several top quality perfume brands in Myanmar. Yanant ensure that our products are of Good quality and worth for each and every of perfume consumers.
  
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <ul class="list-progress">
                <li>
                  <p class="animated fadeIn">Authentic Scent</p>
                  <div class="progress-bar-js progress-bar-horizontal progress-bar-sisal" data-value="80" data-stroke="4" data-easing="linear" data-counter="true" data-duration="1000" data-trail="100"></div>
                </li>
                <li>
                  <p class="animated fadeIn">Various Sizes for customer choices</p>
                  <div class="progress-bar-js progress-bar-horizontal progress-bar-laser" data-value="74" data-stroke="4" data-easing="linear" data-counter="true" data-duration="1000" data-trail="100"></div>
                </li>
                <li>
                  <p class="animated fadeIn">Availability</p>
                  <div class="progress-bar-js progress-bar-horizontal progress-bar-fuscous-gray" data-value="87" data-stroke="4" data-easing="linear" data-counter="true" data-duration="1000" data-trail="100"></div>
                </li>
                <li>
                  <p class="animated fadeIn">Services</p>
                  <div class="progress-bar-js progress-bar-horizontal progress-bar-leather" data-value="90" data-stroke="4" data-easing="linear" data-counter="true" data-duration="1000" data-trail="100"></div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <!-- About Start -->
      <div class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img src="{{asset('images/about.jpg')}}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="section-header text-left">
                        <p>Learn About Us</p>
                        <h2>Local Brand in Myanmar</h2>
                    </div>
                    <div class="about-text">
                        <p>
                          Our commitment is to provide Top Quality Products and Authenticity.
                          We guarantee that all our Fragrance Essential Oils are 100% original and authentic from France.
                          We take pride in our reputation of providing quality and excellent value perfume and cologne.                          
                        </p>
                        <p>
                          Our fine fragrances contains in a range of Oil based perfumes with low alcohol.
                          Currently we offer around 60 variants of 30ml, 10ml, and 5ml with EDP, EDT, EDC and Rollon type.                          
                        </p>
                        {{-- <a class="btn" href="">Learn More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

      {{-- <section class="class="section parallax-container bg-whisper">
        <div class="container">
          <div class="row align-items-lg-end">
            <div class="offset-md-1 offset-lg-0 col-md-8 col-lg-6 col-xl-5">
              <div class="section-60 section-md-90">
                <div class="inset-md-left-100">
                  <h3>Why Choose Us</h3>
                </div>
                <div class="inset-md-left-30 inset-md-right-30">
                  <ul class="list-xl">
                    <li>
                      <article class="icon-box-horizontal">
                        <div class="unit unit-horizontal unit-spacing-md">
                          <div class="unit-left"><span class="novi-icon icon icon-primary icon-lg mercury-icon-users"></span></div>
                          <div class="unit-body">
                            <h5><a href="#">Our Beliefs</a></h5>
                            <p>Our firm is like family. We truly believe that each case is someone’s life and we need to treat it as such.</p>
                          </div>
                        </div>
                      </article>

                    </li>
                    <li>
                      <article class="icon-box-horizontal">
                        <div class="unit unit-horizontal unit-spacing-md">
                          <div class="unit-left"><span class="novi-icon icon icon-primary icon-lg mercury-icon-lib"></span></div>
                          <div class="unit-body">
                            <h5><a href="#">Rich Experience</a></h5>
                            <p>Experience gets the job done. LawExpert’s attorneys have more than 150 years of combined legal practice.</p>
                          </div>
                        </div>
                      </article>

                    </li>
                    <li>
                      <article class="icon-box-horizontal">
                        <div class="unit unit-horizontal unit-spacing-md">
                          <div class="unit-left"><span class="novi-icon icon icon-primary icon-lg mercury-icon-briefcase"></span></div>
                          <div class="unit-body">
                            <h5><a href="#">Great Results</a></h5>
                            <p>Results are only successful when we  make a difference in your life. We’ll help you get the money and benefits.</p>
                          </div>
                        </div>
                      </article>

                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 col-lg-6 col-xl-7 offset-top-30 offset-md-top-0 d-none d-lg-block mb-4">
              <div class="image-wrap-1"><img src="images/about.png" alt="" width="670" height="578"/>
              </div>
            </div>
          </div>
        </div>
      </section> --}}
      @endsection