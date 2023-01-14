@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

<form class="col-md-8 m-4 mx-3 " action="{{route('backend.admin.postadd_agents')}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <h1 class="text-center ">Add Agent</h1>
    @if (Session("success"))
    <div class="alert alert-success">
      {{Session('success')}}
    </div>
    @endif
    <div class="card">
    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Name</label>
          @error('name')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="text" name="name" id="form6Example1" class="form-control" />
        </div>
    </div>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Email Address</label>
          @error('email')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="email" name="email" id="form6Example1" class="form-control" />
        </div>
    </div>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Phone number</label>
          @error('phno')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="number" name="phno" id="form6Example1" class="form-control" />
        </div>
    </div>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Password</label>
          @error('password')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="text" name="password" id="form6Example1" class="form-control" />
        </div>
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-warning btn-block">Create</button>
    </div>
  </form>


@include('backend.admin.layouts.footer')
@endsection