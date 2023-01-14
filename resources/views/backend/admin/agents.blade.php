@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container">
                    @if (Session("success"))
                    <div class="alert alert-success">
                      {{Session('success')}}
                    </div>
                    @endif
                    @if (Session("delete"))
                    <div class="alert alert-danger">
                      {{Session('delete')}}
                    </div>
                    @endif
                    @if (Session("update"))
                    <div class="alert alert-success">
                      {{Session('update')}}
                    </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Agents Table</h6>
                            <a class="m-0 font-weight-bold btn btn-info" href="{{route('backend.admin.add_agents')}}">Add Sellers</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Ph No.</th>
                                            <th>Edit Info</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @foreach ($agents as $agent)
                                        <tr>
                                            <td>{{$agent->name}}</td>
                                            <td>{{$agent->email}}</td>
                                            <td>{{$agent->phnumber}}</td>
                                            <td class="text-center">
                                                <a href="{{route('backend.admin.edit_agents',$agent->id)}}" class="btn btn-info ">Edit</a>
                                                <a href="{{route('backend.admin.chgpw_agents',$agent->id)}}" class="btn btn-success ">Change Pasword</a>
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