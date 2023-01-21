@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-6">
            <div class="card text-black">
            {{-- <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i> --}}
            <div class="card-body text-center">
                <img src="{{asset('images/perfumes/'.$perfume->perfume_pic)}}" width="246px" height="100%" alt=""><br><hr>
                <div class="text-center">
                <h5 class="card-title">{{$perfume->name}}</h5>
                <p class="text-muted mb-4">{{$perfume->category}} perfume</p>
                </div>
                <div>
                <div class="total font-weight-bold mb-4">Available Size</div>
                @foreach ($perfume->perfume_detail as $pdetail)
                <div class="d-flex justify-content-between mb-2 font-weight-bold">
                    <span>{{$pdetail->perfume_size->size}}</span>-<span>{{$pdetail->price}} kyats</span>
                </div>
                @endforeach
                </div>
                <div class="mt-4">
                <div class="total font-weight-bold mb-4">Description</div><p style="text-align: justify">{{$perfume->desc}}</p>
                </div>
            </div>
            <div class="pt-3 pb-1 px-3 d-flex" style="justify-content: space-around !important">
                <a href="{{route('backend.perfume',$perfume)}}" class="btn btn-info ">Back</a>
                <a href="{{route('backend.edit_perfume',$perfume)}}" class="btn btn-warning ">Edit</a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

@include('backend.admin.layouts.footer')
@endsection