<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-20px sm-margin-bottom-0 xs-margin-bottom-15px">
    <div class="order-summary sm-margin-bottom-80px">
        <div class="title-block">
            <h3 class="title">Order Summary</h3>
            <a href="#" class="link-forward">Edit cart</a>
        </div>
        <div class="cart-list-box short-type">
            @php
                $total_sale = 0;
                $total_regular = 0;
                $count = 0;
            @endphp
            @foreach(Session::get('cart') as $cart)
                @php
                $count++;
                @endphp
            @endforeach
            <span class="number">{{ $count }} items</span>
            <ul class="cart-list">

                @if(Session::get('cart') == true)

                    @foreach(Session::get('cart') as $cart)
                        @php
                            $subtotal_sale = $cart['product_sale_price']*$cart['product_qty'];
                            $subtotal_regular = $cart['product_regular_price']*$cart['product_qty'];
                            $total_sale += $subtotal_sale;
                            $total_regular += $subtotal_regular;
                            $count++;
                        @endphp
                <li class="cart-elem">
                    <div class="cart-item">
                        <div class="product-thumb">
                            <a class="prd-thumb" href="#">
                                <figure><img src="{{ asset('assets/uploads/products') }}/{{ $cart['product_image'] }}" width="113" height="113" alt="shop-cart" ></figure>
                            </a>
                        </div>
                        <div class="info">
                            <span class="txt-quantity">{{ $cart['product_qty'] }}X</span>
                            <a href="#" class="pr-name">{{ $cart['product_name'] }}</a>
                        </div>
                        <div class="price price-contain">
                            <ins><span class="price-amount"><span class="currencySymbol">£</span>{{ $cart['product_sale_price'] }}</span></ins>
                            <del><span class="price-amount"><span class="currencySymbol">£</span>{{ $cart['product_regular_price'] }}</span></del>
                        </div>
                    </div>
                </li>
                @endforeach
            @else
                <li class="cart-elem"><span style="font-size: 18px;color: red;">Please add product to cart</span></li>
            @endif
            </ul>
            <ul class="subtotal">
                <li>
                    <div class="subtotal-line">
                        <b class="stt-name">Subtotal</b>
                        <span class="stt-price">£{{ $total_sale }}.00</span>
                    </div>
                </li>
                <li>
                    <div class="subtotal-line">
                        <b class="stt-name">Tax</b>
                        <span class="stt-price">£{{ $total_sale*0.1 }}.00</span>
                    </div>
                </li>
                <li>
                    <div class="subtotal-line">
                        <b class="stt-name">Coupon</b>
                        <span class="stt-price">£00.00</span>
                    </div>
                </li>
                <li>
                    <div class="subtotal-line">
                        <b class="stt-name">Shipping</b>
                        <span class="stt-price">£00.00</span>
                    </div>
                </li>
                <li>
                    <div class="subtotal-line">
                        <a href="#" class="link-forward">Promo/Gift Certificate</a>
                    </div>
                </li>
                <li>
                    <div class="subtotal-line">
                        <b class="stt-name">total:</b>
                        <span class="stt-price">£{{ $total_sale + $total_sale*0.1 }}.00</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
