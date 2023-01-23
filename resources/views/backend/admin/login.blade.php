@extends('backend.admin.layouts.master')
@section('content')

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="{{asset('images/logo.jpg')}}" width="500px" height="440px" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Yanant Admin!</h1>
                                    </div>
                                    <form class="user" action="{{route('backend.login')}}" method="POST">
                                        @csrf
                                        @if (Session("fails"))
                                        <div class="alert alert-danger">
                                          {{Session('fails')}}
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" value="{{ old('email') }}">
                                                @error('email')
                                                <p class="text-danger" style="font-weight: bold">{{$message}}</p>
                                                @enderror                     
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" value="{{ old('password') }}">
                                                @error('password')
                                                <p class="text-danger" style="font-weight: bold">{{$message}}</p>
                                                @enderror 
                                        </div>
                                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        <hr>
                                    </form>
                                    <hr>
                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> --}}
                                    {{-- <div class="text-center">
                                        <a class="small" href="{{route('backend.admin.register')}}">Create an Account!</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection