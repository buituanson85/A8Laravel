<div class="special-slide">
    <div class="container">
        <ul class="biolife-carousel dots_ring_style" data-slick='{"arrows": false, "dots": true, "slidesMargin": 30, "slidesToShow": 1, "infinite": true, "speed": 800, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 1}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":20, "dots": false}},{"breakpoint":480, "settings":{ "slidesToShow": 1}}]}' >
        @foreach($sliderBanner as $slider)
            <li>
                <div class="slide-contain biolife-banner__special">
                    <div class="banner-contain">
                        <div class="media">
                            <a href="#" class="bn-link">
                                <figure><img src="{{ $slider->image }}" width="616" height="483" alt=""></figure>
                            </a>
                        </div>
                        <div class="text-content">
                            <b class="first-line">{{ $slider->name }}</b>
                            <span class="second-line">{{ $slider->title_one }}</span>
                            <span class="third-line">Easy <i>{{ $slider->title_two }}</i></span>
                            <div class="product-detail">
                                <h4 class="product-name">{{ $slider->three }}</h4>
                                <div class="price price-contain">
                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>{{ $slider->sale_price }}</span></ins>
                                    <del><span class="price-amount"><span class="currencySymbol">£</span>{{ $slider->regular_price }}</span></del>
                                </div>
                                <div class="buttons">
                                    <a href="#" class="btn add-to-cart-btn">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
        <div class="biolife-service type01 biolife-service__type01 sm-margin-top-0 xs-margin-top-45px">
            <b class="txt-show-01">100%Nature</b>
            <i class="txt-show-02">Fresh Fruits</i>
            <ul class="services-list">
                <li>
                    <div class="service-inner">
                        <span class="number">1</span>
                        <span class="biolife-icon icon-beer"></span>
                        <a class="srv-name" href="#">full stamped product</a>
                    </div>
                </li>
                <li>
                    <div class="service-inner">
                        <span class="number">2</span>
                        <span class="biolife-icon icon-schedule"></span>
                        <a class="srv-name" href="#">place and delivery on time</a>
                    </div>
                </li>
                <li>
                    <div class="service-inner">
                        <span class="number">3</span>
                        <span class="biolife-icon icon-car"></span>
                        <a class="srv-name" href="#">Free shipping in the city</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
