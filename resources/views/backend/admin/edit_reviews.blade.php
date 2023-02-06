@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center">
      <form class="col-sm-6 col-md-6 col-lg-8 col-xl-8 m-4 mx-3 " action="{{route('backend.chg_review',$review)}}" method="post" enctype="multipart/form-data">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <h1 class="text-center ">Edit Review Form</h1>
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
                <label class="form-label" for="form6Example1">Writer Name</label>
                @error('name')
                  <p class="text-danger font-weight-bold">{{$message}}</p>
                @enderror
                <input type="text" name="name" value="{{$review->name}}" id="form6Example1" class="form-control" />
              </div>
            </div>
           
          <div class="card">
            <div class="m-4">
              <div class="form-outline">
                <label class="form-label" for="form6Example1">Writer Job</label>
                @error('job')
                  <p class="text-danger font-weight-bold">{{$message}}</p>
                @enderror
                <input type="text" name="job" id="form6Example1" value="{{$review->job}}" class="form-control" />
              </div>
            </div>
           
          <div class="card">
            <div class="m-4">
              <div class="form-outline">
                <label class="form-label" for="form6Example1">Review Headline</label>
                @error('headline')
                  <p class="text-danger font-weight-bold">{{$message}}</p>
                @enderror
                <input type="text" name="headline" id="form6Example1" value="{{$review->headline}}" class="form-control" />
              </div>
            </div>

            <!-- Text input -->
            <div class="form-outline m-4">
              <label class="form-label" for="form6Example3">Review</label>
              @error('review')
                <p class="text-danger font-weight-bold">{{$message}}</p>
              @enderror
              <textarea name="review" class="form-control" cols="10" rows="3">{{$review->review}}</textarea>
            </div>

            <!--File Document-->
            <div class="m-4">
              <label class="form-label" for="customFile">Author Picture <span class="text-warning">** prefer photo size with 68x68px **</span></label>
              @error('authorpic')
                <p class="text-danger font-weight-bold">{{$message}}</p>
              @enderror
              <input type="file" name="authorpic" class="form-control" id="imgInp" /> <br>
              <img id="authorpic" src="{{asset('images/reviews/'.$review->author_pic)}}" width="68px" height="68px" alt="" style="border-radius: 50px"><br><hr>
            </div>
            <script>
                // dynamic image change javaScript
                  imgInp.onchange = evt => {
                              const [file] = imgInp.files
                              if (file) {
                                  authorpic.src = URL.createObjectURL(file)
                                  authorpic.onload = function() {
                                      URL.revokeObjectURl(authorpic.src)
                                  }}
                          }
            </script>
            <!-- Submit button -->
            <button type="submit" class="btn btn-success btn-block">Update</button>
          </div>
      </form>
    </div>
  </div>
</section>

@include('backend.admin.layouts.footer')
@endsection