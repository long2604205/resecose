@extends('client.master')
@section('main')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    {{-- <h4>Laundry Service</h4> --}}
                    <div class="breadcrumb__links">
                        <a href="{{route('home.index')}}">Home</a>
                        <span>Laundry Service</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-blog set-bg" data-setbg="{{asset('client/img/breadcrumb-bg.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Laundry Service</h2>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="alert alert-{{session('type')}} alert-dismissible fade show text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{session('msg')}}</strong> {{session('text')}}
        </div>
        <div class="checkout__form">
            <form method="POST" action="{{$action ?? ''}}">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">Service Details</h6>
                        <div class="checkout__input">
                            <p>Weight<span>*</span></p>
                            <input name="weight" type="number" step="any" id="kg-input" placeholder="Weight of clothes"
                                class="checkout__input__add mb-0" oninput="calculate()" min="0" step="0.1" required>
                            <div id="error-message" class="error-message"></div>
                            {{-- <span id="error-message" style="color: red;"></span> --}}
                            <input name="cost" type="number" id="cost-input" placeholder="Estimated cost" readonly>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Name<span>*</span></p>
                                    <input name="name" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input name="address" type="text" required>
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
                            <input name="note" type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Service <span>Total</span></div>
                            <ul class="checkout__total__products">
                                <li>Laundry clothes <span id="cost-span">0 VNĐ</span></li>
                                <li>Weight <span id="kg-span">0 KG</span></li>
                                <li>Shipping fee <span>Waiting for response</span></li>
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Total <span id="cost-span2">0 VNĐ</span></li>
                            </ul>
                            @csrf
                            @method($method ?? '')
                            <button type="submit" value="1" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <style>
        .error-message {
            color: #cc0033;
            display: inline-block;
            font-size: 12px;
            line-height: 15px;
            margin: 5px 0 0;
        }

        .input-group .error-message {
            display: none;
        }


        /* Error Styling */

        .error label {
            color: #cc0033;
        }

        .error input[type=text] {
            background-color: #fce4e4;
            border: 1px solid #cc0033;
            outline: none;
        }

        .error .error-message {
            display: inline-block;
        }
    </style>
</section>
<!-- Checkout Section End -->
@endsection
