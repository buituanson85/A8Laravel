@extends('layouts.pages.base')
@section('title', 'Categories Home')
@section('content')
    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Organic Fruits</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="/" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="#" class="permal-link">Natural Organic</a></li>
                <li class="nav-item"><span class="current-page">Fresh Fruit</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain single-product">
        <div class="container">

            <!-- Main content -->
            <div id="main-content" class="main-content">

                <!-- summary info -->
                <div class="sumary-product single-layout">
                    <div class="media">
                        <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                            @foreach($images_galaxy as $galaxy)
                            <li><img src="{{ asset('assets/uploads/galaxy') }}/{{ $galaxy->image }}" alt="" width="500" height="500"></li>
                            @endforeach
                        </ul>
                        <ul class="biolife-carousel slider-nav" data-slick='{"arrows":false,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":4,"slidesToScroll":1,"asNavFor":".slider-for"}'>
                            @foreach($images_galaxy as $galaxy)
                            <li><img src="{{ asset('assets/uploads/galaxy') }}/{{ $galaxy->image }}" alt="" width="88" height="88"></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="product-attribute">
                        <h3 class="title">{{ $product_show->name }}</h3>
                        <div class="rating">
                            <p class="star-rating"><span class="width-80percent"></span></p>
                            <span class="review-count">(04 Reviews)</span>
                            <span class="qa-text">Q&A</span>
                            <b class="category">By: {{ $product_show->category->name }}</b>
                        </div>
                        <span class="sku">Sku: {{ $product_show->SKU }}</span>
                        <p class="excerpt">{!! $product_show->short_description !!}</p>
                        <div class="price">
                            <ins><span class="price-amount"><span class="currencySymbol">£</span>{{ $product_show->sale_price }}</span></ins>
                            <del><span class="price-amount"><span class="currencySymbol">£</span>{{ $product_show->regular_price }}</span></del>
                        </div>
                        <div class="product-atts">
                            <div class="atts-item">
                                <span class="title">Color:</span>
                                <ul class="color-list">
                                    <li class="color-item"><a href="#" class="c-link"><span class="symbol img-color"></span>Multi</a></li>
                                    <li class="color-item"><a href="#" class="c-link"><span class="symbol hex-code color-01"></span>Red</a></li>
                                    <li class="color-item"><a href="#" class="c-link"><span class="symbol hex-code color-02"></span>Orrange</a></li>
                                    <li class="color-item"><a href="#" class="c-link"><span class="symbol hex-code color-03"></span>Other</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="shipping-info">
                            <p class="shipping-day">3-Day Shipping</p>
                            <p class="for-today">Pree Pickup Today</p>
                        </div>
                    </div>
                    <div class="action-form">
                        <div class="quantity-box">
                            <span class="title">Quantity:</span>
                            <div class="qty-input">
                                <input type="number" min="1" id="qty" name="qty" value="1">
                            </div>
                        </div>
                        <div class="total-price-contain">
                            <span class="title">Total Price:</span>
                            <p id="price" class="price"></p>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
                        <script type="text/javascript">
                            function displayVals() {
                                var singleValues = $( "#qty" ).val();
                                var total = singleValues*{{ $product_show->sale_price }};
                                $("#price").html("£" + total + ".00");
                            }
                            $("input").change( displayVals );
                            displayVals();
                        </script>
                        <div class="buttons">
                            <form>
                            @csrf
                            <input type="hidden" value="{{ $product_show->id }}" class="cart_product_id_{{ $product_show->id }}">
                            <input type="hidden" value="{{ $product_show->name }}" class="cart_product_name_{{ $product_show->id }}">
                            <input type="hidden" value="{{ $product_show->image }}" class="cart_product_image_{{ $product_show->id }}">
                            <input type="hidden" value="{{ $product_show->sale_price }}" class="cart_product_sale_price_{{ $product_show->id }}">
                            <input type="hidden" value="{{ $product_show->regular_price }}" class="cart_product_regular_price_{{ $product_show->id }}">
{{--                            <input type="hidden" value="1" class="cart_product_qty_{{ $product_show->id }}">--}}
                            <input type="button" data-id_product="{{ $product_show->id }}" style="width: 100%;" class="btn add-to-cart-btn add-to-cart-btn-two" name="add-to-cart-btn-two" value="Add To Cart" >
                            <p class="pull-row">
                                <a href="#" class="btn wishlist-btn">wishlist</a>
                                <a href="#" class="btn compare-btn">compare</a>
                            </p>
                            </form>
                        </div>
                        <div class="location-shipping-to">
                            <span class="title">Ship to:</span>
                            <select name="shipping_to" class="country">
                                <option value="-1">Select Country</option>
                                <option value="america">America</option>
                                <option value="france">France</option>
                                <option value="germany">Germany</option>
                                <option value="japan">Japan</option>
                            </select>
                        </div>
                        <div class="social-media">
                            <ul class="social-list">
                                <li><a href="#" class="social-link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="social-link"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="social-link"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="social-link"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="social-link"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="acepted-payment-methods">
                            <ul class="payment-methods">
                                <li><img src="{{ asset('pages/assets/images/card1.jpg') }}" alt="" width="51" height="36"></li>
                                <li><img src="{{ asset('pages/assets/images/card2.jpg') }}" alt="" width="51" height="36"></li>
                                <li><img src="{{ asset('pages/assets/images/card3.jpg') }}" alt="" width="51" height="36"></li>
                                <li><img src="{{ asset('pages/assets/images/card4.jpg') }}" alt="" width="51" height="36"></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Tab info -->
                @include('pages.single-product.product-tab-info')

                <!-- related products -->
                @include('pages.single-product.related-products')

            </div>
        </div>
    </div>
@endsection
