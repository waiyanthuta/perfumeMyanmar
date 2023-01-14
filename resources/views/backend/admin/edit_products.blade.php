@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

{{-- {{dd($product->id)}} --}}
<form class="col-md-8 m-4 mx-3 " style="display: inline-block; margin-left: 200px !important; " action="{{route('backend.admin.postedit_products',$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <h1 class="text-center ">Update Product Form</h1>
    @if (Session("success"))
    <div class="alert alert-success">
      {{Session('success')}}
    </div>
    @endif
    @if (Session("fail"))
    <div class="alert alert-danger">
      {{Session('fail')}}
    </div>
    @endif
    <div class="card">
      <div class="m-4">
          <div class="form-outline">
            <label class="form-label" for="form6Example1">Product Name</label>
            @error('name')
            <p class="text-danger font-weight-bold">{{$message}}</p>
            @enderror
            <input type="text" name="name" id="form6Example1" class="form-control" value="{{$product->name}}" autofocus/>
          </div>
      </div>

      <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Catgory</label>
          @error('category_id')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <select class="form-control" name="category_id" id="main_category">
            <option value="" disabled>Choose One</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif >{{$category->name}}</option>
            @endforeach
          </select>
        </div>
    </div>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Sub Catgory</label>
          @error('subcategory_id')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <select class="form-control" name="subcategory_id" id="sub_category">
            <option value="" disabled selected>Choose One</option>
            @foreach ($product_category->subcategory as $subcategory)
            <option value="{{$subcategory->id}}" @if($subcategory->id == $product->subcategory_id) selected @endif >{{$subcategory->name}}</option>
            @endforeach
          </select>
        </div>
    </div>

    <div class="m-4">
      <div class="form-outline">
        <p class="font-weight-bold">Availability :</p>
          <div>
          <input type="radio" id="" name="availability" value="outstock"
          {{ ($product->availability==="outstock")? "checked" : "" }}>
          <label for="outstock">Out Stock</label>

          <input type="radio" id="" name="availability" value="instock"
          {{ ($product->availability==="instock")? "checked" : "" }}>
          <label for="instock">Instock</label>

          <input type="radio" id="" name="availability" value="nostock"
          {{ ($product->availability==="nostock")? "checked" : "" }}>
          <label for="nostock">No Stock</label>
          </div>
      </div>
    </div>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Price</label>
          @error('price')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="number" name="price" id="form6Example1" class="form-control" value="{{ $product->price}}"/>
        </div>
    </div>

    <!-- Text input -->
    <div class="form-outline m-4">
      <label class="form-label" for="form6Example3">Description</label>
      @error('desc')
      <p class="text-danger font-weight-bold">{{$message}}</p>
      @enderror
      <input type="text" name="desc" id="form6Example3" class="form-control" value="{{ $product->desc }}"/>
    </div>

    <!--File Document-->
    <div class="m-4">
    <label class="form-label" for="customFile">Product Picture</label>
    @error('productpic')
    <p class="text-danger font-weight-bold">{{$message}}</p>
    @enderror
    <img src="{{asset('images/productpics/'.$product->productpic)}}" width="150px" height="105px" alt="">
    <input type="file" name="productpic" class="form-control" id="customFile"/> <br>
    </div>

    <!--File Document-->
    {{-- {{dd($product->descimg);}} --}}
    <label class="form-label" for="DescPic">Edit Description Picture</label>
    <div class="m-4">
      @if(count($product->descimg)>0)
      @foreach ($product->descimg as $desc)
      <a href="{{route("backend.admin.delete_descimages",$desc->id)}}" class="btn btn-danger">X</a>
      <img src="{{asset('images/description_images/'.$desc->descpic)}}" width="150px" height="105px" alt="">
      <br>
      @endforeach
      @endif
    </div>
  @error('descimg')
  <p class="text-danger font-weight-bold">{{$message}}</p>
  @enderror
    <div class="form-outline m-4">
      <a class="btn btn-primary btn-icon-split p-2 btn-sm" onclick="add()">Add Description Image</a>
      <a class="btn btn-primary btn-icon-split p-2 btn-sm" onclick="remove()">Remove Description Image</a>
      <div id="new_chq"></div>
      <input type="hidden" value="1" id="total_chq">
    <script>
      function add()
      {
        var new_chq_no = parseInt($('#total_chq').val())+1;
        var new_input="<input type='file' name='descimg[]' id='new_"+new_chq_no+"'>";
        $('#new_chq').append(new_input);
        $('#total_chq').val(new_chq_no)
      }
      function remove()
      {
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
      }
    </script>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-warning btn-block">Update</button>
    </div>
  </form>


  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script>
    $(document).ready(function () {
    $('#main_category').change(function (e) {
      e.preventDefault();
      if($(this).val()!= ''){
        var select=$(this).val();
        var subCategory='';
        console.log(select);
        $.ajax({
          type: "get",
          url: '{{ route('fetchSubCategory') }}',
          data: {select :select },
          dataType: "json",
          success: function (response) {
            console.log(response);
            if(response.subCategories.length !== 0){
              $.each(response.subCategories, function (key, item) {
                subCategory +=`<option value="${item.id}"> ${item.name}</option>`
              });
              $('#sub_category').removeAttr('disabled');
              $('#sub_category').html(subCategory);
            }else{
              var subCategory =`<option value=""> There's no sub-category for that category!</option>`;
              $('#sub_category').html(subCategory);
              $('#sub_category').attr('disabled', 'true');
            }
          }
        })
      }
      else{
        var subCateogry =`<option value=""> </option>`;
        console.log(subCategory)
        $('.businessZone').html(subCategory);
        $(".businessZone").attr('disabled', 'true');
      }
    });


  });
  </script>
@include('backend.admin.layouts.footer')
@endsection
