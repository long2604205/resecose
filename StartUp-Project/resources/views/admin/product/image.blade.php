@extends('admin.master')
@section('body')
<!-- horizontal Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">{{$pagename}}</h4>
        </div>
    </div>
    <form method="POST" action="{{$action}}">
        <div class="form-group">
            <label>Product's name</label>
            <input class="form-control" value="{{$detail->name ?? ''}}" type="text" placeholder="" readonly>
            <input class="form-control" name="product_id" value="{{$detail->id ?? ''}}" type="hidden" placeholder=""
                readonly>
        </div>
        <label onclick="openfile('image')">Product's image</label>
        <div class="form-group">
            @if ($items->image??'' == '')
            <img src="{{asset('img/NA.png')}}" onclick="openfile('image')" width="100" />
            @else
            <img src="{{$items->image ?? ''}}" onclick="openfile('image')" width="100" />
            @endif
            <input value="{{$items->image ?? ''}}" type="hidden" name="image" id="image" class="form-control"
                placeholder="" required>
            {{-- <button type="button" onclick="openfile('image')" class="btn btn-primary">Chọn file</button> --}}
        </div>
        <div class="form-group">
            <label onclick="openfile('image')">Click the image icon to upload product images</label>
        </div>
        <div class="form-group text-right">
            <a href="{{route('product.show', $detail->id)}}" type="button" class="btn btn-secondary">BACK</a>
            @csrf
            @method($method)
            <button type="submit" value="1" class="btn btn-primary">SAVE</button>
        </div>
    </form>
        <label>List Product's Image</label>
        <div class="row">
            @foreach ($img as $imgs)
            <div class="col-4 mt-4">
                {{-- <img src="{{$imgs->img}}"
                    class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                    alt=""> --}}
                <div class="card" style="">
                    <img class="card-img-top" src="{{$imgs->img}}" alt="Card image cap">
                    <div class="card-body text-center">
                        <form method="POST" id="form-{{$imgs->id}}"
                            action="{{ route('product.remove', $imgs->id) }}">
                            @csrf
                            @method('DELETE')
                            <a type="button" onclick="if(confirm('Do you want to delete this Item')){document.getElementById('form-{{$imgs->id}}').submit()}" class="btn btn-danger">Remove</a>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
<!-- horizontal Basic Forms End -->
@endsection
