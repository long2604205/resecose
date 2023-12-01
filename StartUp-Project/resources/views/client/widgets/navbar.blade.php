<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>The customer is at the heart of our unique business model.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            <a href="mailto:resecoseclothing@gmail.com">Contact : resecoseclothing@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{route('home.index')}}"><img src="{{asset('client/img/rse-logo.png')}}" alt="" style="height: 55px"></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu mt-3">
                    <ul>
                        <li><a href="{{route('home.index')}}">Home</a></li>
                        <li><a href="{{route('shop.index')}}">Shop</a></li>
                        <li><a href="#">Services</a>
                            <ul class="dropdown">
                                <li><a href="{{route('laundry.index')}}">Laundry</a></li>
                                <li><a href="{{route('fix-clothes.index')}}">Fix clothes</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('home.create')}}">About Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option mt-3">
                    {{-- <a href="#" class="search-switch"><img src="{{asset('client/img/icon/search.png')}}" alt="">Bag</a> --}}
                    <a href="{{route('cart.index')}}"><img src="{{asset('client/img/icon/cart.png')}}" alt="">
                        <span>{{count(session('cart') ?? [])}}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->
