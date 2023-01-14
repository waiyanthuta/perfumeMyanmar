@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

{{-- {{dd($product->id)}} --}}
<form class="col-md-6 m-4 mx-4 " style="display: inline-block; margin-left: 400px !important; " action="{{route('backend.admin.postedit_subcategories',$subcategory)}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <h1 class="text-center ">Update Category Form</h1>
    <div class="card">
        <div class="m-4">
            <div class="form-outline">
              <label class="form-label" for="form6Example1">Sub Category Name</label>
              @error('name')
              <p class="text-danger font-weight-bold">{{$message}}</p>
              @enderror
              
              <input type="text" name="name" id="form6Example1" class="form-control" value="{{$subcategory->name}}" autofocus/>
            </div>
        </div>

        <div class="m-4">
            <div class="form-outline">
              <label class="form-label" for="form6Example1">Catgory</label>
              @error('category_id')
              <p class="text-danger font-weight-bold">{{$message}}</p>
              @enderror
              <select class="form-control" name="category_id">
                @foreach ($categories as $category)
                <option value="{{$category->id}}"@if($category->id == $subcategory->category->id) selected @endif >{{$category->name}}</option>
                @endforeach
              </select>
            </div>
        </div>
        
    <!-- Submit button -->
    <button type="submit" class="btn btn-warning" >Update</button>
    </div>
  </form>
@include('backend.admin.layouts.footer')
@endsection
