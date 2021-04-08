<div class="product-related-box single-layout">
    <div class="biolife-title-box lg-margin-bottom-26px-im">
        <span class="biolife-icon icon-organic"></span>
        <span class="subtitle">All the best item for You</span>
        <h3 class="main-title">Related Products</h3>
    </div>
    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
        @foreach($product_related as $related)
        <li class="product-item">
            <div class="contain-product layout-default">
                <div class="product-thumb">
                    <a href="#" class="link-to-product">
                        <img src="{{ asset('assets/uploads/products/') }}/{{ $related->image }}" alt="dd" width="270" height="270" class="product-thumnail">
                    </a>
                </div>
                <div class="info">
                    <b class="categories">Fresh Fruit</b>
                    <h4 class="product-title"><a href="#" class="pr-name">{{ $related->name}}</a></h4>
                    <div class="price">
                        <ins><span class="price-amount"><span class="currencySymbol">£</span>{{ $related->sale_price }}</span></ins>
                        <del><span class="price-amount"><span class="currencySymbol">£</span>{{ $related->regular_price }}</span></del>
                    </div>
                    <div class="slide-down-box">
                        <p class="message">All products are carefully selected to ensure food safety.</p>
                        <div class="buttons">
                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                            <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
