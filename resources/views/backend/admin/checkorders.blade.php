@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

                <div class="container">
                    @foreach ($orders as $order)
                        
                    <form action="{{route('backend.admin.confirm_odr',$order->id)}}" method="POST">@csrf
                    <div class="row justify-content-between p-2">
                        <div class="card col-lg-7 col-md-6">
                            <h4 class="card-header mb-4 ps-3">Billing details</h4>
                            <div class="card-body billing_form">
                                <div class="row">
                                    <!-- single input  -->
                                    <div class="col-lg-4">
                                        <p class="single_billing_inp">
                                            <label for="first_name">Name </label>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" id="first_name" name="name" value="{{$order->name}}" disabled style="width: 100%;">
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <p class="single_billing_inp">
                                            <label for="first_name">Company Name</label>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" id="first_name" name="companyname" value="{{$order->companyname}}" disabled style="width: 100%;">
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <p class="single_billing_inp">
                                            <label for="first_name">Street Address </label>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" id="first_name" name="street_adr" value="{{$order->street_adr}}" disabled style="width: 100%;">
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <p class="single_billing_inp">
                                            <label for="first_name">Town/City </label>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" id="first_name" name="towncity" value="{{$order->towncity}}" disabled style="width: 100%;">
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <p class="single_billing_inp">
                                            <label for="first_name">Phone Number</label>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" id="first_name" name="phno" value="{{$order->phno}}" disabled style="width: 100%;">
                                    </div>
                                    
                                    <!-- single input  -->
                                    <div class="col-lg-4">
                                        <p class="single_billing_inp">
                                            <label for="first_name">Email Address</label>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="email" id="email" name="email" value="{{$order->email}}" disabled style="width: 100%;">
                                    </div>

                                    <div class="col-lg-4">
                                        <p class="single_billing_inp">
                                            <label for="first_name">Banking Address</label>
                                        </p>
                                    </div>
                                    <div class="col-lg-8 my-2">
                                        <input type="email" id="email" name="email" value="{{$order->bank->name}}" disabled style="width: 100%;">
                                        <input type="email" id="email" name="email" value="{{$order->bank->account}}" disabled style="width: 100%;">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="first_name">Product Status</label>
                                    </div>
                                    <div class="col-lg-8">
                                        @if($order->status === 'confirm')
                                                            <span class="badge badge-pill badge-info text-center p-2">Confirm</span>
                                        @elseif ($order->status === 'reject') 
                                                            <span class="badge badge-pill badge-danger text-center p-2">Reject</span>
                                        @else
                                                            <span class="badge badge-pill badge-warning text-center p-2">Pending</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <!-- order information wrapper  -->
                        <div class="card col-xl-4 col-lg-5 col-md-6">
                            <h4 class="card-header ps-3">Order Details</h4>
                            @foreach ($order->checkproduct as $item)   
                            <div class="checkout_order mt-4">
                                {{-- <h4 class="font-weight-bold">Product</h4> --}}
                                <!-- single product info  -->
                                <div class="single_check_order">
                                    <div class="">
                                        <h6 class="d-inline-block font-weight-bold">{{$item->name}}</h6>
                                        <p class="float-right">{{number_format($item->price, 2, '.', ',')}} kyats</p>
                                        <p class="float-right mx-4">x {{$item->pivot->quantity}}</p>
                                    </div>
                                </div>
                                
                                @if ($item)
                                    <hr>
                            @endif
                                <!-- subtotal  -->
                                <div class="single_check_order subs">
                                    <div class="checkorder_cont subtotal-h d-flex justify-content-between col-12 p-0 ">
                                        <h5 class="font-weight-bold">Subtotal</h5>
                                        <p class="checkorder_price">{{number_format($item->pivot->quantity * $item->price)}} kyats</p>
                                    </div>
                                </div>
                                <!-- shipping  -->
                                <div class="single_check_order subs">
                                    <div class="checkorder_cont subtotal-h d-flex justify-content-between col-12 p-0">
                                        <h5 class="font-weight-bold">Shipping</h5>
                                        <p class="checkorder_price">Free</p>
                                    </div>
                                    <hr>
                                </div>
                                <!-- total  -->
                                <div class="single_check_order total">
                                    <div class="d-flex justify-content-between col-12 p-0">
                                        <h5 class="font-weight-bold">Total</h5>
                                        <p class="t">{{number_format($item->pivot->quantity * $item->price)}} kyats</p>
                                    </div>
                                </div>
                                @endforeach
                                <!-- button  -->
                                <div class="m-3 text-center">
                                    @if($order->status === 'pending')
                                        <button class="btn btn-success" >Confirm Order </button>
                                        <a class="btn btn-danger" href="{{route('backend.admin.orderrej',$order->id)}}">Reject Order</a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            </form>
                            @endforeach
            </div>
            <a href="{{route('backend.admin.orders')}}" class="btn btn-dark m-4">Back</a>
@include('backend.admin.layouts.footer')
@endsection
