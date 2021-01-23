<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" integrity="sha512-LhZScx/m/WBAAHyiPnM+5hcsmCMjDDOgOqoT9wyIcs/QUPm6YxVNGZjQG5iP8dhWMWQAcUUTE3BkshtrlGbv2Q==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->
<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{URL::to('/')}}"><img src="{{url('frontend/images/home/logo.png')}}" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>ph
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    @php( $customer = Session::get('id') )
                    @php(  $shipping_id = Session::get('shipping_id') )
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            @if($customer != NULL && $shipping_id == NULL)
                                <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            @elseif($customer != NULL && $shipping_id != NULL)
                                <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            @else
                                <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            @endif
                            <li><a href="{{URL::to('/showCart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>

                            @if($customer != NULL)
                            <li><a href="{{URL::to('/logoutCustomer')}}"><i class="fa fa-lock"></i> Logout</a></li>
                            @else
                                <li><a href="{{URL::to('/loginCustomer')}}"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{URL::to('/')}}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="{{URL::to('/showCart')}}">Cart</a></li>
                                    <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<!--slider-->
<!--/slider-->
@yield('slider')
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @php(
                            $al_publish_category=DB::table('categories')
                                                   ->where('status',1)
                                                   ->get()
                           )
                        @foreach($al_publish_category as $cat)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/productByCategory/'.$cat->id)}}">{{$cat->category_name}}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                            @php(
                                 $al_publish_brand=DB::table('brands')
                                               ->where('status',1)
                                               ->get()
                                               )
                            @foreach($al_publish_brand as $brand)
                                <li><a href="{{URL::to('/productByBrand/'.$brand->id)}}"> <span class="pull-right">(4)</span>{{$brand->brand_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    @yield('content')
            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe1.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe2.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe3.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe4.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="images/home/map.png" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<!--[if lt IE 9]>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('frontend/js/html5shiv.js')}}"></script>
<script src="{{asset('frontend/js/respond.min.js')}}"></script>
<![endif]-->
<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/price-range.js')}}"></script>
<script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>




<script>
        @if(Session::has('messege'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
    @endif
</script>
<script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Are you Want to delete?",
            text: "Once Delete, This will be Permanently Delete!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Safe Data!");
                }
            });
    });
</script>


