@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @if (Session("reject"))
                    <div class="alert alert-success">
                      {{Session('reject')}}
                    </div>
                    @endif
                    @if (Session("update"))
                        <div class="alert alert-success">
                        {{Session('update')}}
                        </div>
                    @endif
                    @if (Session("pending"))
                        <div class="alert alert-warning">
                        {{Session('pending')}}
                        </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Order Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            {{-- <th>Products</th> --}}
                                            <th>Company Name</th>
                                            <th>Street Address</th>
                                            <th>Town/City</th>
                                            <th>Ph No.</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Banking Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>{{$order->name}}</td>
                                            {{-- <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <span>See Products</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @foreach ($order->checkproduct as $item)
                                                        <p class="dropdown-item">{{$item->name}}</p>                             
                                                        @endforeach
                                                    </div>
                                            </td> --}}
                                            <td>{{$order->companyname}}</td>
                                            <td>{{$order->street_adr}}</td>
                                            <td>{{$order->towncity}}/04/25</td>
                                            <td>{{$order->phno}}</td>
                                            <td>{{$order->email}}</td>
                                            <td>
                                                @if($order->status === 'confirm')
                                                            <span class="badge badge-pill badge-info text-center">Confirm</span>
                                                        @elseif ($order->status === 'reject') 
                                                            <span class="badge badge-pill badge-danger text-center">Reject</span>
                                                        @else
                                                            <span class="badge badge-pill badge-warning text-center">Pending</span>
                                                        @endif
                                            </td>
                                            <td>{{$order->bank->name}}</td>
                                            <td>
                                                        <a href="{{route('backend.admin.check_odr',$order->id)}}" class="btn btn-info btn-sm btn-icon mx-4">
                                                            Order Details
                                                        </a>
                                                            {{-- <a class="dropdown-item text-center" href="{{route('backend.seller.orderdel',$order->id)}}">Remove Order</a> --}}
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@include('backend.admin.layouts.footer')
@endsection