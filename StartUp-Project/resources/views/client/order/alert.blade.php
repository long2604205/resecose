@extends('client.master')
@section('main')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Order Result</h4>
                    <div class="breadcrumb__links">
                        <a href="{{route('home.index')}}">Home</a>
                        <a href="{{route('shop.index')}}">Shop</a>
                        <span>Order result</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Order Success.</h3>
                        <h4>Thank you for your purchase</h4>
                        <h4>Code orders: {{$order->code}}</h4>
                        <br>
                        <div class="continue__btn">
                            <a href="{{ url('/' )}}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection
