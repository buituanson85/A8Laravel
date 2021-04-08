@extends('layouts.pages.base')
@section('title', 'History Order')
@section('content')
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="/" class="permal-link">Home Pages</a></li>
                <li class="nav-item"><span class="current-page">History Order</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain shopping-cart">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <!--Top banner-->


                <!--Cart Table-->
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title" style="text-align: center">History Order Details</h3>
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{ Session::get('success') }}!</strong>
                                </div>
                            @endif
                            @php
                            $index = 0;
                            @endphp
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Code</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Method</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($get_all_datas == true)
                                        @foreach($get_all_datas as $get_all_data)
{{--                                    {{ route('single-products.show', $cart['product_id']) }}--}}
                                        <tr class="cart_item">
                                            <td>
                                                <div class="price price-contain">

                                                    <ins><span class="price-amount"><span class="currencySymbol">{{ ++$index }}</span></span></ins>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="currencySymbol">{{ $get_all_data->order_id }}</span>
                                            </td>
                                            <td>
                                                <a class="prd-thumb" href="">
                                                    <figure><img width="50" height="50" src="{{ asset('assets/uploads/products') }}/{{ $get_all_data->product_image }}" alt="shipping cart"></figure>
                                                </a>
                                            </td>
                                            <td>
                                                <span class="currencySymbol">{{ $get_all_data->product_name }}</span>
                                            </td>
                                            <td>
                                                <span class="currencySymbol">{{ $get_all_data->product_price }}</span>
                                            </td>
                                            <td>
                                                <span class="currencySymbol">{{ $get_all_data->product_sale_qty }}</span>
                                            </td>
                                            <td>
                                                <span class="currencySymbol">{{ $get_all_data->method }}</span>
                                            </td>
                                            <td>
                                                @if( $get_all_data->status == 0)
                                                    <a href="" class="btn btn-sm btn-warning">Pendding</a>
                                                @elseif($get_all_data->status == 1)
                                                    <a href="" class="btn btn-sm btn-success">Delivering</a>
                                                @elseif($get_all_data->status == 2)
                                                    <a href="" class="btn btn-sm btn-default">Received</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($get_all_data->status == 2)
                                                <form action="{{ route('orderDetails.destroy', $get_all_data->order_id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                </form>
                                                @else

                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr class="cart_item">
                                            <td><span style="font-size: 18px;color: red;">Please add product to order</span></td>
                                        </tr>
                                    @endif

                                    <tr class="cart_item wrap-buttons">

                                        <td class="wrap-btn-control" colspan="4">
                                            <a class="btn back-to-shop">Back to Shop</a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection





