@extends('admin_layout')
@section('content')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card card-dark">
                            <div class="card-header">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <h3 class="card-title">Add Category</h3>
                            </div>
                            <form action="{{route('/insertCategory')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="productName">Category Name</label>
                                        <input id="productName" class="form-control" name="category_name" type="text">
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="status">
                                        <input id="status" class="form-check-input" name="status" type="checkbox" value="1">
                                            Category Status Active</label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="status">
                                        <input id="status" class="form-check-input" name="status" type="checkbox" value="0">
                                            Category Status Inactive</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Category Description</label>
                                        <textarea id="summernote" name="category_description"></textarea>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
