@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

                <div class="container col-md-8">
                    <form  method="POST" action="{{ route('backend.admin.chgpw_agentspost',$agent->id) }}">
                    <div class="card m-4 mx-3">
                        @csrf
                    <h2>Change password</h2>

                        <div class="m-4">
                            <div class="form-outline">
                              <label class="form-label" for="form6Example1">Password</label>
                            @error('password')
                            <p class="text-danger font-weight-bold">{{$message}}</p>
                            @enderror
                              <input type="text" name="password" id="form6Example1" class="form-control"/>
                            </div>
                        </div>
                        <div class="m-4">    
                            <div class="form-outline">
                                <label class="form-label" for="Cpassword">Confirm Password</label>
                            @error('password_confirmation')
                            <p class="text-danger font-weight-bold">{{$message}}</p>
                            @enderror
                                <input type="text" name="password_confirmation" id="Cpassword" class="form-control"/>
                            </div>
                        </div>
                    
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-warning m-3">Update</button>
                    </div>
                    </form>
                </div>
@include('backend.admin.layouts.footer')
@endsection