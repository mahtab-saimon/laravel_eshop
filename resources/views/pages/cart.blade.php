@extends('layout')
@section('content')
    <!--/#cart_items-->
    <section id="cart_items">
        <div class="container col-sm-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
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
            <div class="table-responsive cart_info">
                <?php
                    $content = Cart::content();
                ?>

                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($content as $content)
                    <tr>
                        <td class="cart_product ">
                            <a href=""><img src="{{url($content->options->productImage)}}" style="height: 100px; width: 100px" alt=""></a>
                        </td>
                        <td class="cart_description text-center">
                            <h4 ><a href="">{{$content->name}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p >{{$content->price}}TK</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{route('/updateCart')}}" method="post">
                                    @csrf
                                    <input class="cart_quantity_input" type="text" name="qty" value="{{$content->qty}}" autocomplete="off" size="2">
                                    <button type="submit" class="btn btn-info btn-sm">update</button>
                                    <input class="cart_quantity_input" type="hidden" name="rowId" value="{{$content->rowId}}" autocomplete="off" size="2">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{$content->total}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/removeAnItem/'.$content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                            <li>Eco Tax <span>{{Cart::tax()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::total()}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>

                        @php(
                           $customer = Session::get('id')
                          )
                        @if($customer != NULL)
                            <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Checkout</a>
                        @else
                            <a class="btn btn-default check_out" href="{{URL::to('/loginCustomer')}}">Checkout</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection
