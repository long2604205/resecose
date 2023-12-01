@extends('client.master')
@section('main')
<!-- Shop Details Section Begin -->
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="{{route('home.index')}}">Home</a>
                        <a href="{{route('shop.index')}}">Shop</a>
                        <span>Product Details</span>
                    </div>
                    @if (session('type'))
                    <div class="alert alert-{{session('type')}}" role="alert">
                        <strong>{{session('msg')}}</strong>
                    </div>
                    @endif
                </div>
            </div>
            <script>
                function activateTab(event) {
                    event.preventDefault();
                    var clickedTab = event.currentTarget;
                    var tabSelector = clickedTab.getAttribute('href');
                    console.log("tabSelector: ", tabSelector);
                    var parentWrapper = clickedTab.closest('.row');
                    console.log("parentWrapper: ", parentWrapper);
                    parentWrapper.find('.nav-item .nav-link').removeClass('active');
                    clickedTab.classList.add('active');
                    parentWrapper.find('.tab-pane').removeClass('active show');
                    parentWrapper.find(tabSelector).addClass('active show');
                }
            </script>

            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <ul class="nav nav-tabs" role="tablist">
                        @php
                        $i = 0;
                        @endphp
                        @foreach ($img as $imgs)
                        @php
                        $i++;
                        $activeClass = $i === 1 ? 'active' : ''; //add active class to the first tab-pane by default
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link {{$activeClass}}" data-toggle="tab" href="#tabs-{{$i}}" role="tab"
                                onclick="activateTab(event)">
                                <div class="product__thumb__pic set-bg" data-setbg="{{$imgs->img}}">
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        @php
                        $j = 0;
                        @endphp
                        @foreach ($img as $imgs)
                        @php
                        $j++;
                        $activeClass = $j === 1 ? 'active show' : ''; //add active class to the first tab-pane by default
                        @endphp
                        <div class="tab-pane {{$activeClass}}" id="tabs-{{$j}}" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="{{$imgs->img}}" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4>{{$detail->name}}</h4>
                        {{-- <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Reviews</span>
                        </div> --}}
                        {{-- <h3>$50 <span>70.00</span></h3> --}}
                        <h3>${{$detail->price}}</h3>
                        <p>{{$detail->description}}</p>
                        <div class="row">
                            <div class="col-12">
                                <label>
                                    <p><b>Categories:</b> {{$detail->categoryname}}</p>
                                </label>
                                <div class="product__details__option">
                                    <div class="product__details__option__size">
                                        <span>Size:</span>
                                        <label>
                                            {{$detail->size}}
                                            <input selected type="radio" id="xxl">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-4">
                                <div class="product__details__option">
                                    <div class="product__details__option__size">
                                        <span>Size:</span>
                                        <label>
                                            {{$detail->size}}
                                            <input selected type="radio" id="xxl">
                                        </label>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-4">
                                <label>
                                    <p><b>Brand:</b> {{$detail->suppliername}}</p>
                                </label>
                            </div> --}}
                        </div>
                        <div class="product__details__cart__option">
                            <a href="{{route('cart.addtocart', $detail->id)}}" class="primary-btn">add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="product__details__tab__content__item">
                                        <h5>Products Infomation</h5>
                                        <p>{{$detail->content}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Details Section End -->

<!-- Related Section Begin -->
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Product</h3>
            </div>
        </div>
        <div class="row">
            @foreach ($product as $products)
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{$products->image}}">
                        <ul class="product__hover">
                            <li><a href="{{route('pro.detail', ['alias'=>$products->alias,'id'=>$products->id])}}"><img src="{{asset('client/img/icon/search.png')}}" alt=""></a><span>Compare</span></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$products->name}}</h6>
                        <a href="{{route('cart.addtocart', $products->id)}}" class="add-cart">+ Add To Cart</a>
                        <h5>${{number_format($products->price, 0, '', ',')}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Section End -->
@endsection


{{-- @foreach ($product as $products)
<div class="product__item">
    <div class="product__item__pic set-bg" data-setbg="{{$products->image}}">
        <ul class="product__hover">
            <li><a href="{{route('pro.detail', ['alias'=>$products->alias,'id'=>$products->id])}}"><img src="{{asset('client/img/icon/search.png')}}"
                        alt=""><span>Detail</span></a></li>
        </ul>
    </div>
    <div class="product__item__text">
        <h6>{{$products->name}}</h6>
        <a href="{{route('cart.addtocart', $products->id)}}" class="add-cart">+ Add To Cart</a>
        <h5>${{$products->price}}</h5>
        <div class="product__color__select">
            <label for="pc-4">
                <input type="radio" id="pc-4">
            </label>
            <label class="active black" for="pc-5">
                <input type="radio" id="pc-5">
            </label>
            <label class="grey" for="pc-6">
                <input type="radio" id="pc-6">
            </label>
        </div>
    </div>
</div>
@endforeach --}}
