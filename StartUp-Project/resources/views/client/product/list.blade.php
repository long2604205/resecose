@extends('client.shop.shop')
@section('list_product')
<div class="col-lg-9">
    <div class="shop__product__option">
        @if (session('type'))
        <div class="alert alert-{{session('type')}}" role="alert">
            <strong>{{session('msg')}}</strong>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="shop__product__option__left">
                    <p>Showing {{$list->firstitem()}} - {{$list->lastitem()}} of {{$list->total()}} results</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                {{-- <div class="shop__product__option__right">
                    <p>Sort by Price:</p>
                    <select>
                        <option value="">Low To High</option>
                        <option value="">$0 - $55</option>
                        <option value="">$55 - $100</option>
                    </select>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($list as $item)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="{{$item->image}}">
                    <ul class="product__hover">
                        <li><a href="{{route('pro.detail', ['alias'=>$item->alias,'id'=>$item->id])}}"><img src="{{asset('client/img/icon/search.png')}}"
                                    alt=""><span>Detail</span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6>{{$item->name}}</h6>
                    <a href="{{route('cart.addtocart', $item->id)}}" class="add-cart">+ Add To Cart</a>
                    <h5>{{number_format($item->price, 0, '', ',')}} VNĐ</h5>
                    {{-- <div class="product__color__select">
                        <label for="pc-4">
                            <input type="radio" id="pc-4">
                        </label>
                        <label class="active black" for="pc-5">
                            <input type="radio" id="pc-5">
                        </label>
                        <label class="grey" for="pc-6">
                            <input type="radio" id="pc-6">
                        </label>
                    </div> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="product__pagination">
                {{ $list->links('client.widgets.my-paginate') }}
                {{-- <span>...</span> --}}
            </div>
        </div>
    </div>
</div>
@endsection
