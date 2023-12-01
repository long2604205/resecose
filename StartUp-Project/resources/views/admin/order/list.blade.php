@extends('admin.master')
@section('body')
<div class="card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h2 class="h4 pd-20">{{$title}} ({{$total}})</h2>
        </div>
    </div>
    <table class="data-table table nowrap">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                {{-- <th>Brand</th> --}}
                <th class="datatable-nosort">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $item)
            <tr>
                <td class="table-plus">
                    <h5 class="font-16">{{$item->name}}</h5>
                </td>
                <td>
                    <h5 class="font-16">{{$item->address}}</h5>
                </td>
                <td>
                    <h5 class="font-16">{{$item->phone}}</h5>
                </td>
                <td>
                    <h5 class="font-16">{{$item->email}}</h5>
                </td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                            role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ route('order-list.show', $item->id) }}"><i class="dw dw-eye"></i> View</a>
                            <form method="POST" id="form-{{$item->id}}"
                                action="{{ route('order-list.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <a class="dropdown-item" type="button"
                                    onclick="if(confirm('Do you want to delete this Item')){document.getElementById('form-{{$item->id}}').submit()}"><i
                                        class="dw dw-delete-3"></i> Delete</a>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
