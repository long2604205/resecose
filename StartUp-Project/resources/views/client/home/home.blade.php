@extends('client.master')
@section('main')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="{{asset('client/img/hero/hero-3.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Clothing Collection</h6>
                            <h2>Secondhand Clothing Collections</h2>
                            <p>Explore the collection of secondhand fashion - unique personal expression. Each used item
                                is delicately selected and committed to bringing elegance and originality to your
                                wardrobe.</p>
                            <a href="{{route('shop.index')}}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__items set-bg" data-setbg="{{asset('client/img/hero/hero-4.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Handmade Collection</h6>
                            <h2>Color - Handmade Collection 2023</h2>
                            <p>Explore a collection of trendy handmade items - beauty embodies sophistication. Each
                                product is expertly and ethically crafted, committed to bringing exceptional quality to
                                your experience.</p>
                            <a href="{{ route('shop.shows', $shophand) }}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<section class="banner spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-4">
                <div class="banner__item">
                    <div class="banner__item__pic">
                        <img src="{{asset('client/img/banner/banner-1.jpg')}}" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Clothing</h2>
                        <a href="{{ route('shop.index') }}">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic">
                        <img src="{{asset('client/img/banner/banner-2.jpeg')}}" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Handmade</h2>
                        <a href="{{ route('shop.shows', $shophand) }}">Shop now</a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-7">
                <div class="banner__item banner__item--last">
                    <div class="banner__item__pic">
                        <img src="{{asset('client/img/banner/banner-3.jpg')}}" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Shoes Spring 2030</h2>
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Best of Resecose</li>
                    <li data-filter=".new-arrivals">Clothing</li>
                    <li data-filter=".hot-sales">Handmade</li>
                </ul>
            </div>
        </div>
        @if (session('type'))
        <div class="alert alert-{{session('type')}}" role="alert">
            <strong>{{session('msg')}}</strong>
        </div>
        @endif
        <div class="row product__filter">
            @foreach ($list as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item">
                    @if ($item->image == '')
                    <div class="product__item__pic set-bg" data-setbg="{{asset('img/NA.png')}}">
                        @else
                        <div class="product__item__pic set-bg" data-setbg="{{$item->image}}">
                            @endif
                            <span class="label">New</span>
                            <ul class="product__hover">
                                <li><a href="{{route('pro.detail', ['alias'=>$item->alias,'id'=>$item->id])}}"><img
                                            src="{{asset('client/img/icon/search.png')}}"
                                            alt=""><span>Details</span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$item->name}}</h6>
                            <a href="{{route('cart.addtocart', $item->id)}}" class="add-cart">+ Add To Cart</a>
                            <h5>{{number_format($item->price, 0, '', ',')}} VNĐ</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($listhand as $hand)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{$hand->image}}">
                            <span class="label">New</span>
                            <ul class="product__hover">
                                <li><a href="{{route('pro.detail', ['alias'=>$hand->alias,'id'=>$hand->id])}}"><img
                                            src="{{asset('client/img/icon/search.png')}}"
                                            alt=""><span>Details</span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$hand->name}}</h6>
                            <a href="{{route('cart.addtocart', $hand->id)}}" class="add-cart">+ Add To Cart</a>
                            <h5>{{number_format($hand->price, 0, '', ',')}} VNĐ</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{asset('client/img/product/product-3.jpg')}}">
                            <span class="label">Sale</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{asset('client/img/icon/heart.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('client/img/icon/compare.png')}}" alt="">
                                        <span>Compare</span></a></li>
                                <li><a href="#"><img src="{{asset('client/img/icon/search.png')}}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Multi-pocket Chest Bag</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$43.48</h5>
                            <div class="product__color__select">
                                <label for="pc-7">
                                    <input type="radio" id="pc-7">
                                </label>
                                <label class="active black" for="pc-8">
                                    <input type="radio" id="pc-8">
                                </label>
                                <label class="grey" for="pc-9">
                                    <input type="radio" id="pc-9">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{asset('client/img/product/product-4.jpg')}}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{asset('client/img/icon/heart.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('client/img/icon/compare.png')}}" alt="">
                                        <span>Compare</span></a></li>
                                <li><a href="#"><img src="{{asset('client/img/icon/search.png')}}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Diagonal Textured Cap</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$60.9</h5>
                            <div class="product__color__select">
                                <label for="pc-10">
                                    <input type="radio" id="pc-10">
                                </label>
                                <label class="active black" for="pc-11">
                                    <input type="radio" id="pc-11">
                                </label>
                                <label class="grey" for="pc-12">
                                    <input type="radio" id="pc-12">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{asset('client/img/product/product-5.jpg')}}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{asset('client/img/icon/heart.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('client/img/icon/compare.png')}}" alt="">
                                        <span>Compare</span></a></li>
                                <li><a href="#"><img src="{{asset('client/img/icon/search.png')}}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Lether Backpack</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$31.37</h5>
                            <div class="product__color__select">
                                <label for="pc-13">
                                    <input type="radio" id="pc-13">
                                </label>
                                <label class="active black" for="pc-14">
                                    <input type="radio" id="pc-14">
                                </label>
                                <label class="grey" for="pc-15">
                                    <input type="radio" id="pc-15">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{asset('client/img/product/product-6.jpg')}}">
                            <span class="label">Sale</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{asset('client/img/icon/heart.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('client/img/icon/compare.png')}}" alt="">
                                        <span>Compare</span></a></li>
                                <li><a href="#"><img src="{{asset('client/img/icon/search.png')}}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Ankle Boots</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$98.49</h5>
                            <div class="product__color__select">
                                <label for="pc-16">
                                    <input type="radio" id="pc-16">
                                </label>
                                <label class="active black" for="pc-17">
                                    <input type="radio" id="pc-17">
                                </label>
                                <label class="grey" for="pc-18">
                                    <input type="radio" id="pc-18">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{asset('client/img/product/product-7.jpg')}}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{asset('client/img/icon/heart.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('client/img/icon/compare.png')}}" alt="">
                                        <span>Compare</span></a></li>
                                <li><a href="#"><img src="{{asset('client/img/icon/search.png')}}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>T-shirt Contrast Pocket</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$49.66</h5>
                            <div class="product__color__select">
                                <label for="pc-19">
                                    <input type="radio" id="pc-19">
                                </label>
                                <label class="active black" for="pc-20">
                                    <input type="radio" id="pc-20">
                                </label>
                                <label class="grey" for="pc-21">
                                    <input type="radio" id="pc-21">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{asset('client/img/product/product-8.jpg')}}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{asset('client/img/icon/heart.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('client/img/icon/compare.png')}}" alt="">
                                        <span>Compare</span></a></li>
                                <li><a href="#"><img src="{{asset('client/img/icon/search.png')}}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Basic Flowing Scarf</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$26.28</h5>
                            <div class="product__color__select">
                                <label for="pc-22">
                                    <input type="radio" id="pc-22">
                                </label>
                                <label class="active black" for="pc-23">
                                    <input type="radio" id="pc-23">
                                </label>
                                <label class="grey" for="pc-24">
                                    <input type="radio" id="pc-24">
                                </label>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
</section>
<!-- Product Section End -->

<!-- Categories Section Begin -->
<section class="categories spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories__text">
                    <h2>Clothings <br /> <span>Handmade</span> <br /> Collection</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories__hot__deal">
                    <img src="{{asset('client/img/madeby.png')}}" alt="">
                    <div class="hot__deal__sticker">
                        <span>Sale Of</span>
                        <h5>129,000</h5>
                        <span>VNĐ</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="categories__deal__countdown">
                    <span>Deal Of The Week</span>
                    <h2>Pink ribbon knit bag</h2>
                    <div class="categories__deal__countdown__timer" id="countdown">
                        <div class="cd-item">
                            <span>3</span>
                            <p>Days</p>
                        </div>
                        <div class="cd-item">
                            <span>1</span>
                            <p>Hours</p>
                        </div>
                        <div class="cd-item">
                            <span>50</span>
                            <p>Minutes</p>
                        </div>
                        <div class="cd-item">
                            <span>18</span>
                            <p>Seconds</p>
                        </div>
                    </div>
                    <a href="{{ route('shop.shows', $shophand) }}" class="primary-btn">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Instagram Section Begin -->
<section class="instagram spad mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="instagram__pic">
                    <div class="instagram__pic__item set-bg"
                        data-setbg="{{asset('client/img/instagram/ins-1.png')}}"></div>
                    <div class="instagram__pic__item set-bg"
                        data-setbg="{{asset('client/img/instagram/ins-2.png')}}"></div>
                    <div class="instagram__pic__item set-bg"
                        data-setbg="{{asset('client/img/instagram/ins-3.png')}}"></div>
                    <div class="instagram__pic__item set-bg"
                        data-setbg="{{asset('client/img/instagram/ins-4.png')}}"></div>
                    <div class="instagram__pic__item set-bg"
                        data-setbg="{{asset('client/img/instagram/ins-5.png')}}"></div>
                    <div class="instagram__pic__item set-bg"
                        data-setbg="{{asset('client/img/instagram/ins-6.png')}}"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="instagram__text">
                    <h2>Instagram</h2>
                    <p>"Explore our exciting world on Instagram! Click Follow now not to miss our classy handmade and
                        specially curated secondhand collections. Follow us to experience unique designs. , great deals,
                        and creative fashion stories. We won't let you down!"</p>
                    <h3>#Resecose</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Instagram Section End -->


@endsection
