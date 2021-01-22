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

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12  clearfix">
                        <div class="bill-to">
                            <p>Bill To</p>
                            <div class="form-one">
                                <form>
                                    <input type="text" placeholder="Name">
                                    <input type="text" placeholder="Email*">
                                    <input type="text" placeholder="Address ">
                                    <input type="text" placeholder="Phone">
                                    <input type="text" placeholder="Phone">
                                    <input type="text" placeholder="Country">
                                    <input type="text" placeholder="City">
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
