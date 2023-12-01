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
                        <span>Fix Clothes Service</span>
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
                <h2>Fix Clothes Service</h2>
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
            <form method="POST" action="{{$action ?? ''}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">Service Details</h6>
                        <div class="checkout__input">
                            <p>Clothes<span>*</span></p>
                            <input name="clothes" type="text"
                                placeholder="Type of clothes to be fix, e.g. pants, t-shirts, skirts, ect." required>
                        </div>
                        <div class="checkout__input">
                            <p>Type fix clothes<span>*</span></p>
                            <input name="type_fix" type="text"
                                placeholder="Type fix clothes, e.g. resize, hemming, replace zipper, ect." required>
                        </div>
                        {{-- <div class="checkout__input">
                            <p>Images<span>*</span></p>
                            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                            <input name="images[]" multiple type="file"
                                placeholder="Type fix clothes, e.g. resize, hemming, replace zipper, ect." required>
                        </div> --}}
                        <div class="checkout__input mb-4">
                            <p>Photo of clothes<span>*</span></p>
                            <p><span>Take photo of the front and back of the clothes and where they need to be fixed and upload them</span></p>
                            <input type="file" id="images" name="images[]" multiple required>
                            <div class="row" id="image-preview">
                                <div class="col-md-3">
                                    <div class="image-container">
                                        <span>Photo</span>
                                        <img src="" alt="">
                                    </div>
                                </div>
                            </div>
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
                                <li>Fix Clothes<span id="cost-span">Waiting for response</span></li>
                                <li>Shipping fee <span>Waiting for response</span></li>
                            </ul>
                            {{-- <ul class="checkout__total__all">
                                <li>Total <span id="cost-span2">0 VNĐ</span></li>
                            </ul> --}}
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
