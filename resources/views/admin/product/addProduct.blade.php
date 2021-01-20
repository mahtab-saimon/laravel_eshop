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
                        <li class="breadcrumb-item active">Add Product</li>
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
                            <h3 class="card-title">Add Product</h3>
                        </div>
                        <form action="{{route('/insertProduct')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="productName">product Name</label>
                                    <input id="productName" class="form-control" name="product_name" type="text">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="categoryName">Brand Name</label>
                                        @php($brand = DB::table('brands')->get())
                                        <select id="categoryName" name="brandId" class="form-control">
                                            <option>Select Brand</option>
                                            @foreach($brand as $row)
                                                <option value="{{$row->id}}">{{$row->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="categoryName">category Name</label>
                                        @php($cat = DB::table('categories')->get())
                                        <select id="categoryName" name="catId" class="form-control">
                                            <option>Select Category</option>
                                            @foreach($cat as $row)
                                                <option value="{{$row->id}}">{{$row->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="Size">Size</label>
                                        @php($size = DB::table('sizes')->get())
                                        <select id="Size" name="size" class="form-control">
                                            <option>Select Size</option>
                                            @foreach($size as $row)
                                                <option value="{{$row->id}}">{{$row->sizeName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Color">Color</label>
                                        @php($color = DB::table('colors')->get())
                                        <select class="form-control" name="color" id=Color"">
                                            <option>Select Color</option>
                                            @foreach($color as $row)
                                                <option value="{{$row->id}}">{{$row->color}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="productCode">productCode</label>
                                    <input id="productCode" class="form-control" name="productCode" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="productPlce">productPlce</label>
                                    <input id="productPlce" class="form-control" name="productPlce" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="productRoute">productRoute</label>
                                    <input id="productRoute" class="form-control" name="productRoute" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="buyingPrice">buyingPrice</label>
                                    <input id="buyingPrice" class="form-control" name="buyingPrice" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="sellingPrice">sellingPrice</label>
                                    <input id="sellingPrice" class="form-control" name="sellingPrice" type="text">
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="status">
                                        <input id="status" class="form-check-input" name="status" type="checkbox" value="1">
                                        Product Status Active</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="status">
                                        <input id="status" class="form-check-input" name="status" type="checkbox" value="0">
                                        Product Status Inactive</label>
                                </div>
                                <div class="form-group">
                                    <label for="">productDescription</label>
                                    <textarea class="form-control" name="productDescription" id="summernote" >

                                        </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"  name="productImage" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
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
