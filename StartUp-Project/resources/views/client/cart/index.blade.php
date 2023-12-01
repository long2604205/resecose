@extends('client.master')
@section('main')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="{{route('home.index')}}">Home</a>
                        <a href="{{route('shop.index')}}">Shop</a>
                        <span>Shopping Cart</span>
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
            <div class="col-lg-8">
                @if($list)
                <form id="cart" action="{{route('cart.update')}}">
                    <div class="shopping__cart__table">
                        @if (session('type'))
                        <div class="alert alert-{{session('type')}}" role="alert">
                            <strong>{!!session('msg')!!}</strong>
                        </div>
                        @endif
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($list as $item)
                                @php
                                    $amount = $item['price'] * $item['buyqty'];
                                    $total+=$amount;
                                @endphp
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{$item['image']}}" style="height: 100px" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$item['name']}}</h6>
                                            <h5>${{number_format($item['price'])}}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input name="qty[{{$item['id']}}]" type="text" value="{{number_format($item['buyqty'])}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ {{number_format($amount)?? ''}}</td>
                                    <td class="cart__close"><a onclick="return confirm('Do you really want to remove product?')" href="{{ route('cart.removeitem', ['id'=>$item['id']]) }}"><i class="fa fa-close"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{ url('/' )}}">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="#" onclick="document.getElementById('cart').submit();"><i class="fa fa-spinner"></i> Update cart</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Cart is empty</h3>
                        <br>
                        <div class="continue__btn">
                            <a href="{{ url('/' )}}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Cart total</h6>
                </div>
                <div class="cart__total">
                    <h6>total detail</h6>
                    <ul>
                        <li>Subtotal <span>$ {{number_format($total ?? 0)}}</span></li>
                        <li>Total <span>$ {{number_format($total ?? 0)}}</span></li>
                    </ul>
                    <a href="{{route('checkout.index')}}" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection
