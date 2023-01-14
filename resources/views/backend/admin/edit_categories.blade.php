@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

{{-- {{dd($product->id)}} --}}
<form class="col-md-6 m-4 mx-4 " style="display: inline-block; margin-left: 400px !important; " action="{{route('backend.admin.postedit_categories',$category)}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <h1 class="text-center ">Update Category Form</h1>
    <div class="card">
    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Category Name</label>
          @error('name')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          
          <input type="text" name="name" id="form6Example1" class="form-control" value="{{$category->name}}" autofocus/>
        </div>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-warning" >Update</button>
    </div>
  </form>
@include('backend.admin.layouts.footer')
@endsection
