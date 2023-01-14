@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

<form class="col-md-8 m-4 mx-3 " style="display: inline-block; margin-left: 200px !important; " action="{{route('backend.admin.post_addproducts')}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <h1 class="text-center ">Add Product Form</h1>
    @if (Session("success"))
    <div class="alert alert-success">
      {{Session('success')}}
    </div>
    @endif
    <div class="card">
    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Product Name</label>
          @error('name')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="text" name="name" id="form6Example1" class="form-control" />
        </div>
    </div>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Catgory</label>
          @error('category_id')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <select class="form-control" name="category_id" id="main_category">
            <option value="" disabled selected>Choose One</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
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
            <option value="" disabled selected>Choose Category First</option>
            {{-- @foreach ($subcategories as $subcategory)
            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
            @endforeach --}}
          </select>
        </div>
    </div>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Price</label>
          @error('price')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="number" name="price" id="form6Example1" class="form-control" />
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

    <!--File Document-->
    <div class="m-4">
    <label class="form-label" for="customFile">Product Picture</label>
    @error('productpic')
    <p class="text-danger font-weight-bold">{{$message}}</p>
    @enderror
    <input type="file" name="productpic" class="form-control" id="customFile" /> <br>
    </div>

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
    <button type="submit" class="btn btn-warning btn-block">Create</button>
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
        $('#sub_category').html(subCategory);
        $("#sub_category").attr('disabled', 'true');
      }
    });


  });
  </script>
@include('backend.admin.layouts.footer')
@endsection
