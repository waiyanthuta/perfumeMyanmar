@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

 <!-- Begin Page Content -->
 <div class="container-fluid" style="margin-top: 30px!important;">
    @if (Session("success"))
    <div class="alert alert-success">
      {{Session('success')}}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="d-flex">Bank Informations</h3>
            <a href="{{route('backend.admin.add_banks_info')}}" class="btn btn-success float-right">Add Bank Account</a>
        </div>

    @if (Auth::guard('admin')->user()->bank->count())
    <div class="row">
        @foreach ($banks as $bank)     
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-primary">{{$bank->name}}</h6>
                </div>
                <div class="card-body text-center">
                    <img src="{{asset('images/bankprofilepics/admins/'.$bank->bank_profile)}}" height="200px" width="200px" alt="" style="display:inline-block!important;" class="d-flex justify-content-center"><br><hr>
                    <h5>{{$bank->account}}</h5>
                    <div class="d-flex justify-content-between">
                        <a href="{{route('backend.admin.edit_banks_info',$bank->id)}}" class="btn btn-primary">Edit Account</a>
                        <a href="{{route('backend.admin.delete_banks_info',$bank->id)}}" class="btn btn-danger">Delete Account</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    </div>
    
    @else
    <div class="row d-flex justify-content-center">
        <div class="card shadow mb-4 col-md-9">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Bank Name</h6>
                <a href="{{route('backend.admin.add_banks_info')}}" class="btn btn-primary">Add Bank Account</a>
            </div>
            <div class="card-body">
                <p class="text-center text-danger">Add Your Bank Account first</p>
            </div>
        </div>
    </div>
    
    @endif

</div>
@include('backend.admin.layouts.footer')
@endsection