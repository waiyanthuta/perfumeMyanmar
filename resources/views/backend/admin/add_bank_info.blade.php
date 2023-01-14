@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

<form class="col-md-8 m-4 mx-3 " action="{{route('backend.admin.postadd_banks_info')}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <h1 class="text-center ">Add Bank Information</h1>

    <div class="card">

    <!--File Document-->
    <div class="m-4">
        <label class="form-label" for="customFile">Bank Profile</label>
        @error('bankprofile')
        <p class="text-danger font-weight-bold">{{$message}}</p>
        @enderror
        <input type="file" id="imgInp" name="bankprofile" class="form-control" id="customFile" /> <br>
        <img id="bankpf" height="100px" width="100px">
        </div>
        <script>
            imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                bankpf.src = URL.createObjectURL(file)
                bankpf.onload = function() {
                    URL.revokeObjectURl(bankpf.src)
                }
            }
                                      }
        </script>
        
    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Bank Name</label>
          @error('name')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="text" name="name" id="form6Example1" class="form-control" />
        </div>
    </div>

    <div class="m-4">
        <div class="form-outline">
          <label class="form-label" for="form6Example1">Bank Account</label>
          @error('account')
          <p class="text-danger font-weight-bold">{{$message}}</p>
          @enderror
          <input type="text" name="account" id="form6Example1" class="form-control" />
        </div>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block">Add</button>
    </div>
  </form>
@include('backend.admin.layouts.footer')
@endsection