@extends('client.master')
@section('main')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>About Us</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>About Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- About Section Begin -->
<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about__pic">
                    <img src="{{asset('client/img/about/about-us.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="about__item">
                    <h4>Who We Are ?</h4>
                    <p>At Resecose, we provide a platform and a convenient community to consign used clothing and
                        showcase unique handcrafted products.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="about__item">
                    <h4>Who We Do ?</h4>
                    <p>Resecose offers consignment services selling second-hand clothing and handmade goods. In
                        addition, we also provide professional laundry and garment repair services to ensure your
                        clothes are always clean and fresh.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="about__item">
                    <h4>Why Choose Us ?</h4>
                    <p>Wide range of products: We offer a wide range of unique handmade and second-hand clothing products for you to choose from.
                        Quality care: Our laundry and garment repair services are carried out by professionals, ensuring quality and dedication.
                        Convenience: We create an environment where people can drop-in clothes and sell them online for a low fee.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->
<!-- Testimonial Section Begin -->
{{-- <section class="testimonial">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="testimonial__text">
                    <span class="icon_quotations"></span>
                    <p>“Going out after work? Take your butane curling iron with you to the office, heat it up,
                        style your hair before you leave the office and you won’t have to make a trip back home.”
                    </p>
                    <div class="testimonial__author">
                        <div class="testimonial__author__pic">
                            <img src="{{asset('client/img/about/testimonial-author.jpg')}}" alt="">
                        </div>
                        <div class="testimonial__author__text">
                            <h5>Augusta Schultz</h5>
                            <p>Fashion Design</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="testimonial__pic set-bg" data-setbg="{{asset('client/img/about/testimonial-pic.jpg')}}">
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Testimonial Section End -->

<!-- Counter Section Begin -->
<section class="counter spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter__item">
                    <div class="counter__item__number">
                        <h2 class="cn_num">132</h2>
                    </div>
                    <span>Our <br />Clients</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter__item">
                    <div class="counter__item__number">
                        <h2 class="cn_num">20</h2>
                    </div>
                    <span>Total <br />Categories</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter__item">
                    <div class="counter__item__number">
                        <h2 class="cn_num">132</h2>
                    </div>
                    <span>In <br />Country</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter__item">
                    <div class="counter__item__number">
                        <h2 class="cn_num">98</h2>
                        <strong>%</strong>
                    </div>
                    <span>Happy <br />Customer</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Counter Section End -->

<!-- Team Section Begin -->
<section class="team spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Team</span>
                    <h2>Meet Our Team</h2>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="team__item">
                    <img src="{{asset('client/img/about/team-2.png')}}" alt="">
                    <h4>Nguyễn Thị Phú Minh</h4>
                    <span>Chief Executive Officer (C.E.O)</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team__item">
                    <img src="{{asset('client/img/about/team-1.png')}}" alt="">
                    <h4>Hồ Thị Quỳnh Nga</h4>
                    <span>Chief Human Resources Officer (C.H.R.O)</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team__item">
                    <img src="{{asset('client/img/about/team-3.png')}}" alt="">
                    <h4>Đỗ Võ Anh Thư</h4>
                    <span>Chief Financial Officer (C.F.O)</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team__item">
                    <img src="{{asset('client/img/about/team-5.png')}}" alt="">
                    <h4>Kiều Thị Lệ Sa</h4>
                    <span>Chief Product Officer (C.P.O)</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team__item">
                    <img src="{{asset('client/img/about/team-4.png')}}" alt="">
                    <h4>Vũ Hồng Thuỷ</h4>
                    <span>Chief Marketing Officer (C.M.O)</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team Section End -->

<!-- Client Section Begin -->
<section class="clients spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Partner</span>
                    <h2>Our Business Partners</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                <a href="#" class="client__item"><img src="{{asset('client/img/clients/visa.png')}}" style="height:100px" alt=""></a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                <a href="#" class="client__item"><img src="{{asset('client/img/clients/napas.png')}}" style="height:150px" alt=""></a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                <a href="#" class="client__item"><img src="{{asset('client/img/clients/pay.png')}}" style="height:100px;" alt=""></a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                <a href="#" class="client__item"><img src="{{asset('client/img/clients/momo.png')}}" style="height:100px;" alt=""></a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                <a href="#" class="client__item"><img src="{{asset('client/img/clients/youtube.png')}}" style="height:80px;" alt=""></a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                <a href="#" class="client__item"><img src="{{asset('client/img/clients/facebook.png')}}" style="height:100px" alt=""></a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                <a href="#" class="client__item"><img src="{{asset('client/img/clients/google.png')}}" style="height:100px" alt=""></a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                <a href="#" class="client__item"><img src="{{asset('client/img/clients/tiktok.png')}}" style="height:100px" alt=""></a>
            </div>
        </div>
    </div>
</section>
<!-- Client Section End -->
@endsection
