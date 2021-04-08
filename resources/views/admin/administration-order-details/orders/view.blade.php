@extends('layouts.admin.base')
@section('title', 'Orders Detals')
@section('content')

    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('orders.index') }}">Orders Detals</a></li>
                </ul>
            </div>
            <hr>
            <div class="container pt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-heard" style="padding: 30px 0 20px 0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="card-title pl-3 text-uppercase font-18">Login information</h3>
                                    </div>
                                    <div class="col-md-6 pr-5" >
                                        <div class="card-tools" style="float: right;">
                                            {{--                                            <a href="{{ route('brands.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Brand</a>--}}
                                            {{--                                        <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#Registration"><i class="fas fa-plus-circle"></i>Create Category </button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body p-0">
                                @include('partials.alert')
                                @php
                                    $index = 0;
                                @endphp
                                <table class="table table-hover data-table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                {{--                                {{ $brands -> links('pagination::bootstrap-4') }}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container pt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-heard" style="padding: 30px 0 20px 0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="card-title pl-3 text-uppercase font-18">Shipping information</h3>
                                    </div>
                                    <div class="col-md-6 pr-5" >
                                        <div class="card-tools" style="float: right;">
                                            {{--                                            <a href="{{ route('brands.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Brand</a>--}}
                                            {{--                                        <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#Registration"><i class="fas fa-plus-circle"></i>Create Category </button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body p-0">
                                @include('partials.alert')
                                <table class="table table-hover data-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>{{ $shipping->customer_name }}</td>
                                            <td>{{ $shipping->email }}</td>
                                            <td>{{ $shipping->address }}</td>
                                            <td>{{ $shipping->customer_phone }}</td>
                                            <th>{{ $shipping->note }}</th>
                                        </tr>

                                    </tbody>
                                </table>
                                {{--                                {{ $brands -> links('pagination::bootstrap-4') }}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container pt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-heard" style="padding: 30px 0 20px 0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="card-title pl-3 text-uppercase font-18">Order details</h3>
                                    </div>
                                    <div class="col-md-6 pr-5" >
                                        <div class="card-tools" style="float: right;">
                                            {{--                                            <a href="{{ route('brands.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Brand</a>--}}
                                            {{--                                        <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#Registration"><i class="fas fa-plus-circle"></i>Create Category </button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body p-0">
                                @include('partials.alert')
                                <table class="table table-hover data-table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order_details as $order_detail)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td><img width="100" src="{{ asset('assets/uploads/products') }}/{{ $order_detail->product_image }}" alt=""></td>
                                        <td>{{ $order_detail->product_name }}</td>
                                        <td>{{ $order_detail->product_price }}</td>
                                        <td>{{ $order_detail->product_sale_qty }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{--                                {{ $brands -> links('pagination::bootstrap-4') }}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


