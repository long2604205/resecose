@extends('admin.master')
@section('body')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="pull-right">
                        <a href="{{route('product.createImage', $detail->id)}}" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                        role="button">ADD PRODUCT'S IMAGES</a>
                    </div>
                    <div class="title">
                        <h4>{{$pagename}}</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$pagename}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="product-wrap">
            <div class="product-detail-wrap mb-30">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="product-slider slider-arrow">
                            @foreach ($img as $imgs)
                            <div class="product-slide">
                                <img src="{{$imgs->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div class="product-slider-nav">
                            @foreach ($img as $imgs)
                            <div class="product-slide-nav">
                                <img src="{{$imgs->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="product-detail-desc pd-20 card-box height-100-p">
                            <h4 class="mb-20 pt-20">{{$detail->name}}</h4>
                            <p>{{$detail->content}}</p>
                            <p>{{$detail->description}}</p>
                            <div class="price">
                                Price: <ins>${{$detail->price}}</ins>
                                <ins></ins>
                                Category: <ins>{{$detail->categoryname}}</ins>
                                <ins></ins>
                                Size: <ins>{{$detail->size}}</ins>
                            </div>
                            <div class="price">
                                Quantity: <ins>{{$detail->qty}}</ins>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
