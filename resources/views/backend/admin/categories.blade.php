@extends('backend.admin.layouts.master')
@section('content')
@include('backend.admin.layouts.sidebar')
@include('backend.admin.layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid d-flex justify-content-center">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 col-8">
                        <div class="card-header d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary mt-3">Categories Table</h6>
                            <a href="{{route('backend.admin.add_categories')}}" class="btn btn-info" >Add+</a>    
                        </div>
                        @if (Session("success"))
                            <div class="alert alert-success">
                            {{Session('success')}}
                            </div>
                        @endif
                        @if (Session("fail"))
                        <div class="alert alert-danger">
                        {{Session('fail')}}
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                        <tr>
                                            <td>{{$category->name}}</td>
                                            <td class="d-flex gap-2 justify-content-around">
                                                <a href="{{route('backend.admin.edit_categories',$category)}}" class="btn btn-info">Edit</a>    
                                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteCatModal">Delete</a>    
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3">Add Category</td>
                                        </tr>
                                        @endforelse
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
                            <div class="modal-body ">Are you sure you want to delete this category?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger" href="{{route('backend.admin.delete_categories',$category->id)}}">Yes</a>
                            </div>
                        </div>
                        </div>
                </div>
                
                {{-- <div class="modal fade" id="editCategoryModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modalHeading"></h4>
                            </div>
                            <div class="modal-body">
                                <form name="categoryForm" class="form-horizontal editCategoryForm" method="POST">
                                    <input type="hidden" name="category_id" id="category_id">
                                    <div class="form-group">
                                        Name: <br>
                                        <input type="text" class="form-control" id="name" name="name" value="" required>
                                    </div>
                                    <a type="submit" class="btn btn-success" id="editBtn" value="Edit">Update</a>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                 --}}
                <!-- /.container-fluid -->
                {{-- <script type="text/javascript">
                    $(function(){
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        })
                        $(document).on('click','.editCat',function(e){
                            e.preventDefault();
                            var category_id = $(this).attr('id');
                            console.log(category_id)
                            // $.ajax({
                            //     url: "{{route('backend.admin.edit_categories')}}",
                            //     type:"POST",
                            //     data: {
                            //         id: category_id,
                            //         _token: '{{ csrf_token() }}',
                            //         success: function(res){
                            //             $("#name").val(res.name);
                            //         }
                            //     }
                            // })
                        })
                        $('#editCategoryForm').submit(function(e){

                        })
                    })
                </script> --}}
@include('backend.admin.layouts.footer')
@endsection