@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Yanant Perfume Table</h6>
                        </div>
                        @if (Session("success"))
                        <div class="alert alert-success">
                        {{Session('success')}}
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Perfume Pic</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Desc</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perfumes as $perfume)
                                        <tr>
                                            <td>
                                                <img src="{{asset('images/perfumes/'.$perfume->perfume_pic)}}" width="75px" height="100%" alt="">
                                            </td>
                                            <td>{{$perfume->name}}</td>
                                            <td>{{$perfume->category}}</td>
                                            {{-- <td>{{number_format($perfume->perfume_detail->price, 2, '.', ',')}}</td>
                                            <td>{{$perfumeDetail->perfume_size->size}}</td> --}}
                                            <td> <textarea name="" id="" cols="10" rows="2" disabled width="100%" style="resize: horizontal!important">{{$perfume->desc}}</textarea> </td>
                                            <td><a href="{{route('backend.view_perfume',$perfume)}}" class="btn btn-info">View</a></td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteUniPerfumeModal">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Delete</span>
                                                </a>
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
                <div class="modal fade" id="deleteUniPerfumeModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="exampleModalLabel">Delete This Perfume?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body ">Are you sure you want to delete this perfume?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <form action="{{route('backend.del_perfume',$perfume->id??'null')}}" method="POST">@csrf
                                    <button class="btn btn-danger" type="submit">Yes</button>
                                </form>
                            </div>
                        </div>
                        </div>
                </div>
                <!-- /.container-fluid -->
@include('backend.admin.layouts.footer')
@endsection