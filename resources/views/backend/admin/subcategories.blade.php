@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid d-flex justify-content-center">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 col-8">
                        <div class="card-header d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary mt-3">Sub Categories Table</h6>
                            <a href="{{route('backend.admin.add_subcategories')}}" class="btn btn-info" >Add+</a>    
                        </div>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sub Category</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($subcategories as $subcategory)
                                        {{-- {{dd($product->category->name)}} --}}
                                        <tr>
                                            <td>{{$subcategory->name}}</td>
                                            <td>{{$subcategory->category->name}}</td>
                                            <td class="d-flex gap-2 justify-content-around">
                                                <a href="{{route('backend.admin.edit_subcategories',$subcategory)}}" class="btn btn-info" >Edit</a>
                                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteSubCatModal">Delete</a>       
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3">Add Category</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                {{-- delete category modal --}}
                <div class="modal fade" id="deleteSubCatModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="exampleModalLabel">Delete this Sub-Category?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body ">Are you sure you want to delete this sub-category?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger" href="{{route('backend.admin.delete_subcategories',$subcategory->id??'null')}}">Yes</a>
                            </div>
                        </div>
                        </div>
                </div>


@include('backend.admin.layouts.footer')
@endsection