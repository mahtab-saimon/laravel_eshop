@extends('layout')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div>
            <!--/breadcrums-->
            <div class="register-req">
                <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
            </div><!--/register-req-->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12  clearfix">
                        <div class="bill-to">
                            <p>Bill To</p>
                            <div class="form-one">
                                <form action="{{route('/shipping')}}" method="post">
                                    @csrf
                                    <input name="name" type="text" placeholder="Name">
                                    <input name="email" type="text" placeholder="Email">
                                    <input name="address" type="text" placeholder="Address ">
                                    <input name="phone" type="text" placeholder="Phone">
                                    <input name="country" type="text" placeholder="Country">
                                    <input name="city" type="text" placeholder="City">
                                    <button type="submit" class="btn btn-warning btn-block">Done</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
