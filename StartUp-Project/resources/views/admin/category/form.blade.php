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
        <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{session('msg')}}</strong>
        </div>
        <div class="form-group" >
            <label>Name</label>
            <input class="form-control" value="{{$items->name ?? ''}}" name="name" id="name" onchange="stralias('name','alias')" type="text" placeholder="" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="selectpicker form-control" name="status" data-size="5" data-style="btn-outline-info">
                <option {{old('status', $items->status?? 1)==1 ? 'selected':''}} value="1">Publish</option>
                <option {{old('status', $items->status?? 1)==2 ? 'selected':''}}  value="2">Hide</option>
            </select>
        </div>
        <div class="form-group text-right">
            <a href="{{route('category.index')}}" type="button" class="btn btn-secondary">BACK</a>
            @csrf
            @method($method)
            <button name="button" type="submit" value="1" class="btn btn-primary">SAVE</button>
        </div>
    </form>
</div>
<!-- horizontal Basic Forms End -->
@endsection
