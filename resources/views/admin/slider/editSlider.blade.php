@extends('admin_layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>edit Suplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                            <h3 class="card-title">Edit Product</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <form action="{{URL::to('/updateProduct/'.$product->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="productName">product Name</label>
                                    <input id="productName" class="form-control" value="{{ $product->product_name }}" name="product_name" type="text">
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="categoryName">Brand Name</label>
                                        @php($brand = DB::table('brands')->get())
                                        <select id="brandId" name="brandId" class="form-control">
                                            <option>{{ $product->brandId }}</option>
                                            @foreach($brand as $row)
                                                <option value="{{$row->id}}">{{$row->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="categoryName">category Name</label>
                                        @php($cat = DB::table('categories')->get())
                                        <select id="categoryName" name="catId" class="form-control">
                                            <option>{{ $product->catId }}</option>
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
                                            <option>{{ $product->size }}
                                            </option>
                                            @foreach($size as $row)
                                                <option value="{{$row->id}}">{{$row->sizeName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Color">Color</label>
                                        @php($color = DB::table('colors')->get())
                                        <select class="form-control" name="color" id=Color"">
                                            <option>{{ $product->color }}</option>
                                            @foreach($color as $row)
                                                <option value="{{$row->id}}">{{$row->color}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="productCode">product Code</label>
                                    <input id="productCode" class="form-control"
                                           value="{{ $product->productCode }}" name="productCode"
                                           type="text">
                                </div>

                                <div class="form-group">
                                    <label for="productPlce">product Plce</label>
                                    <input id="productPlce" class="form-control"
                                           value="{{ $product->productPlce }}" name="productPlce"
                                           type="text">
                                </div>
                                <div class="form-group">
                                    <label for="productRoute">product Route</label>
                                    <input id="productRoute" class="form-control"
                                           value="{{ $product->productRoute }}"
                                           name="productRoute"
                                           type="text">
                                </div>
                                <div class="form-group">
                                    <label for="buyingPrice">Status</label>
                                    <input id="buyingPrice" class="form-control"
                                           value="{{ $product->status }}" name="status"
                                           type="text">
                                </div>
                                <div class="form-group">
                                    <label for="buyingPrice">buying Price</label>
                                    <input id="buyingPrice" class="form-control"
                                           value="{{ $product->buyingPrice }}" name="buyingPrice"
                                           type="text">
                                </div>

                                <div class="form-group">
                                    <label for="sellingPrice">selling Price</label>
                                    <input id="sellingPrice" class="form-control" value="{{$product->sellingPrice}}"
                                           name="sellingPrice"
                                           type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">product Description</label>
                                    <textarea class="form-control" name="productDescription" id="summernote" >
                                     {{$product->productDescription}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">image</label>
                                    <div class="input-group">
                                        <img src="{{URL::to($product->productImage)}}" height="60px" width="60px" alt="">
                                        <div class="custom-file">
                                            <input type="file" name="productImage" class="custom-file-input" id="exampleInputFile">
                                            <input type="hidden" name="old_photo" value="{{$product->productImage}}">
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
                                <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

