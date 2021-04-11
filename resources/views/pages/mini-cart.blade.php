<div class="minicart-block">
    <div class="minicart-contain">
        @if(Session::get('cart'))
            @php
                $count = 0;
                $total_mini = 0;
            @endphp
            @foreach(Session::get('cart') as $minicart)
                @php
                    $subtotal_mini = $minicart['product_sale_price']*$minicart['product_qty'];
                    $total_mini += $subtotal_mini;
                    $count++;
                @endphp
            @endforeach
        @else
            @php
                $count = '';
            @endphp
        @endif
        <a href="javascript:void(0)" class="link-to">
            <span class="icon-qty-combine">
                <i class="icon-cart-mini biolife-icon"></i>
                <span class="qty">{{ $count }}</span>
            </span>
            <span class="title">My Cart -</span>
            <span class="sub-total">
                @if(Session::get('cart'))
                    ${{ $total_mini }}.00
                @else
                    Not Empty
                @endif
            </span>
        </a>
        @if(Session::get('cart') == true)
        <div class="cart-content">
            <div class="cart-inner">
                <ul class="products">
                    @foreach(Session::get('cart') as $minicart)
                        {{ $count++ }}
                    <li>
                        <div class="minicart-item">
                            <div class="thumb">
                                <a href="#"><img src="{{ asset('assets/uploads/products') }}/{{ $minicart['product_image'] }}" width="90" height="90" alt="National Fresh"></a>
                            </div>
                            <div class="left-info">
                                <div class="product-title"><a href="#" class="product-name">{{ $minicart['product_name'] }}</a></div>
                                <div class="price">
                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>{{ $minicart['product_sale_price'] }}</span></ins>
                                    <del><span class="price-amount"><span class="currencySymbol">£</span>{{ $minicart['product_regular_price'] }}</span></del>
                                </div>
                                <div class="qty">
                                    <label for="cart[id123][qty]">Qty:</label>
                                    <input type="number" class="input-qty" name="cart[id123][qty]" id="cart[id123][qty]" value="{{ $minicart['product_qty'] }}" disabled>
                                </div>
                            </div>
                            <div class="action">
                                <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="{{ url('/delete_cart_ajax/'.$minicart['session_id']) }}" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <p class="btn-control">
                    <a href="#" class="btn view-cart">view cart</a>
                    <a href="#" class="btn">checkout</a>
                </p>
                @endif
            </div>
        </div>
    </div>
</div>
