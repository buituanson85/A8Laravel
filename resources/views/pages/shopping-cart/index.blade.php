@extends('layouts.pages.base')
@section('title', 'Categories Home')
@section('content')
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="/" class="permal-link">Home Pages</a></li>
                <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
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
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Your cart items</h3>
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{ Session::get('success') }}!</strong>
                                </div>
                            @endif
                            <form class="shopping-cart-form" action="{{ url('/update_cart_ajax') }}" method="post">
                                @csrf
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $total_sale = 0;
                                        $total_regular = 0;
                                        $count = 0;
                                    @endphp
                                    @if(Session::get('cart') == true)

                                        @foreach(Session::get('cart') as $cart)
                                            @php
                                                $subtotal_sale = $cart['product_sale_price']*$cart['product_qty'];
                                                $subtotal_regular = $cart['product_regular_price']*$cart['product_qty'];
                                                $total_sale += $subtotal_sale;
                                                $total_regular += $subtotal_regular;
                                                $count++;
                                            @endphp
                                            <tr class="cart_item">
                                                <td class="product-thumbnail" data-title="Product Name">
                                                    <a class="prd-thumb" href="{{ route('single-products.show', $cart['product_id']) }}">
                                                        <figure><img width="113" height="113" src="{{ asset('assets/uploads/products') }}/{{ $cart['product_image'] }}" alt="shipping cart"></figure>
                                                    </a>
                                                    <a class="prd-name" href="{{ route('single-products.show', $cart['product_id']) }}">{{ $cart['product_name'] }}</a>
                                                    <div class="action">
                                                        <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <a href="{{ url('/delete_cart_ajax/'.$cart['session_id']) }}" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </div>
                                                </td>
                                                <td class="product-price" data-title="Price">
                                                    <div class="price price-contain">
                                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>{{ $cart['product_sale_price'] }}</span></ins>
                                                        <del><span class="price-amount"><span class="currencySymbol">£</span>{{ $cart['product_regular_price'] }}</span></del>
                                                    </div>
                                                </td>
                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity-box type1">
                                                        <div class="qty-input">
                                                            <input type="number" id="qty_{{$cart['session_id']}}" min="1" name="cart_qty[{{ $cart['session_id'] }}]" value="{{ $cart['product_qty'] }}">
                                                            {{--                                                    <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>--}}
                                                            {{--                                                    <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>--}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal" data-title="Total">
                                                    <div class="price price-contain">
                                                        <ins><span id="sale_price_{{ $cart['session_id'] }}" class="price-amount"><span class="currencySymbol">£</span>{{ $subtotal_sale }}</span></ins>
                                                        <del><span id="regular_price_{{ $cart['session_id'] }}" class="price-amount"><span class="currencySymbol">£</span>{{ $subtotal_regular }}</span></del>
                                                    </div>
                                                </td>
                                            </tr>
                                            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
                                            <script type="text/javascript">
                                                function displayVals() {
                                                    var singleValues = $( "#qty_{{$cart['session_id']}}" ).val();
                                                    var total_sale_price = singleValues*{{ $cart['product_sale_price'] }};
                                                    var total_regular_price = singleValues*{{ $cart['product_regular_price'] }};
                                                    $("#sale_price_{{ $cart['session_id'] }}").html("£" + total_sale_price + ".00");
                                                    $("#regular_price_{{ $cart['session_id'] }}").html("£" + total_regular_price + ".00");
                                                }
                                                $("input").change( displayVals );
                                                displayVals();
                                            </script>
                                        @endforeach
                                    @else
                                        <tr class="cart_item">
                                            <td><span style="font-size: 18px;color: red;">Please add product to cart</span></td>
                                        </tr>
                                    @endif
                                    @if(Session::get('cart'))
                                        @if(Session::get('coupon'))
                                            <tr>
                                                <td>
                                                    Code Coupon:
                                                    @foreach(Session::get('coupon') as $key => $cou)
                                                        {{ $cou['coupon_code'] }}
                                                    @endforeach
                                                    <a href="{{ url('/delete_coupon') }}" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @else
                                        @php
                                            Session::forget('coupon');
                                        @endphp
                                    @endif
                                    <tr class="cart_item wrap-buttons">

                                        <td class="wrap-btn-control" colspan="4">
                                            <a class="btn back-to-shop">Back to Shop</a>
                                            <button name="update_qty" class="btn btn-update" type="submit">Update</button>
                                            <a href=" {{ url('/del-all-product') }}" class="btn btn-clear" type="reset">Delete all</a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </form>


                        </div>

                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            @if(Session::has('success_coupon'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{ Session::get('success_coupon') }}!</strong>
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{ Session::get('error') }}!</strong>
                                </div>
                            @endif
                            <div class="shpcart-subtotal-block">
                                <div class="subtotal-line">
                                    <form action="{{ url('/check_coupon') }}" method="post" class="form-group">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input width="50px" type="text" class="form-control" name="coupon" placeholder="Enter a coupon">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="submit"  class="btn btn-default" value="Submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                                <div class="subtotal-line">
                                    <b class="stt-name">Subtotal <span class="sub">({{ $count }}&nbsp;items)</span></b>
                                    <span id="total" class="stt-price">£ {{ $total_sale }}.00</span>
                                </div>

                                <div class="subtotal-line">
                                    <b class="stt-name">Tax</b>
                                    <span class="stt-price">
                                        @php
                                            $tax = $total_sale*0.1;
                                        @endphp
                                        £{{ $tax }}.00
                                    </span>
                                </div>

                                <div class="subtotal-line">
                                    <b class="stt-name">Coupon</b>
                                    <span class="stt-price">
                                        @if(Session::get('coupon') && Session::get('cart'))
                                            @foreach(Session::get('coupon') as $key => $cou)
                                                @if($cou['coupon_features'] == "percent")
                                                    @php
                                                        $total_coupon = ($total_sale*$cou['coupon_price'])/100;
                                                        echo '£'.$total_coupon.'.00';
                                                    @endphp
                                                @else
                                                    @php
                                                        $total_coupon = $cou['coupon_price'];
                                                        echo '£'.$total_coupon;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @else
                                            £{{ $total_coupon = 0 }}.00
                                        @endif
                                    </span>
                                </div>

                                <div class="subtotal-line">
                                    <b class="stt-name">Shipping</b>
                                    <span class="stt-price">£0.00</span>
                                </div>
                                <hr>
                                <div class="subtotal-line">
                                    <b class="stt-name">Total</b>
                                    @php
                                        $sum = $total_sale - $total_coupon + $tax;
                                    @endphp
                                    <span class="stt-price">£ {{ $sum }}.00</span>
                                </div>
                                <div class="tax-fee">
                                    <p class="title">Est. Taxes & Fees</p>
                                    <p class="desc">Based on 56789</p>
                                </div>
                                <div class="btn-checkout">
                                    <?php
                                    $shipping_id = Session::get('shipping_id');
                                    if ($shipping_id != null){
                                    ?>
                                    <a href="{{ route('pages.payment') }}" class="btn checkout">Payment</a>
                                    <?php
                                    }else{
                                    ?>
                                    <a href="{{ route('checkout.index') }}" class="btn checkout">Payment</a>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="biolife-progress-bar">
                                    <table>
                                        <tr>
                                            <td class="first-position">
                                                <span class="index">$0</span>
                                            </td>
                                            <td class="mid-position">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{$sum}}%" aria-valuenow="{{ $sum }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="last-position">
                                                <span class="index">$99</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and pickup</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Related Product-->
                @include('pages.shopping-cart.related-product')

            </div>
        </div>
    </div>
@endsection




