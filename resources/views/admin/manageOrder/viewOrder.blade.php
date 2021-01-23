@extends('admin_layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User Name</a></li>
                        <li class="breadcrumb-item active">Mobile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Customer Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Mobile</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $v_order)
                            @endforeach
                            <tr>
                                <td>{{$v_order->name}}</td>
                                <td>{{$v_order->phone}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Shippnig Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $v_order)
                            @endforeach
                            <tr>
                                <td>{{$v_order->name}}</td>
                                <td>{{$v_order->address}}</td>
                                <td>{{$v_order->phone}}</td>
                                <td>{{$v_order->email}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Details</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($order as $v_order)
                            <tr>

                                <td>{{$v_order->product_name}}</td>
                                <td>{{$v_order->product_Price}}</td>
                                <td>{{$v_order->quantity}}</td>
                                <td>{{$v_order->quantity*$v_order->product_Price}}</td>
                            </tr>
                            @endforeach

                            </tbody>
                            <tfooter>
                                <tr>
                                    <td colspan="4">Total With Vat</td>
                                    <td colspan="4">{{$v_order->total}}Tk</td>

                                </tr>
                            </tfooter>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- Main content -->
  {{--  <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>description</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->category_description }}</td>
                                        <td>
                                            @if($category->status == '1')
                                                <span class="badge badge-success">
                                                   Active
                                                </span>
                                            @else
                                                <span class="badge badge-danger">
                                                    Inactive
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Category Name</th>
                                    <th>description</th>
                                    <th>Status</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>--}}
@endsection
