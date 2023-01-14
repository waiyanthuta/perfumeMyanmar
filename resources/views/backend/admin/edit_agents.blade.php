@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

<form class="col-md-8 m-4 mx-3 " action="{{route('backend.admin.postedit_agents',$agent->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <h1 class="text-center ">Edit Agent</h1>
    @if (Session("success"))
    <div class="alert alert-success">
      {{Session('success')}}
    </div>
    @endif
    <div class="card">
    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Name</label>
          <input type="text" name="name" id="form6Example1" class="form-control"  value="{{$agent->name}}"/>
        </div>
    </div>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Email Address</label>
          <input type="email" name="email" id="form6Example1" class="form-control" value="{{$agent->email}}"/>
        </div>
    </div>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Phone number</label>
          <input type="number" name="phnumber" id="form6Example1" class="form-control" value="{{$agent->phnumber}}"/>
        </div>
    </div>

    <!-- Submit button -->
    <div class="d-flex justify-content-center ">
        <button type="submit" class="btn btn-warning m-3">Update</button>
        <a href="{{route('backend.admin.delete_agents',$agent->id)}}" class="btn btn-danger m-3">Delete</a>
    </div>
    </div>
  </form>
@include('backend.admin.layouts.footer')
@endsection