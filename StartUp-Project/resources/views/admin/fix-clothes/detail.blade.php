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
                            <li class="breadcrumb-item"><a href="{{route('product.index')}}">Fix Clothes List</a></li>
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
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Clothes</th>
                                        <th scope="col">Type fix clothes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$detail->name}}</td>
                                        <td>{{$detail->phone}}</td>
                                        <td>{{$detail->email}}</td>
                                        <td>{{$detail->address}}</td>
                                        <td>{{$detail->clothes}}</td>
                                        <td>{{$detail->type}}</td>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                        <div class="product-detail-desc pd-20 card-box height-100-p">
                            <div class="price ml-2">
                                Photos: <ins></ins>
                                <!-- Gallery -->
                                <div class="row mt-4" id="gallery" data-toggle="modal" data-target="#exampleModal">
                                    @php
                                    $i = -1
                                    @endphp
                                    @foreach ($image as $images)
                                    @php
                                    $i = $i + 1
                                    @endphp
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <img class="w-100" src="{{asset($images)}}" alt="First slide"
                                            data-target="#carouselExample" data-slide-to="{{$i}}">
                                    </div>
                                    @endforeach
                                </div>

                                <!-- Modal -->
                                <!-- This part is straight out of Bootstrap docs. Just a carousel inside a modal.-->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="carouselExample" class="carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        @php
                                                        $i = -1
                                                        @endphp
                                                        @foreach ($image as $images)
                                                        @php
                                                        $i = $i + 1
                                                        @endphp
                                                        <li data-target="#carouselExample" data-slide-to="{{$i}}"
                                                            @if($i==0) class="active" @endif></li>
                                                        @endforeach
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        @php
                                                        $i = -1
                                                        @endphp
                                                        @foreach ($image as $images)
                                                        @php
                                                        $i = $i + 1
                                                        @endphp
                                                        <div class="carousel-item @if ($i == 0) active @endif">
                                                            <img class="d-block w-100" src="{{asset($images)}}"
                                                                alt="Slide {{$i}}">
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExample"
                                                        role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExample"
                                                        role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
