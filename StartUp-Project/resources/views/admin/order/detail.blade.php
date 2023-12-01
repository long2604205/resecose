@extends('admin.master')
@section('body')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>{{$pagename}}</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('order-list.index')}}">Order List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$pagename}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="product-wrap">
            <div class="product-detail-wrap mb-30">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="product-detail-desc pd-20 card-box height-100-p">
                            <div class="price text-center">
                                CUSTOMER<ins></ins>
                            </div>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">City</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$detail->name}}</td>
                                        <td>{{$detail->phone}}</td>
                                        <td>{{$detail->email}}</td>
                                        <td>{{$detail->address}}</td>
                                        <td>{{$detail->city}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="price mt-4 ml-2">
                                Notes: <ins>{{$detail->note}}</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                        <div class="product-detail-desc pd-20 card-box height-100-p">
                            <div class="price text-center">
                                ORDER<ins></ins>
                            </div>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Code</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <b>{{$detail->code}}</b></td>
                                        <td>{{ date('F d, Y', strtotime($detail->order_date)) }}
                                        </td>
                                        <td>{{$detail->total_amount}}</td>
                                        <td>{{$detail->order_notes}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                        <div class="product-detail-desc pd-20 card-box height-100-p">
                            <div class="price text-center">
                                ORDER DETAIL<ins></ins>
                            </div>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $orderDetail)
                                    <tr>
                                        <td> <b>{{$orderDetail->productname}}</b></td>
                                        <td>{{number_format($orderDetail->price, 0, '', ',')}} VNĐ</td>
                                        <td>{{$orderDetail->qty}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
