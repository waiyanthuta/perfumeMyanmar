@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center">
      <form class="col-sm-6 col-md-6 col-lg-8 col-xl-8 m-4 mx-3 " action="{{route('backend.chg_product',$product)}}" method="post" enctype="multipart/form-data">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <h1 class="text-center ">Edit Product Form</h1>
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
                <input type="text" name="name" id="form6Example1" value="{{$product->name}}" class="form-control" />
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
                  <option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif >{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
          </div>

          <div class="m-4">
              <div class="form-outline">
                <label class="form-label" for="form6Example1 m-4">Perfume Size and Price</label>
                @error('size')
                <p class="text-danger font-weight-bold">{{$message}}</p>
                @enderror
                @error('price')
                <p class="text-danger font-weight-bold">{{$message}}</p>
                @enderror

                @foreach ($product->product_detail as $key => $detail)  
                <div class="col-12 d-flex mb-2" style="justify-content: space-between !important">
                    <input type="text" value="{{$detail->size}}" name="detail[{{$key}}][size]" class="form-control col-5" > --
                    <input type="number" value="{{$detail->price}}" name="detail[{{$key}}][price]" id="form6Example1" class="form-control col-5" />
                </div>
                @endforeach
                <div class="p-2 d-flex" style="justify-content: flex-start !important">
                  <a class="btn btn-success btn-icon-split btn-md mx-2" onclick="add()"><span class="icon text-white-100"><i class="fas fa-plus"></i></span></a>
                  <a class="btn btn-warning btn-icon-split btn-md mx-2" onclick="remove()"><span class="icon text-white-100"><i class="fas fa-minus"></i></span></a>
                </div>
                <div id="new_chq">
                </div>
                <input type="hidden" value="1" id="total_chq">
                <script type="text/javascript">
                  let i = <?php echo count($product->product_detail)+1 ;?>;
                  function add()
                  {
                    let j = i++;
                    var new_chq_no = parseInt($('#total_chq').val())+1;
                    var new_input_size = "<div class='col-12 mb-2 d-flex' style='justify-content: space-between !important' id='new_"+new_chq_no+"'>"
                    new_input_size += "<input type='text' name='detail["+ j +"][size]' class='form-control col-5' >";
                    new_input_size += "--";
                    new_input_size +="<input type='number' name='detail["+ j +"][price]' class='form-control col-5' >";
                    // new_input_size +="<a class='btn btn-danger btn-icon-split p-2 btn-sm mx-2' ><span class='icon text-white-100'><i class='fas fa-trash'></i></span></a>";
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
            <textarea name="desc" id="" class="form-control" cols="10" rows="3">{{$product->desc}}</textarea>
          </div>

          <!--File Document-->
          <div class="m-4">
          <label class="form-label" for="customFile">Product Picture</label>
          @error('productpic')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <p class="text-warning">** prefer photo size with 246x300px **</p>
          <input type="file" id="imgInp" name="productpic" class="form-control" id="customFile" /> <br>
          <img id="productpic" src="{{asset('images/products/'.$product->product_pic)}}" width="246px" height="100%" alt=""><br><hr>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-success btn-block">Update</button>
          </div>
      </form>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script>
    // dynamic image change javaScript
      imgInp.onchange = evt => {
                  const [file] = imgInp.files
                  if (file) {
                      productpic.src = URL.createObjectURL(file)
                      productpic.onload = function() {
                          URL.revokeObjectURl(productpic.src)
                      }}
              }
  </script>
@include('backend.admin.layouts.footer')
@endsection