<style>
    .paymentWrap {
        padding: 50px;
    }

    .paymentWrap .paymentBtnGroup {
        max-width: 800px;
        margin: auto;
    }

    .paymentWrap .paymentBtnGroup .paymentMethod {
        padding: 40px;
        box-shadow: none;
        position: relative;
    }

    .paymentWrap .paymentBtnGroup .paymentMethod.active {
        outline: none !important;
    }

    .paymentWrap .paymentBtnGroup .paymentMethod.active .method {
        border-color: #4cd264;
        outline: none !important;
        box-shadow: 0px 3px 22px 0px #7b7b7b;
    }

    .paymentWrap .paymentBtnGroup .paymentMethod .method {
        position: absolute;
        right: 3px;
        top: 3px;
        bottom: 3px;
        left: 3px;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        border: 2px solid transparent;
        transition: all 0.5s;
    }

    .paymentWrap .paymentBtnGroup .paymentMethod .method.visa {
        background-image: url("data:image/png;base64,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");
    }
    .paymentWrap .paymentBtnGroup .paymentMethod .method.handcash {
        background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP4AAADGCAMAAADFYc2jAAABiVBMVEX////4roEREiQsKTKeuJH3lB00WikfRBkAAADQ0dIrUSL3onnVhmijvZbllXAxWCYAABgoURwuViL2jAAAABAAABsAABUALAD3pXsANQD3qnsAKgAAMQAAAAkNDiIIABQAPwCXs4tzkWgcGCQaGypHZD+FoHmJpn72qHc7XzAVSAAbFyMdVSL3kRBDZTgaQhMKOQBOb0Q+P0pzdHqvr7Te493O1cydqZsfShNkhFrt8u72to6st6r54tP3zqX88+z41sL3wIxbe1FMYDEqTSTpm3S9xrtidV83VDOUlJlUVl+HiI5PT1lFRU+enqIvMDxkZG2Bkn1yhmxVb074wqH62Mb3wJ/67Nn52rz3t3n2nTk0Txj1qFPDlWv41K/3xZTEq4PnqH6xs42ZfFB2bkTVs4b4o0ish17GxsfclEuPiWKqbCaLXC1hRjAMHjPchya/dyfNnnf4ol/WgiJxbkKZYit1Ti6rmnRFNS97US1LYkfzkiru2dHmwbPdpY/Eg2LBgGHXmoPsvayK3BfDAAASZklEQVR4nO2di1/TaLrHsYWSFtM0sUVAW0gtdIotvQVtq4giqCFtU2/jyLq6jq6y13PmnNlzdnXV4/zl573lfmkSCoWS34fhQ2+x3/fye5/3ed83MzUVKlSoUKFChQoVKlSoUKFChQoVKlSoUKHGqtub4/4G41RnZeXhjXF/ifHpZivRWll9MO6vMS4lkNYTNzvj/ibj0IN1zJ9orT8+hyawyiYUtc6fCdxYSeh07kzgCZsw6lyZwOZKwqLWyrkxgcctKz4sgCfnwgQ6xspv6QrgPJjATX3lt9b4nZb6BLvO3hz31ztuGap+h56mp/NKE4jFJt4Ebq8b6YFoem2jxUL6WIyZ8EgAhTylFlRpDdGjEijWE0wM80+yCaCQp8VPr+XXeBUeFUAb44MOAExgZUJN4CGs/LoBHNOvsbGYxj+h0wEU8rSKFvrpokaPOsBkRgIo5NmwVj7PMDELPyiApxNlAp11NNZbK3/DQK90AGgCiduTMx1AIU/MUvl0nYuZpc2HWo8npQCg77XyFvo2a6HX8SdalyeDH4c8Fvq8Hb1qAAD/ybi/+Gi0CmHa5rZfNNFzHGPkX5mMEVAJecymj1AV62fYfJEx8LNPx/3FR6OnsOvvmCsfmT7b5ussB8RuFOlpvqRYIar8yRj8bEMebPociANpPt9u54u0cSgAlV8a9xd319bdW7d+fPbs7vOtbdf3PbEJebDpMxtk5kfThucR//rtE+IIoO27t374YenChQtLUODPW89eOxQDyvKYQh5i+ozZD9ArZAbYOmkmr9p6dgGh60WK4cKtZ3dNpYBCnpKx8rHpszZzADAFJgMAdyqHva0ff7Cwm8rBWAotFPIY8HnUw9k16xwAvUoMkN04ZVHP9vNb7uz6UkA94u6WXchTwqZvTw9EDJBjj2vg337x052XB3d8fQR0d2/ohqbwOziCG0jpOqTnLCOh7h3EAJn1kY99gPveq5lLQJVKxd2yzex+4aF+3zKHPHSbQ6YPm7kjvxIPr48s+bO99freqwPMPYN16Y139gDoUPcTppAHkXHl+394Ozf39mdHfiUCXD+yAYKG/ublhxk9t6KKR/ag8BfeWkKeIgvY3+3NYTnzqwa4GtgAt0EHJw19xlaXfvLAHhQd6r05xceXY5B9YQFf9q1j+9cMMBHUALdsKtxY+6/c2J8fpd51la8Ped5/A+zaRZccqx80gJ0jGuD2JTd2VP2O5vf8x6OyA71jDSHPz6C/Lxjf8QdnfNUAmaAG6Fr1CP+17edAbHNkdCg15OH5aeh1C5ar/tEFHxpg7CgG+GEYv13r33q25B0edmNFlhc/luGgD6sdss/ZXfSPLp0frgKQGSBb92uAnfih8Kfh1W9l91fvcybBclCukCiXy4k/I3Rzo1fk1vgBfknJBHOMJwOE0H1p0I0up5cjmb8Mx9d7/7bNXGaolswFoBbD3sff7y2QB04fdrE+IN0SkJsBqtBpAH392rUoVuGvw/Hvqex3A7AjLdgXgFYSLh91r/y6bhnAYoCdTQjd7F4j0Aq1pr8NxZ85IOxHGuDdCsD1sm7jPsCP6VdBmPWOHjqbBdDXrcx6DceHnX8LTOSCs7sVgEvFQw1p+7RhDWgd9f708vL16zY1bae/D6Wfqdx5NppB7sKCqQiso5xF7pUPnE9Pj/u+J24F/z+G838YCTvW0hIZAz0mBdwrH8R9WvUrPd8X/n8Ox/88Qnx/WvqFdp7zI2nO33o85R+/8A8PrX9s+MkE0+ZdC0C1fm3Jww9+9F8e8I/qegG1kLzPxDh2x7UAeOz9XKkTCP+fw62/8l9jod9Lvi+j4YzLu/DjqJdpaSGfL3wPI99Ivc+rlpLJd2XSrVmXrB/KCTPrus0uvuj//nk4/hi8by9J6h7H8xuO+Lh89Os9/vD/20PnP2n4hWQy+atGj5f6bJv+Bm76ncD4Hka+E/a+BVD1yfvGXS32WW96B7+rutsJiF/4x2nzPsCe/GV6x7S1wW7FR1kInJ2tPQqK/z+nyvtQzSf/l6fpohE/xtiYPi6iWaCVTwGd/5/D6WcOToZ9CbEnv5XKbKzeLhnxOYe9L8wuxJ9dfBgM38OkZ2bmBNhxvSeTe38uM2i0N9V+jDPNfnDAw+b5GuYPEvR6G/mO3/oJOxjsp+13cwF84743eoMsBNJrVcR/NcCUx+PId7zWv5BU4ctrea3aGY5lWXVKxxj2f2DTRwMiwZ+9fDsAfuEvHvCP1fq1mi+XY1r6imE38kW+qA4BjL71k70vJdgJcOMHuvIgAP7wdN+xWr8C/+19mWOAv6lTuHoRzXa1vY2cthhETD/BwzlfVcGfvXzDN37Uy8h3fNZP4D/eR4bHFsnqNqsd6MDPoM6vtn793he18mdnq1c3feNHh9MfW9SPq/6Xn3fKuM5ZUJ0llmM39EEOT6qfUSM/xfTh4zUd/my11vGLP8aRD7PrkhYchFszn2bZMOOjSJ/sCMlXdfiztU++8T2k+47F+hcw+7Q+Z2OK6/APeZUh8x5twyNygaqR3je+l0nPMVj/XvKjMpKrGUvDTjZ6rQ5qXIdPTrdhdygpHUHX+FHo5xO/MHyh6zjw95Lv61Z30yJburgBx3wWxDWGsJeYvrrhkd7V6J/4H/jGNPKBCX1Jq2g11lGoaH6HBDwsrVgfdn7Lhse8Uv1XHwcIezwtdI165FuA6QxdFKPu3GdKPNzAy7c5pUBYWikbhMwnNNMnJbWKe/+VQEFvdAwj3x6kN2xY1SJddiefr3P6UFddwoZvtG545Hf1Ia9/fC+TnpGOfGBa92vLkL7Qr9QyHKdbuWPVSQB0PoPpk15CAh51dds3vpeRb3TwMNR5XzYlr9cc5nmg8pVJD7um7nLXlVuxisMdLdXrG/8k030LeG5jTt1puzSMAmEg2b/IlGjrLncax3zVWd3ODr/4ntJ9I8Lfw/TW45qW6mfRERa+HeOn0f5Fdo22mD6dX0TBzqPAmV6of53UwL9H5rUxM7ySvVAFbK6Yz+fBIM8wRegMIOTDR5t0OU+6vaiEekfBP6GFLpzVmHtXZu0W7Xlj9YOhDQjWN8PmYyjVZTZ9+mnNmOULiF8Y3vdHEPeQif37MmtzVNd4UB3xb/Cktcc4VOd4l7tm+vRqTRfsHAHfy8h31LhHyWr8WmYdVizNZzYZbkcdAcFn2vCBPuGFo53Llv2c/vGd0n1wrzP583PyIlIyCPuSms+6X3Y+pWA5s6q6AaBHrzExtdvwu4j+ivU0l398+3RfpfLmxYvXB9gYPl+8GJR/QYX/yDFOq3W4/XN2wx/DWU0f01cv22zl841vP/JVDvBu5pe4AVxUFRQerVq6LtZP83XWXAAMW+dpEukrpg+CHUS/aHcTB9/49uk+dS83rv+Lgfg1duB5ZOBywYc3amE5fcXDjCeJ9NVsjxLsVG23sfrHtxv5Ki+V692B1V/Zntr+95evmH/PE/qSjj35raweP3bDhwXQLnEo5OFYdqNdpNWTq8o6B42nuLVd+03M/vHt0n3aMZ4XEF/Z2bz95bs3/oU9IIwOS0zzMc5ylwJzAdA8DHny+SKPU91kGZv0fIX+k8MW7gD4NiNfRcXfujRjONaw/cVrB0iq/eW+bkbnYn62paEOCPjhjm2wcyR8m0lP5YNyvXsmfKB/f/UwAmjwF3/VG1rJF74aDuER0yHUOxK+7UKXspMdH3ixHGr58j3ptjNzQQd/8Z1+o0rMeocSN/Fq2ge2fZLasYR6R8P/qw0+4X9hGgc0bf/meKhj76Je38qGfdc2d+dxkTITxh97hOgX3Y7u+Md3SPddOrh379UlR/wpdEIfFMGS8XyHkR3q//T7zhnno7k2TV+dCMIBk4R6tY/PR4vvtLuvop3ndDzRtb119xkoBHh0eQnEOBZ2k/UxtvM9J/odpenDaJEn+exvc1ujxR++0GU+0mNTCiAs+Pr9u4b8/fv3r19/++3L3a3tGy0mSOXrZgEMr+S1AP1bty8SBH9ous/DaVZn3aglEuqyvWvUa6TX5sBsUc1r7c3tuR6sDoI/NN33+Qj0D67MzibwPRdj7ltUjdIyICDax3mt6u+Sc7+5/2sB8Iem+7QowL9uXsZ9VuF32aJqlGKYDKBvk1Dv+dAj9UHwh6X7tBmAbz2+rC7CKe0/5r5JnzR9xfS5UnF4sHMk/CELXZWKw1lWL7qp4SsNAM7gh9IT02fYHce81ojwr6UcFroAN9DBq3uvPd/GwYb/qoU/5pTx0uix6ePTDCTU83ZO2S/7crR5OHVg5q5g7jtbL4KDEz1e1PhjZN47xACVZew8mPSRYOeyx7sU+WSX4vBDryp67plXL9/89OIINW7UQ3ULQm1NufskV3fDV5Jb8JZVznmto+FfW5Yx+xSc1iHuyoeXb16PjlvRJ8JffQpitw3SqUvOBqjtXVKDHc83J/XK3hDj2ofuzMCGPnJuRY8wfxUB18lNBxJOBohPKcDdHEqwU/N+fwoP7NeXG/348CuNTp1ZXImraM6u3HbMwQC1DatD8lq2Gs7e65/4bQ43a3p+5bZjtgaobVi1XcIcpiHs3ZNnh9rEw18N52yKZMO6jQFi04c7eEmot/hp+NV1cmPfF8Z2l68bOPyp4RmfxQBpmtyVT13R8BPq6WSPfu368mB87FAPMP8i6fCKAXIol13cKXHcRpuneZLUpj3ktWxlxx5Jj5kdioS/i2u01sWxAdJ4GxvDsXkU6TMlmuS1rvi+JY2FfTkNwrrTIBL+1ZSEvcLf1m7GjFf52Py04xLmMJnYl08JO9QTzF/F+S7tvouWG3HzaKCsXglwOyY9+zXp9LBDKeEvyfdpN5410tdnfYZ6OqnsUelEQxtPwuFvdVcZ5mzuQc4kEph+NtAIjdjTsnj62KFwn64+UlZrLXch5+qJXf/BjibA3jil7ECdqi7800eAMWUcwAcUHJcwh2kMIa0fbS5WlckfMUD9/4CB22kHCnbOjm7ow19sgNoqQB0fzLp6Ku/BOxqR8K+mzfc0AyzhzI7fUO9M6baJn1YNEA+L/kO9syWS/ayB8Jem4VYOcp4Db80PEuycLanhL53frVWr1doq3LmKxvvq1Un7n+7Y6CHJ/q4qWcDqzkbCb17rDItkP7VTePiv2uzYJ6Yno0f606eKgoZ6Z0+d3aqF3mde60yrUzPzT26oZ6fNq0Z+33mtM64bV/T0kx7sWPVAxx8gr3XmdVvh976EOVEi4W+wvNYECIW/Dlvzz4Me1s5RsGOjT1fPUbBjownO7IQKFSpUqFChQoUKFSpUqFChQoUKFSqw4udaU9S51lTkXCvEP88K8ZFyOfhLfVr7K5LLGB7id6ZSJ/DdTkAEPycXcpFcQ8EsyCow1etSmW5B/UCuV8jlos19fYmcXSn4XXE+khao+TSo2fm0LGYj6XQGVDJ1GD/s5DajqVyWykRyaYra7KaohjSQJ4JfafxZgcrJ0n5fzGalvhiN70f7woCSxAIIDORsfHO/EY935wuH8f14o3HY2B8UXC977MrgTqgqlVFfML4P9N0U+slkcvM5+JPKpeaVzyr482IjKzb6VE9qNrMZWaSEFNWXD2XqsCM0qHgv09nvTmU3pYYcH3R6qcKY6z4zyEW784Apl84BrlRGGlAADDTPATAqQJgBr6UA+35hkJX2M1KXajajYqEgFiJioSt2yfdXrU/uU/1mv9kU+mnwQJTFefC7n41QXWGqF5f34xR12OxQOSo+1aTGhq0o0xxIcnM/K3WFwqBZGIhNuS93pWxP6kf3MxGpsd/MNJuDLiU2heZA6DWEpjQvyP1+ry+CJi4WTPig9TdAxTd6kX42B2q/0M9mGlI/naOylNiPR3ubFAXqnUqD31OR8ff7TL8/EA7FXlRoiE1JyIqSUBC64Ff/MEcJcq8/kASpKQz2qX4/J0bBn82+QAkSKAahKTeENL6Mip+SDiMZQW4Muv1oNyOkhX1ZyAhZOS72O7IQl+OCsEmBf3AQb0ib6XFRq0oLUqM/aEqgZoV+UwLg/a4AHgHM5r4I/hCbYrMriNnGYbcPngVvFURJFCSpL4kDERg9koqfK0jz4D9Jnu+JUqbRSzelaGqQiYBrFTLzTTktSZkc1RTlpkyJjbFXfy5ayMhyulGIyAU5Es30Ihk50pjP9aIpuZHuFQqNTLRQkHsZuZtqFKLd/UwjkgJu0UunevORHqHXRX3AOMB/KWAc88hWM8AegY1m5qFNZnLYLsGT4B3zY6dHkRj4kugnB90uQn7h50yPcrqnyQ9WGPSeZ4X451nnHP//ARSJjutrMD0wAAAAAElFTkSuQmCC");
    }

    .paymentWrap .paymentBtnGroup .paymentMethod .method.bkash {
        background-image: url("https://tbsnews.net/sites/default/files/styles/big_3/public/images/2019/07/11/bkash_logo_0.jpg?itok=JWmFcYd0");
    }

 .paymentWrap .paymentBtnGroup .paymentMethod .method.paypal {
     background-image: url("data:image/png;base64,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");    }



    .paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
        border-color: #4cd264;
        outline: none !important;
    }
</style>


</body>
</html>
