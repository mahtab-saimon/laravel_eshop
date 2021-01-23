@extends('admin_layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order</h1>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Product</h3>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    {{--<th>Quantity</th>--}}
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($order as $row)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->name }}</td>
                                        {{--<td>{{ $row->qty }}</td>--}}
                                        <td>{{ $row->total }}</td>
                                        <td>
                                            @if($row->status == '1')
                                                <span class="badge badge-success">
                                                   Active
                                                </span>
                                            @else
                                                <span class="badge badge-danger">
                                                    Inactive
                                                </span>
                                            @endif
                                        </td>
                                        <td class="center">
                                            @if($row->status == '1')
                                                <a class="btn btn-danger" href="{{URL::to('/inactive/'.$row->id)}}">
                                                    <span class="badge badge-danger">Inactive</span>
                                                </a>
                                            @else
                                                <a class="btn btn-success" href="{{URL::to('/active/'.$row->id)}}">
                                                    <span class="badge badge-success"> Active</span>
                                                </a>
                                            @endif
                                            <a class="btn btn-success" href="{{ URL::to('editOrder/'.$row->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-info" href="{{ URL::to('viewOrder/'.$row->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-danger" href="{{ URL::to('deleteOrder/'.$row->id) }}" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    {{--<th>Quantity</th>--}}
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Actions</th>
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
    </section>
@endsection
