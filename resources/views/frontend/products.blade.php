@extends('frontend.layouts.master')
@section('content')

<section class="section parallax-container bg-black" data-parallax-img="images/clients-testimonials-parallax-1.jpg">
    <div class="parallax-content">
      <div class="section-60 section-md-90 section-xl-120">
        <div class="container text-center">
          <div class="row row-40 justify-content-lg-center">
            <div class="col-sm-12">
              <h2 class="text-black">Our Yanant Products</h2>
            </div>
            <div class="col-lg-11 col-xl-9">
              <div class="owl-carousel-inverse">
                <div class="owl-carousel owl-nav-position-numbering" data-autoplay="true" data-items="1" data-stage-padding="0" data-loop="false" data-margin="30" data-nav="true" data-numbering="#owl-numbering-1" data-animation-in="fadeIn" data-animation-out="fadeOut">
                  <div class="item">
                          <blockquote class="quote-minimal quote-minimal-inverse">
                            <div class="quote-body">
                              <p>
                                <q style="color: black!important">Step into a world of sensory bliss and elevate your space with the transformative power of aromatherapy.</q>
                              </p>
                            </div>
                            <div class="quote-meta">
                            </div>
                          </blockquote>
                  </div>
                  <div class="item">
                          <blockquote class="quote-minimal quote-minimal-inverse">
                            <div class="quote-body">
                              <p>
                                <q style="color: black!important">We also specialize in providing a curated selection of diffusers, essential oils, and humidifiers that transform your surroundings into a haven of relaxation, rejuvenation, and serenity.</q>
                              </p>
                            </div>
                          </blockquote>
                  </div>
                  <div class="item">
                          <blockquote class="quote-minimal quote-minimal-inverse">
                            <div class="quote-body">
                              <p>
                                <q style="color: black!important">These elegantly designed devices not only add a touch of beauty to any room but also offer practical functionality and intuitive controls, making it effortless to create the perfect aromatic environment</q>
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

 <!-- Pricing Start -->
 <div class="price">
    <div class="container">
        <div class="section-header text-center">
            <p>Click the product for more detail</p>
            <h3>Yanant Diffusers</h3>
        </div>
        <div class="row">
            @foreach ($diffusers as $diffuser)
            <div class="col-lg-3 col-md-4 col-sm-6 pdtmodal" href="#" id="{{$diffuser->id}}" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ProductModal">
                <div class="price-item">
                    <div class="price-img">
                        <img src="{{asset('images/products/'. $diffuser->product_pic)}}" alt="Image">
                    </div>
                    <div class="price-text">
                        <h2>{{$diffuser->name}}</h2>
                        @foreach ($diffuser->product_detail as $detail)
                        <h3>{{$detail->size}} - {{$detail->price}} kyats</h3>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Pricing End -->
 <div class="price">
    <div class="container">
        <div class="section-header text-center">
            <p>Click the product for more detail</p>
            <h3>Yanant Humidifiers</h3>
        </div>
        <div class="row">
            @foreach ($humidifiers as $humidifier)
            <div class="col-lg-3 col-md-4 col-sm-6 pdtmodal" href="#" id="{{$humidifier->id}}" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ProductModal">
                <div class="price-item">
                    <div class="price-img">
                        <img src="{{asset('images/products/'. $humidifier->product_pic)}}" alt="Image">
                    </div>
                    <div class="price-text">
                        <h2>{{$humidifier->name}}</h2>
                        @foreach ($humidifier->product_detail as $detail)
                        <h3>{{$detail->size}} - {{$detail->price}} kyats</h3>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
{{-- </div> --}}
 <!-- Pricing Start -->
 <div class="price">
    <div class="container">
        <div class="section-header text-center">
            <p>Click the product for more detail</p>
            <h3>Yanant Car Perfumes</h3>
        </div>
        <div class="row">
            @foreach ($carperfs as $carperf)
            <div class="col-lg-3 col-md-4 col-sm-6 pdtmodal" href="#" id="{{$carperf->id}}" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ProductModal">
                <div class="price-item">
                    <div class="price-img">
                        <img src="{{asset('images/products/'. $carperf->product_pic)}}" alt="Image">
                    </div>
                    <div class="price-text">
                        <h2>{{$carperf->name}}</h2>
                        @foreach ($carperf->product_detail as $detail)
                        <h3>{{$detail->size}} - {{$detail->price}} kyats</h3>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Pricing End -->
 <!-- Pricing Start -->
 <div class="price">
    <div class="container">
        <div class="section-header text-center">
            <p>Click the product for more detail</p>
            <h3>Yanant Essential Oil</h3>
        </div>
        <div class="row">
            @foreach ($essentialoils as $essentialoil)
            <div class="col-lg-3 col-md-4 col-sm-6 pdtmodal" href="#" id="{{$essentialoil->id}}" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ProductModal">
                <div class="price-item">
                    <div class="price-img">
                        <img src="{{asset('images/products/'. $essentialoil->product_pic)}}" alt="Image">
                    </div>
                    <div class="price-text">
                        <h2>{{$essentialoil->name}}</h2>
                        @foreach ($essentialoil->product_detail as $detail)
                        <h3>{{$detail->size}} - {{$detail->price}} kyats</h3>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Pricing End -->
    <div class="modal fade" id="ProductModal" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 100px; padding: 0;">
        <div class="modal-dialog" role="document" style=" border-radius: 50px 50px !important; ">
            <div class="modal-content" style="background: linear-gradient(90deg, rgba(234,201,155,1) 2%, rgba(227,209,182,1) 66%, rgba(234,201,155,1) 100%); border-radius: 20px;">
                <div class="modal-header">
                    <h4 class="modal-title w-100 text-center" id="productName"></h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="info">
                 
                </div>
                <div class="modal-footer">
                        <div style="width: 100%">
                          <p class="text-black">
                           Yanant Myanmarမှ Product​များကို ဝယ်ယူလိုပါက <span class="novi-icon icon icon-xxs icon-primary material-icons-phone"></span> 09 400584721 , <span class="novi-icon icon icon-xxs icon-primary material-icons-phone"></span> 095413225 သို့ဆက်သွယ်စုံစမ်းမှာယူနိုင်ပါတယ်နော်။ Yanant Myanmarရဲ့ <a class="mark text-white" href="https://www.facebook.com/officialyanant?mibextid=ZbWKwL">Official Facebook Page</a> မှလည်း ဝယ်ယူအားပေးနိင်ပါတယ်။<br>
                           Yanant Myanmarရဲ့ဆိုင်ခွဲလေးတွေကို <a href="{{route('frontend.shops')}}" class="link link-primary-inline active font-weight-bold text-underline">ဒီနေရာမှာ</a> ဝင်ရောက်ကြည့်ရှုနိုင်ပါတယ်. </p>
                        </div>
                    {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button> --}}
                </div>
            </div>
            </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function () {
            //show Product modal
            $(document).on('click', '.pdtmodal' ,  function (e) {
                            e.preventDefault();
                            let id = $(this).attr('id');
                            let output = "";
                            // console.log(id);
                            $.ajax({
                                type: "GET",
                                url: "/product_detail",
                                data: {
                                    id : id,
                                    _token : '{{ csrf_token() }}'
                                },
                                dataType: "JSON",
                                success: function (response) {
                                    $("#productName").html(response.name);
                                    // console.log(response);
                                    output += `
                                    <div class="d-flex justify-content-center ">
                                    <img src="{{asset('images/products/${response.product_pic }')}}" alt="" width="200px" height="200px" style="object-fit:contain;">
                                    </div>
                                    <div class="container gap-5">
                                        <p class="d-flex justify-content-between">
                                            <span class="font-weight-bold text-black">Name</span> : <span id="name" class="text-black">${response.name}</span>
                                        </p>
                                        <p class="font-weight-bold text-black">Description : </p>
                                        <p class="text-black">${response.desc}</p>
                                    </div>
                                        <div class="d-flex justify-content-around">
                                    `;
                                    response.product_detail.forEach(detail => {
                                        output += ` <p class="text-black"> ${detail.size} - ${detail.price} kyats</p>`
                                    });
                                    output += `
                                            </div>`
                                    $('#info').html(output);

                                }
                                });
                        });
                });
    </script>
@endsection