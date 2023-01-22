@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Products Table</h6>
                            @if (Session("success"))
                            <div class="alert alert-success">
                                {{Session('success')}}
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product Pic</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Desc</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        {{-- {{dd($product->product_detail)}} --}}
                                        <tr>
                                            <td><img src="{{asset('images/products/'.$product->product_pic)}}" width="75px" height="50px" alt=""></td>
                                            <td>{{$product->name}}</td>
                                            {{-- <td>{{$product->product_detail->category_id}}</td> --}}
                                            <td>{{$product->desc}}</td>
                                            <td><a href="" class="btn btn-info">Edit</a></td>
                                            <td>
                                               <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteProductModal">Delete</a>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- delete product modal --}}
                <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Product?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body ">Are you sure you want to delete this product?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <form action="/backend/admin/delete_products/{{$product->id??'null'}}" method="POST">@method('delete')
                                    <button class="btn btn-danger" type="submit">Yes</button>
                                </form>>
                            </div>
                        </div>
                        </div>
                </div>
                <!-- /.container-fluid -->
@include('backend.admin.layouts.footer')
@endsection