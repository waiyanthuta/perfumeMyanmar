@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center">
      <form class="col-sm-6 col-md-6 col-lg-8 col-xl-8 m-4 mx-3 " action="{{route('backend.insert_product')}}" method="post" enctype="multipart/form-data">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <h1 class="text-center ">Add Product Form</h1>
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
                <label class="form-label" for="form6Example1">Product Name</label>
                @error('name')
                  <p class="text-danger font-weight-bold">{{$message}}</p>
                @enderror
                <input type="text" name="name" id="form6Example1" class="form-control" />
              </div>
            </div>

            <div class="m-4">
              <div class="form-outline">
                <label class="form-label" for="form6Example1">Category</label>
                @error('category_id')
                <p class="text-danger font-weight-bold">{{$message}}</p>
                @enderror
                <select name="category_id" class="form-control custom-select" aria-label=".form-select-sm example">
                  <option selected disabled>Choose Category</option>
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="m-4">
                <div class="form-outline">
                  <div class="d-flex justify-content-around">
                    <label class="form-label" for="form6Example1 m-4">Product Size </label>
                    <label class="form-label" for="form6Example1 m-4">Product Price</label>
                  </div>
                  <div class="p-2 d-flex" style="justify-content: center !important">
                    <a class="btn btn-success btn-icon-split btn-md mx-2" onclick="add()"><span class="icon text-white-100"><i class="fas fa-plus"></i></span></a>
                    <a class="btn btn-warning btn-icon-split btn-md mx-2" onclick="remove()"><span class="icon text-white-100"><i class="fas fa-minus"></i></span></a>
                  </div>
                  @error('detail')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                  @enderror
                  <div class="col-12 d-flex mb-2" style="justify-content: space-between !important">
                    <input type="text" name="detail[0][size]" class="form-control col-5" > --
                    <input type="number" name="detail[0][price]" id="form6Example1" class="form-control col-5" />
                  </div>
                  <div id="new_chq">
                  </div>
                  <input type="hidden" value="1" id="total_chq">
                  <script type="text/javascript">
                    let i = 1;
                    function add()
                    {
                      let j = i++;
                      var new_chq_no = parseInt($('#total_chq').val())+1;
                      // console.log(size);
                      var new_input_size = "<div class='col-12 mb-2 d-flex' style='justify-content: space-between !important' id='new_"+new_chq_no+"'>"
                      new_input_size += "<input type='text' name='detail["+ j +"][size]' class='form-control col-5' >";
                      new_input_size += "--";
                      new_input_size +="<input type='number' name='detail["+ j +"][price]' class='form-control col-5' >";
                      new_input_size +="</div>"
                      $('#new_chq').append([new_input_size]);
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

            <!--File Document-->
            <div class="m-4">
              <label class="form-label" for="customFile">Product Picture <span class="text-warning">** prefer photo size with 100x100px **</span></label>
              @error('productpic')
                <p class="text-danger font-weight-bold">{{$message}}</p>
              @enderror
              <input type="file" name="productpic" class="form-control" id="customFile" /> <br>
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