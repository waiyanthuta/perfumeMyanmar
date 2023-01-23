@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Category Table</h6>
                                <a href="#" id="" class="btn btn-info btn-icon-split add" data-toggle="modal" data-target="#addCatModal"><span class="icon text-white-50"><i class="fas fa-plus"></i></span> <span class="text">Add</span> </a>
                            </div>
                            @if (Session("success"))
                            <div class="alert alert-success">
                                {{Session('success')}}
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        {{-- {{dd($category->category_detail)}} --}}
                                        <tr>
                                            <td>{{$category->name}}</td>
                                            <td><a href="" class="btn btn-info edit" id="{{$category->id}}" data-toggle="modal" data-target="#editCatModal">Edit</a></td>
                                            <td>
                                               <a href="" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteCatModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span> <span class="text">Delete</span></a>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- delete category modal --}}
                <div class="modal fade" id="deleteCatModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Category?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body ">Are you sure you want to delete this Category?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <form action="{{route('backend.del_product_category',$category->id??'null')}}" method="POST">@csrf
                                    <button class="btn btn-danger" type="submit">Yes</button>
                                </form>
                            </div>
                        </div>
                        </div>
                </div>

                {{-- edit category modal --}}
                <div class="modal fade" id="editCatModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center text-info font-weight-bold">Edit Category Form</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                                <form action="#" method="POST" id="edit_cat_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="cat_id" id="cat_id">
                                    <div class="modal-body ">
                                        <div class="my-2">
                                            <label for="shopname">Category Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="name" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-success" type="submit" id="edit_cat_btn">Update</button>
                                    </div>
                                </form>
                        </div>
                        </div>
                </div>
                {{-- add category modal --}}
                <div class="modal fade" id="addCatModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center text-info font-weight-bold">Add Category Form</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                                <form action="#" method="POST" id="add_cat_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body ">
                                        <div class="my-2">
                                            <label for="shopname">Category Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="name" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-success" type="submit" id="add_cat_btn">Add</button>
                                    </div>
                                </form>
                        </div>
                        </div>
                </div>
                <!-- /.container-fluid -->

                <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
                <script>
                    $(document).ready(function () {
                        //adding category modal
                        $("#add_cat_form").submit(function (e) {
                            e.preventDefault();
                            const cat = new FormData(this);
                            $("#add_cat_btn").text("Adding...");
                            $.ajax({
                                // type: "post",
                                url: "{{route('backend.insert_product_category')}}",
                                method: "post",
                                data: cat,
                                cache: false,
                                processData: false,
                                contentType: false,
                                success: function (res) {
                                    // console.log(res);
                                    if(res.status == 200){
                                        $("#add_cat_btn").text("Add");
                                        $("#add_cat_form").trigger("reset");
                                        $("#addCatModal").hide();
                                        location.reload();
                                    }
                                }
                            });
                        });
                        //update category
                        $("#edit_cat_form").submit(function (e) { 
                            e.preventDefault();
                            const cat = new FormData(this);
                            $("#edit_cat_btn").text("Updating...");
                            $.ajax({
                                url: "{{ route('backend.chg_product_category')}}",
                                method: 'post',
                                data: cat,
                                cache: false,
                                processData: false,
                                contentType: false,
                                success: function (res) {
                                    // console.log(res);
                                    if(res.status == 200){
                                        $("#edit_cat_btn").text("Add");
                                        $("#edit_cat_form")[0].reset();
                                        $("#editCatModal").hide();
                                        location.reload();
                                    }
                                }
                            });
                        });

                         //show edit category modal
                         $(document).on('click', '.edit' ,  function (e) {
                            e.preventDefault();
                            let id = $(this).attr('id');
                            $.ajax({
                                // type: "post",
                                url: "{{route('backend.edit_product_category')}}",
                                method: "get",
                                data: {
                                    id : id,
                                    _token : '{{ csrf_token() }}'
                                },
                                success: function (res) {
                                    // console.log(res);
                                    $("#name").val(res.name);
                                    $("#cat_id").val(res.id);
                                }
                            });
                        });

                    });
                </script>
@include('backend.admin.layouts.footer')
@endsection