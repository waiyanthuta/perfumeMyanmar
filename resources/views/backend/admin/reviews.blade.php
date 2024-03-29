@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Reviews Table</h6>
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
                                            <th>Author Pic</th>
                                            <th>Name</th>
                                            <th>Job</th>
                                            <th>HeadLine</th>
                                            <th>reviews</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                        {{-- {{dd($review->review_detail)}} --}}
                                        <tr>
                                            <td><img src="{{asset('images/reviews/'.$review->author_pic)}}" width="65px" height="65px" style="border-radius: 50%" alt=""></td>
                                            <td>{{$review->name}}</td>
                                            <td>{{$review->job}}</td>
                                            <td>{{$review->headline}}</td>
                                            <td><textarea cols="10" rows="5"n disabled>{{$review->review}}</textarea></td>
                                            <td><a href="{{route('backend.edit_review',$review)}}" class="btn btn-info">Edit</a></td>
                                            <td>
                                               <a href="" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteReviewModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span> <span class="text">Delete</span></a>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- delete review modal --}}
                <div class="modal fade" id="deleteReviewModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="exampleModalLabel">Delete This Review?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body ">Are you sure you want to delete this review?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <form action="{{route('backend.del_review',$review->id??'null')}}" method="POST">@csrf
                                    <button class="btn btn-danger" type="submit">Yes</button>
                                </form>
                            </div>
                        </div>
                        </div>
                </div>
                <!-- /.container-fluid -->
@include('backend.admin.layouts.footer')
@endsection