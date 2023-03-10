@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

<form action="{{route('backend.admin.postadd_indexBanner')}}" class="col-md-8 m-4 mx-4 " style="display: inline-block; margin-left: 200px !important; " method="post" enctype="multipart/form-data">
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
            <img id="bannerpf" height="100px" width="100px">
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
          <input type="text" name="header" id="form6Example1" class="form-control" />
        </div>
    </div>

    <div class="m-4">
      <div class="form-outline">
        <label class="form-label" for="form6Example1">Product</label>
        @error('product_id')
        <p class="text-danger font-weight-bold">{{$message}}</p>
        @enderror
        <select class="form-control" name="product_id" id="product">
          <option value="" disabled selected>Choose One</option>
          @foreach ($products as $product)
          <option value="{{$product->id}}">{{$product->name}}</option>
          @endforeach
        </select>
      </div>
  </div>
    
    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Previous Price</label>
          @error('prev_price')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="number" name="prev_price" id="product_price" class="form-control" disabled/>
        </div>
    </div>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">New Price</label>
          @error('new_price')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="number" name="new_price" id="form6Example1" class="form-control" />
        </div>
    </div>

    <!-- Text input -->
    <div class="form-outline m-4">
        <label class="form-label" for="form6Example3">Description</label>
        @error('desc')
        <p class="text-danger font-weight-bold">{{$message}}</p>
        @enderror
        <input type="text" name="desc" id="form6Example3" class="form-control" />
      </div>
  

    <!-- Submit button -->
    <button type="submit" class="btn btn-success btn-block">Create</button>
    </div>
  </form>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#product").change(function (e) { 
        e.preventDefault();
        if($(this).val()!= ''){
          var product = $(this).val();
          $.ajax({
            type: "get",
            url: "{{ route('fetchProduct') }}",
            data: {product},
            dataType: "json",
            success: function (response) {
              // console.log(response.product.price);
              if(response.product){
                var product_price = response.product.price;
                $('#product_price').removeAttr('disabled');
                $('#product_price').val(product_price);
              }
            }
          });
        }
      });
    })
  </script>
  
@include('backend.admin.layouts.footer')
@endsection