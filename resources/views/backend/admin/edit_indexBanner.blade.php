@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

<form action="{{route('backend.admin.postedit_indexBanner',$banner)}}" class="col-md-8 m-4 mx-4 " style="display: inline-block; margin-left: 200px !important; " method="post" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <h1 class="text-center ">Add Banner</h1>
    <div class="card">
        <div class="m-4">
            <div class="form-outline">
                <label class="form-label" for="form6Example1">Banner Pic</label><br>
                <span class="text-warning">**image must be the size of 400x280 size</span>
                @error('banner_pic')
                <p class="text-danger font-weight-bold">{{$message}}</p>
                @enderror
                <input type="file" id="imgInp" name="banner_pic" id="form6Example1" class="form-control" />
            </div>
            <img src="{{asset('images/bannerpics/'.$banner->banner_pic)}}" width="100px" height="100px" class="m-3 " alt="">
            <img id="bannerpf" height="100px" width="100px" class="m-3">
        </div>
        <script>
            imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                bannerpf.src = URL.createObjectURL(file)
                bannerpf.onload = function() {
                    URL.revokeObjectURl(bannerpf.src)
                }
            }
                                      }
        </script>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Header Name</label>
          @error('header')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="text" name="header" value="{{$banner->header_name}}" id="form6Example1" class="form-control" />
        </div>
    </div>
    
    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Previous Price</label>
          @error('prev_price')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="number" name="prev_price" value="{{$banner->prev_price}}" id="product_price" class="form-control" disabled/>
        </div>
    </div>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">New Price</label>
          @error('new_price')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="number" name="new_price" value="{{$banner->new_price}}" id="form6Example1" class="form-control" />
        </div>
    </div>

    <!-- Text input -->
    <div class="form-outline m-4">
        <label class="form-label" for="form6Example3">Description</label>
        @error('desc')
        <p class="text-danger font-weight-bold">{{$message}}</p>
        @enderror
        <input type="text" name="desc" id="form6Example3" value="{{$banner->desc}}" class="form-control" />
    </div>
  
    <div class="form-row form-outline m-4">
        <div class="form-group col-md-12">
            <label for="use" name="use">
               <span>Use:</span><input type="radio" name="status" value="1" {{ ($banner->status==1)? "checked" : "" }}>
           </label>
            <label for="unuse" name="unuse">
               <span>Unuse:</span><input type="radio" name="status" value="0" {{ ($banner->status==0)? "checked" : "" }}>
           </label>
        </div>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-success btn-block">Update</button>
    </div>
  </form>
  
@include('backend.admin.layouts.footer')
@endsection