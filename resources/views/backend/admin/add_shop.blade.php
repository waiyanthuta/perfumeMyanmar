@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center">
      <form class="col-sm-6 col-md-6 col-lg-8 col-xl-8 m-4 mx-3 " action="{{route('backend.insert_shop')}}" method="post" enctype="multipart/form-data">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <h1 class="text-center ">Add Yanant Shop</h1>
          @if (Session("success"))
          <div class="alert alert-success">
            {{Session('success')}}
          </div>
          @endif
          @if (Session("fail"))
          <div class="alert alert-warning">
            {{Session('fail')}}
          </div>
          @endif
          <div class="card">
          <div class="m-4">
              <div class="form-outline">
                <label class="form-label" for="form6Example1">Shop Name</label>
                @error('name')
                <p class="text-danger font-weight-bold">{{$message}}</p>
                @enderror
                <input type="text" name="name" id="form6Example1" class="form-control" />
              </div>
          </div>
          
          <!-- Text input -->
          <div class="form-outline m-4">
              <label class="form-label" for="form6Example3">Description</label>
              @error('desc')
              <p class="text-danger font-weight-bold">{{$message}}</p>
              @enderror
              {{-- <input type="text" name="desc" id="form6Example3" class="form-control" /> --}}
              <textarea name="desc" id="" class="form-control" cols="10" rows="3"></textarea>
          </div>
      
          <div class="m-4">
              <div class="form-outline">
                <label class="form-label" for="form6Example1">Shop Location</label>
                @error('location')
                <p class="text-danger font-weight-bold">{{$message}}</p>
                @enderror
                <input type="text" name="location" id="form6Example1" class="form-control" />
              </div>
          </div>
      
          <!--File Document-->
          <div class="m-4">
          <label class="form-label" for="customFile">Shop Picture</label>
          @error('shoppic')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <p class="text-warning">** prefer photo size with 570x386px **</p>
          <input type="file" name="shoppic" class="form-control" id="customFile" /> <br>
          </div>
      
          <!-- Submit button -->
          <button type="submit" class="btn btn-success btn-block">Create</button>
          </div>
      </form>
    </div>
  </div>
</section>
@include('backend.admin.layouts.footer')
@endsection
