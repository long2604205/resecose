@extends('client.master')
@section('main')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="{{route('home.index')}}">Home</a>
                        <a href="{{route('shop.index')}}">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form method="POST" action="{{ route('checkout.checkoutPost') }}">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">Billing Details</h6>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Name<span>*</span></p>
                                    <input type="text" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input name="address" type="text" placeholder="Street Address" class="checkout__input__add" required>
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input name="city" type="text" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input name="phone" type="number" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input name="email" type="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input name="notes" type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul class="checkout__total__products">
                                @php
                                $total = 0;
                                $subtotal = 0;
                                @endphp
                                @foreach ($list as $item)
                                @php
                                $amount = $item['price'] * $item['buyqty'];
                                // $total+=$amount;
                                $subtotal +=$amount;
                                $total= $subtotal + 40000;
                                @endphp
                                <li>{{number_format($item['buyqty'])}}. {{$item['name']}} <span>{{number_format($amount)?? ''}} VNĐ</span></li>
                                @endforeach
                                <li>Two-way shipping fee <span>40,000 VNĐ</span></li>
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Subtotal <span>{{number_format($subtotal ?? 0)}} VNĐ</span></li>
                                <li>Total <span>{{number_format($total ?? 0)}} VNĐ</span></li>
                            </ul>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @csrf
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
