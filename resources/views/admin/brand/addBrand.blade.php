@extends('admin_layout')
@section('content')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Brand Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Brand</li>
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
                                <h3 class="card-title">Add Brand</h3>
                            </div>
                            <form action="{{route('/insertBrand')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="brand_name">Brand Name</label>
                                        <input id="brand_name" class="form-control" name="brand_name" type="text">
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="status">
                                        <input id="status" class="form-check-input" name="status" type="checkbox" value="1">
                                            Brand Status Active</label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="status">
                                        <input id="status" class="form-check-input" name="status" type="checkbox" value="0">
                                            Brand Status Inactive</label>
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
