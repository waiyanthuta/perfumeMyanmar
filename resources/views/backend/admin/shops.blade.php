@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Yanant Shops Table</h6>
                        </div>
                        @if (Session("delete"))
                        <div class="alert alert-success">
                          {{Session('delete')}}
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Shop Pic</th>
                                            <th>Name</th>
                                            <th>Shop Desciption</th>
                                            <th>Location</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($shops as $shop)
                                        <tr>
                                            <td>
                                                <img src="{{asset('images/shops/'.$shop->shop_pic)}}" width="75px" height="100%" alt="">
                                            </td>
                                            <td>{{$shop->name}}</td>
                                            <td> <textarea name="" id="" cols="10" rows="2" disabled width="100%" style="resize: horizontal!important">{{$shop->desc}}</textarea> </td>
                                            <td>{{$shop->location}}</td>
                                            <td><a href="" id="{{$shop->id}}" class="btn btn-info edit" data-toggle="modal" data-target="#editShopModal">Edit</a></td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal"  data-target="#deleteUniPerfumeModal">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Delete</span>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-danger "><h4>Add Shops</h4></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- delete product modal --}}
                <div class="modal fade" id="deleteUniPerfumeModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-danger" id="exampleModalLabel">Delete This Shop?</h4>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body ">Are you sure you want to delete this shop?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <form action="{{route('backend.del_shop',$shop->id??'null')}}" method="POST">@csrf
                                    <button class="btn btn-danger" type="submit">Yes</button>
                                </form>
                            </div>
                        </div>
                        </div>
                </div>


                {{-- edit shop modal --}}
                <div class="modal fade" id="editShopModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center text-info font-weight-bold" id="exampleModalLabel">Edit Form</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                                <form action="#" method="POST" id="edit_shop_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="shop_id" id="shop_id">
                                    <input type="hidden" name="shop_pic" id="shop_pic">
                                    <div class="modal-body ">
                                        <div class="my-2">
                                            <label for="shopname">Shop Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="name" required>
                                        </div>
                                        <div class="my-2">
                                            <label for="shopname">Shop Description</label>
                                            <textarea name="desc" id="desc" cols="20" rows="3" class="form-control"></textarea>
                                            {{-- <input type="text" name="name" id="name" class="form-control" placeholder="name" required> --}}
                                        </div>
                                        <div class="my-2">
                                            <label for="shopname">Shop Location</label>
                                            <input type="text" name="location" id="location" class="form-control" placeholder="location" required>
                                        </div>
                                        <div class="my-2">
                                            <label for="shopname">Shop Picture</label>
                                            <input type="file" name="shoppic"  class="form-control" >
                                        </div>
                                        <div class="mt-2" id="shoppic">
        
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-success" type="submit" id="edit_shop_btn">Update</button>
                                    </div>
                                </form>
                        </div>
                        </div>
                </div>
                <!-- /.container-fluid -->
                <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
                <script>
                    $(document).ready(function () {
                        //update shop
                        $("#edit_shop_form").submit(function (e) { 
                            e.preventDefault();
                            const shop = new FormData(this);
                            $("#edit_shop_btn").text("Updating...");
                            $.ajax({
                                url: "{{ route('backend.chg_shop')}}",
                                method: 'post',
                                data: shop,
                                cache: false,
                                processData: false,
                                contentType: false,
                                success: function (res) {
                                    // console.log(res);
                                    if(res.status == 200){
                                        $("#edit_shop_btn").text("Update");
                                        $("#edit_shop_form")[0].reset();
                                        $("#editShopModal").hide();
                                        location.reload();
                                    }
                                }
                            });
                        });
                        //show edit shop modal
                        $(document).on('click', '.edit' ,  function (e) {
                            e.preventDefault();
                            let id = $(this).attr('id');
                            // console.log(id);
                            $.ajax({
                                // type: "post",
                                url: "{{route('backend.edit_shop')}}",
                                method: "get",
                                data: {
                                    id : id,
                                    _token : '{{ csrf_token() }}'
                                },
                                success: function (res) {
                                    // console.log(res);
                                    $("#name").val(res.name);
                                    $("#desc").val(res.desc);
                                    $("#location").val(res.location);
                                    $("#shoppic").html(`<img src="{{asset('images/shops/${res.shop_pic }')}}" width="100px" height="100px">`);
                                    $("#shop_id").val(res.id);
                                    $("#shop_pic").val(res.shop_pic);
                                }
                            });
                        });
                    });
                </script>
@include('backend.admin.layouts.footer')
@endsection