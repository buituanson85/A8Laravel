<div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
    <div class="container">
        <div class="biolife-title-box">
            <span class="subtitle">All the best item for You</span>
            <h3 class="main-title">Related Products</h3>
        </div>
        <div class="biolife-tab biolife-tab-contain sm-margin-top-34px">
            <div class="tab-head tab-head__icon-top-layout icon-top-layout">
                <ul class="tabs md-margin-bottom-35-im xs-margin-bottom-40-im">
                    @foreach($categories_table as $category_tab)
                    <li class="tab-element
                        @if($category_tab->slug == "fresh-fruit")
                            active
                        @endif
                    " id="tab-element">
                        <a href="{{ $category_tab->slug }}" class="tab-link"><span>{!! $category_tab->icon !!}</span>{{ $category_tab->name }}</a>
                    </li>
                    @endforeach

                </ul>
            </div>

            <div class="tab-content">
                @foreach($categories_table as $category_table)
                <div id="{{ $category_table->slug }}" class="tab-contain
                                    @if($category_table->slug == "fresh-fruit")
                                        active
                                    @endif
                                ">
                    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>
                        @foreach($products_table as $product_table)
                        @if($product_table->category_id == $category_table->id || $product_table->category->parent == $category_table->id )
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="{{ route('single-products.show', $product_table->id) }}" class="link-to-product">
                                        <img src="{{ asset('assets/uploads/products') }}/{{ $product_table->image }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                    </a>
                                    <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                </div>
                                <div class="info">
                                    <b class="categories">{{ $product_table->category->name }}</b>
                                    <h4 class="product-title"><a href="{{ route('single-products.show', $product_table->id) }}" class="pr-name">{{ $product_table->name }}</a></h4>
                                    <div class="price ">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>{{ $product_table->sale_price }}.00</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>{{ $product_table->regular_price }}.00</span></del>
                                    </div>
                                    <div class="slide-down-box">
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{ $product_table->id }}" class="cart_product_id_{{ $product_table->id }}">
                                            <input type="hidden" value="{{ $product_table->name }}" class="cart_product_name_{{ $product_table->id }}">
                                            <input type="hidden" value="{{ $product_table->image }}" class="cart_product_image_{{ $product_table->id }}">
                                            <input type="hidden" value="{{ $product_table->sale_price }}" class="cart_product_sale_price_{{ $product_table->id }}">
                                            <input type="hidden" value="{{ $product_table->regular_price }}" class="cart_product_regular_price_{{ $product_table->id }}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{ $product_table->id }}">
                                        <p class="message">All products are carefully selected to ensure food safety.</p>
                                        <div class="buttons">
                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
{{--                                            <button type="button" class="btn btn-default add-to-cart" name="add-to-cart">Add To Cart</button>--}}
                                            <input type="button" data-id_product="{{ $product_table->id }}" style="width: 100%;" class="btn add-to-cart-btn" name="add-to-cart-btn" value="Add To Cart" >
                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


