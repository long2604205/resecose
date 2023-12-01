@extends('admin.master')
@section('body')
<!-- horizontal Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">{{$pagename}}</h4>
        </div>
    </div>
    <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{session('msg')}}</strong>
    </div>
    <form method="POST" action="{{$action}}">
        <div class="form-group" >
            <label>Name</label>
            <input required class="form-control" value="{{$items->name ?? ''}}" name="name" id="name" onchange="stralias('name','alias')" type="text" placeholder="">
        </div>
        <div class="form-group">
            <label>Alias</label>
            <input required class="form-control" value="{{$items->alias ?? ''}}" id="alias" name="alias" type="text" placeholder="" readonly>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input required class="form-control" value="{{$items->price ?? ''}}" name="price" type="number">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input required class="form-control" value="{{$items->qty ?? ''}}" name="qty" value="0" type="number">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select required class="custom-select2 form-control" name="category" style="width: 100%; height: 38px;">
                <option value="{{$items->category_id ?? ''}}">{{$items->categoryname ?? 'Select Category'}}</option>
                @foreach ($list as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Size</label>
            <select required class="custom-select2 form-control" name="size" style="width: 100%; height: 38px;">
                <option value="{{$items->size ?? ''}}">{{$items->size ?? 'Select Size'}}</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="XXXL">XXXL</option>
            </select>
        </div>
        {{-- <div class="form-group">
            <label>Brand</label>
            <select class="custom-select2 form-control" name="supplier" style="width: 100%; height: 38px;">
                <option value="{{$items->supplier_id ?? ''}}">{{$items->suppliername ?? 'Select Brand'}}</option>
                @foreach ($brand as $brands)
                    <option value="{{$brands->id}}">{{$brands->name}}</option>
                @endforeach
            </select>
        </div> --}}
        <label onclick="openfile('image')">Product's image</label>
        <div class="form-group">
            {{-- <img src="{{$items->image ?? 'http://localhost:8080/img/NA.png'}}" onclick="openfile('image')" width="100" /> --}}
            {{-- @if ($items->image??'' == '')
                <img src="{{asset('img/NA.png')}}" onclick="openfile('image')" width="100" />
            @else
                <img src="{{$items->image ?? ''}}" onclick="openfile('image')" width="100" />
            @endif --}}
            <img src="{{old('image',$items->image?? '/img/NA.png') }}" onclick="openfile('image')" width="100"/>
            <input required value="{{$items->image ?? 'N/A'}}" type="hidden" name="image" id="image" class="form-control" placeholder="">
            {{-- <button type="button" onclick="openfile('image')" class="btn btn-primary">Chọn file</button> --}}
        </div>
        <div class="form-group">
            <label onclick="openfile('image')">Click the image icon to upload product images</label>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="selectpicker form-control" name="status" data-size="5" data-style="btn-outline-info">
                <option {{old('status', $items->status?? 1)==1 ? 'selected':''}} value="1">Publish</option>
                <option {{old('status', $items->status?? 1)==2 ? 'selected':''}}  value="2">Hide</option>
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea required class="form-control border-radius-0" name="description" placeholder="Input description...">{{$items->description ?? ''}}</textarea>
        </div>
        <div class="form-group html-editor">
            <label>Content</label>
            <textarea required class="textarea_editor form-control border-radius-0" name="content" placeholder="Enter text ...">{{$items->content ?? ''}}</textarea>
        </div>
        <div class="form-group text-right">
            <a href="{{route('product.index')}}" type="button" class="btn btn-secondary">BACK</a>
            @csrf
            @method($method)
            <button name="button" type="submit" value="1" class="btn btn-primary">SAVE</button>
        </div>
    </form>
</div>
<!-- horizontal Basic Forms End -->
@endsection
