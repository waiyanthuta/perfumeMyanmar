@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @if (Session("success"))
                    <div class="alert alert-success">
                      {{Session('success')}}
                    </div>
                    @endif
                    @if (Session("fail"))
                        <div class="alert alert-danger">
                        {{Session('fail')}}
                        </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary ">Index Banner</h6>
                            <a href="{{route('backend.admin.add_indexBanner')}}" class="btn btn-info" >Add+</a>    
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Banner Pic</th>
                                            <th>Header</th>
                                            <th>New Price</th>
                                            <th>Previous Price</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banners as $banner)
                                        <tr>
                                            <td><img src="{{asset('images/bannerpics/'.$banner->banner_pic)}}" width="100px" height="100px" alt=""></td>
                                            <td>{{$banner->header_name}}</td>
                                            <td>{{$banner->new_price}}</td>
                                            <td>{{$banner->prev_price}}</td>
                                            <td>{{$banner->desc}}</td>
                                            <td>@if($banner->status === 1)
                                                <span class="badge badge-pill badge-info text-center">Use</span>
                                            @else
                                                <span class="badge badge-pill badge-warning text-center">Unuse</span>
                                            @endif</td>
                                            <td><a href="{{route('backend.admin.edit_indexBanner',$banner)}}" class="btn btn-info">Edit</a></td>
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
                            <div class="modal-body ">Are you sure you want to delete this banner?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <form action="/backend/admin/delete_index_banner/{{$banner->id??'null'}}" method="POST">@csrf
                                    <button class="btn btn-danger" type="submit">Yes</button>
                                </form>
                            </div>
                        </div>
                        </div>
                </div>
                <!-- /.container-fluid -->
@include('backend.admin.layouts.footer')
@endsection