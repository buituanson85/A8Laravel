
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biolife - Organic Food</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('pages/assets/images/favicon.png') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/assets/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/assets/css/nice-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/assets/css/slick.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('pages/assets/css/main-color.css') }}">
    <link type="text/css" href="{{asset('css/sweetalert.css')}}" rel="stylesheet">
{{--    <link type="text/css" href="{{asset('assets/css/all.min.css')}}" rel="stylesheet">--}}

    {{--    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">--}}
    <style>
        .custom-margin {
            margin-top: 8vh;
        }
        .longin-a {
            list-style: none;
            text-decoration: none;
            color: black;
        }
        .longin-a:hover{
            list-style: none;
            text-decoration: none;
            color: #CCCCCC;
        }
    </style>
</head>
<body class="biolife-body">

<!-- Preloader -->
{{--<div id="biof-loading">--}}
{{--    <div class="biof-loading-center">--}}
{{--        <div class="biof-loading-center-absolute">--}}
{{--            <div class="dot dot-one"></div>--}}
{{--            <div class="dot dot-two"></div>--}}
{{--            <div class="dot dot-three"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- HEADER -->
<header id="header" class="header-area style-01 layout-03">
    <div class="header-top bg-main hidden-xs">
        <div class="container">
            <div class="top-bar left">
                <ul class="horizontal-menu">
                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>Organic@company.com</a></li>
                    <li><a href="#">Free Shipping for all Order of $99</a></li>
                </ul>
            </div>
            <div class="top-bar right">
                <ul class="social-list">
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                </ul>
                <ul class="horizontal-menu" style="margin: 0;padding: 0;">
                    <li class="horz-menu-item currency">
                        <select name="currency">
                            <option value="eur">€ EUR (Euro)</option>
                            <option value="usd" selected>$ USD (Dollar)</option>
                            <option value="usd">£ GBP (Pound)</option>
                            <option value="usd">¥ JPY (Yen)</option>
                        </select>
                    </li>
                    <li class="horz-menu-item lang">
                        <select name="language">
                            <option value="fr">French (EUR)</option>
                            <option value="en" selected>English (USD)</option>
                            <option value="ger">Germany (GBP)</option>
                            <option value="jp">Japan (JPY)</option>
                        </select>
                    </li>
{{--                    Login - register --}}
                    @include('layouts.pages.login-register')
{{--                    end login - register --}}
                </ul>
            </div>
        </div>
    </div>

    <div class="header-middle biolife-sticky-object ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                    <a href="/" class="biolife-logo"><img src="{{ asset('pages/assets/images/organic-3.png') }}" alt="biolife logo" width="135" height="34"></a>
                </div>
                <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                    <div class="primary-menu">
                        <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                            <li class="menu-item"><a href="/">Home</a></li>
                            <li class="menu-item menu-item-has-children has-megamenu">
                                <a href="#" class="menu-name" data-title="Shop" >Brands</a>
                                <div class="wrap-megamenu lg-width-900 md-width-750">
                                    {{--   Brand --}}
                                    @include('layouts.pages.all-brand')
                                    {{--                                        end brand--}}
                                </div>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="{{ route('single-products.index') }}" class="menu-name">Shop</a>
                            </li>
{{--        Blog--}}
                            @include('layouts.pages.blog')
                            <li class="menu-item"><a href="#">Contact</a></li>
                            @if(Route::has('login'))
                            @auth
                            <li class="menu-item"><a href="{{ route('pages.showcartajax') }}">My Cart</a></li>
                            <li class="menu-item"><a href="{{ route('orderDetails.index') }}">History Order</a></li>
                            @else
                            @endauth
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                    <div class="biolife-cart-info">
                        <div class="mobile-search">
                            <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                            <div class="mobile-search-content">
                                <form action="#" class="form-search" name="mobile-seacrh" method="get">
                                    <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                    <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                                    <select name="category">
                                        <option value="-1" selected>All Categories</option>
                                        <option value="vegetables">Vegetables</option>
                                        <option value="fresh_berries">Fresh Berries</option>
                                        <option value="ocean_foods">Ocean Foods</option>
                                        <option value="butter_eggs">Butter & Eggs</option>
                                        <option value="fastfood">Fastfood</option>
                                        <option value="fresh_meat">Fresh Meat</option>
                                        <option value="fresh_onion">Fresh Onion</option>
                                        <option value="papaya_crisps">Papaya & Crisps</option>
                                        <option value="oatmeal">Oatmeal</option>
                                    </select>
                                    <button type="submit" class="btn-submit">go</button>
                                </form>
                            </div>
                        </div>
                        <div class="wishlist-block hidden-sm hidden-xs">
                            <a href="#" class="link-to">
                                    <span class="icon-qty-combine">
                                        <i class="icon-heart-bold biolife-icon"></i>
                                        <span class="qty">4</span>
                                    </span>
                            </a>
                        </div>
                        {{--                        mini cart--}}
                        @include('layouts.pages.mini-cart')
{{--                        End mini cart--}}

                        <div class="mobile-menu-toggle">
                            <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="vertical-menu vertical-category-block">
                        <div class="block-title">
                                <span class="menu-icon">
                                    <span class="line-1"></span>
                                    <span class="line-2"></span>
                                    <span class="line-3"></span>
                                </span>
                            <span class="menu-title">All departments</span>
                            <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                        </div>
                        <div class="wrap-menu">
{{--                            All - Categories   --}}
                            @include('layouts.pages.all-categories')
{{--                            end  all - categories  --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 padding-top-2px">
{{--                    Search By name end Categories   --}}
                    @include('layouts.pages.search-name-category')
{{--                    End Search--}}
                    <div class="live-info">
                        <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">(+900) 123 456 7891</b></p>
                        <p class="working-time">Mon-Fri: 8:30am-7:30pm; Sat-Sun: 9:30am-4:30pm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<!-- FOOTER -->
<footer id="footer" class="footer layout-03">
    <div class="footer-content background-footer-03">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-9">
                    <section class="footer-item">
                        <a href="/" class="logo footer-logo"><img src="{{ asset('pages/assets/images/organic-3.png') }}" alt="biolife logo" width="135" height="34"></a>
                        <div class="footer-phone-info">
                            <i class="biolife-icon icon-head-phone"></i>
                            <p class="r-info">
                                <span>Got Questions ?</span>
                                <span>(700)  9001-1909  (900) 689 -66</span>
                            </p>
                        </div>
                        <div class="newsletter-block layout-01">
                            <h4 class="title">Newsletter Signup</h4>
                            <div class="form-content">
                                <form action="#" name="new-letter-foter">
                                    <input type="email" class="input-text email" value="" placeholder="Your email here...">
                                    <button type="submit" class="bnt-submit" name="ok">Sign up</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 md-margin-top-5px sm-margin-top-50px xs-margin-top-40px">
                    <section class="footer-item">
                        <h3 class="section-title">Useful Links</h3>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <div class="wrap-custom-menu vertical-menu-2">
                                    <ul class="menu">
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">About Our Shop</a></li>
                                        <li><a href="#">Secure Shopping</a></li>
                                        <li><a href="#">Delivery infomation</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Our Sitemap</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <div class="wrap-custom-menu vertical-menu-2">
                                    <ul class="menu">
                                        <li><a href="#">Who We Are</a></li>
                                        <li><a href="#">Our Services</a></li>
                                        <li><a href="#">Projects</a></li>
                                        <li><a href="#">Contacts Us</a></li>
                                        <li><a href="#">Innovation</a></li>
                                        <li><a href="#">Testimonials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 md-margin-top-5px sm-margin-top-50px xs-margin-top-40px">
                    <section class="footer-item">
                        <h3 class="section-title">Transport Offices</h3>
                        <div class="contact-info-block footer-layout xs-padding-top-10px">
                            <ul class="contact-lines">
                                <li>
                                    <p class="info-item">
                                        <i class="biolife-icon icon-location"></i>
                                        <b class="desc">7563 St. Vicent Place, Glasgow, Greater Newyork NH7689, UK </b>
                                    </p>
                                </li>
                                <li>
                                    <p class="info-item">
                                        <i class="biolife-icon icon-phone"></i>
                                        <b class="desc">Phone: (+067) 234 789  (+068) 222 888</b>
                                    </p>
                                </li>
                                <li>
                                    <p class="info-item">
                                        <i class="biolife-icon icon-letter"></i>
                                        <b class="desc">Email:  contact@company.com</b>
                                    </p>
                                </li>
                                <li>
                                    <p class="info-item">
                                        <i class="biolife-icon icon-clock"></i>
                                        <b class="desc">Hours: 7 Days a week from 10:00 am</b>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="biolife-social inline">
                            <ul class="socials">
                                <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="separator sm-margin-top-70px xs-margin-top-40px"></div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="copy-right-text"><p><a href="templateshub.net">Templates Hub</a></p></div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="payment-methods">
                        <ul>
                            <li><a href="#" class="payment-link"><img src="{{ asset('pages/assets/images/card1.jpg') }}" width="51" height="36" alt=""></a></li>
                            <li><a href="#" class="payment-link"><img src="{{ asset('pages/assets/images/card2.jpg') }}" width="51" height="36" alt=""></a></li>
                            <li><a href="#" class="payment-link"><img src="{{ asset('pages/assets/images/card3.jpg') }}" width="51" height="36" alt=""></a></li>
                            <li><a href="#" class="payment-link"><img src="{{ asset('pages/assets/images/card4.jpg') }}" width="51" height="36" alt=""></a></li>
                            <li><a href="#" class="payment-link"><img src="{{ asset('pages/assets/images/card5.jpg') }}" width="51" height="36" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--Footer For Mobile-->
<div class="mobile-footer">
    <div class="mobile-footer-inner">
        <div class="mobile-block block-menu-main">
            <a class="menu-bar menu-toggle btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                <span class="fa fa-bars"></span>
                <span class="text">Menu</span>
            </a>
        </div>
        <div class="mobile-block block-sidebar">
            <a class="menu-bar filter-toggle btn-toggle" data-object="open-mobile-filter" href="javascript:void(0)">
                <i class="fa fa-sliders" aria-hidden="true"></i>
                <span class="text">Sidebar</span>
            </a>
        </div>
        <div class="mobile-block block-minicart">
            <a class="link-to-cart" href="#">
                <span class="fa fa-shopping-bag" aria-hidden="true"></span>
                <span class="text">Cart</span>
            </a>
        </div>
        <div class="mobile-block block-global">
            <a class="menu-bar myaccount-toggle btn-toggle" data-object="global-panel-opened" href="javascript:void(0)">
                <span class="fa fa-globe"></span>
                <span class="text">Global</span>
            </a>
        </div>
    </div>
</div>

<!--Mobile Global Menu-->
<div class="mobile-block-global">
    <div class="biolife-mobile-panels">
        <span class="biolife-current-panel-title">Global</span>
        <a class="biolife-close-btn" data-object="global-panel-opened" href="#">&times;</a>
    </div>
    <div class="block-global-contain">
        <div class="glb-item my-account">
            <b class="title">My Account</b>
            <ul class="list">
                <li class="list-item"><a href="#">Login/register</a></li>
                <li class="list-item"><a href="#">Wishlist <span class="index">(8)</span></a></li>
                <li class="list-item"><a href="#">Checkout</a></li>
            </ul>
        </div>
        <div class="glb-item currency">
            <b class="title">Currency</b>
            <ul class="list">
                <li class="list-item"><a href="#">€ EUR (Euro)</a></li>
                <li class="list-item"><a href="#">$ USD (Dollar)</a></li>
                <li class="list-item"><a href="#">£ GBP (Pound)</a></li>
                <li class="list-item"><a href="#">¥ JPY (Yen)</a></li>
            </ul>
        </div>
        <div class="glb-item languages">
            <b class="title">Language</b>
            <ul class="list inline">
                <li class="list-item"><a href="#"><img src="{{ asset('pages/assets/images/languages/us.jpg') }}" alt="flag" width="24" height="18"></a></li>
                <li class="list-item"><a href="#"><img src="{{ asset('pages/assets/images/languages/fr.jpg') }}" alt="flag" width="24" height="18"></a></li>
                <li class="list-item"><a href="#"><img src="{{ asset('pages/assets/images/languages/ger.jpg') }}" alt="flag" width="24" height="18"></a></li>
                <li class="list-item"><a href="#"><img src="{{ asset('pages/assets/images/languages/jap.jpg') }}" alt="flag" width="24" height="18"></a></li>
            </ul>
        </div>
    </div>
</div>

<!--Quickview Popup-->
<div id="biolife-quickview-block" class="biolife-quickview-block">
    <div class="quickview-container">
        <a href="#" class="btn-close-quickview" data-object="open-quickview-block"><span class="biolife-icon icon-close-menu"></span></a>
        <div class="biolife-quickview-inner">
            <div class="media">
                <ul class="biolife-carousel quickview-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".quickview-nav"}'>
                    <li><img src="{{ asset('pages/assets/images/details-product/detail_01.jpg') }}" alt="" width="500" height="500"></li>
                    <li><img src="{{ asset('pages/assets/images/details-product/detail_02.jpg') }}" alt="" width="500" height="500"></li>
                    <li><img src="{{ asset('pages/assets/images/details-product/detail_03.jpg') }}" alt="" width="500" height="500"></li>
                    <li><img src="{{ asset('pages/assets/images/details-product/detail_04.jpg') }}" alt="" width="500" height="500"></li>
                    <li><img src="{{ asset('pages/assets/images/details-product/detail_05.jpg') }}" alt="" width="500" height="500"></li>
                    <li><img src="{{ asset('pages/assets/images/details-product/detail_06.jpg') }}" alt="" width="500" height="500"></li>
                    <li><img src="{{ asset('pages/assets/images/details-product/detail_07.jpg') }}" alt="" width="500" height="500"></li>
                </ul>
                <ul class="biolife-carousel quickview-nav" data-slick='{"arrows":true,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":3,"slidesToScroll":1,"asNavFor":".quickview-for"}'>
                    <li><img src="{{ asset('pages/assets/images/details-product/thumb_01.jpg') }}" alt="" width="88" height="88"></li>
                    <li><img src="{{ asset('pages/assets/images/details-product/thumb_02.jpg') }}" alt="" width="88" height="88"></li>
                    <li><img src="{{ asset('pages/assets/images/details-product/thumb_03.jpg') }}" alt="" width="88" height="88"></li>
                    <li><img src="{{ asset('pages/assets/images/details-product/thumb_04.jpg') }}" alt="" width="88" height="88"></li>
                    <li><img src="{{ asset('pages/assets/images/details-product/thumb_05.jpg') }}" alt="" width="88" height="88"></li>
                    <li><img src="{{ asset('pages/assets/images/details-product/thumb_06.jpg') }}" alt="" width="88" height="88"></li>
                    <li><img src="{{ asset('pages/assets/images/details-product/thumb_07.jpg') }}" alt="" width="88" height="88"></li>
                </ul>
            </div>
            <div class="product-attribute">
                <h4 class="title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                <div class="rating">
                    <p class="star-rating"><span class="width-80percent"></span></p>
                </div>

                <div class="price price-contain">
                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                </div>
                <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel maximus lacus. Duis ut mauris eget justo dictum tempus sed vel tellus.</p>
                <div class="from-cart">
                    <div class="qty-input">
                        <input type="text" name="qty12554" value="1" data-max_value="20" data-min_value="1" data-step="1">
                        <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                        <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    </div>
                    <div class="buttons">
                        <a href="#" class="btn add-to-cart-btn btn-bold">add to cart</a>
                    </div>
                </div>

                <div class="product-meta">
                    <div class="product-atts">
                        <div class="product-atts-item">
                            <b class="meta-title">Categories:</b>
                            <ul class="meta-list">
                                <li><a href="#" class="meta-link">Milk & Cream</a></li>
                                <li><a href="#" class="meta-link">Fresh Meat</a></li>
                                <li><a href="#" class="meta-link">Fresh Fruit</a></li>
                            </ul>
                        </div>
                        <div class="product-atts-item">
                            <b class="meta-title">Tags:</b>
                            <ul class="meta-list">
                                <li><a href="#" class="meta-link">food theme</a></li>
                                <li><a href="#" class="meta-link">organic food</a></li>
                                <li><a href="#" class="meta-link">organic theme</a></li>
                            </ul>
                        </div>
                        <div class="product-atts-item">
                            <b class="meta-title">Brand:</b>
                            <ul class="meta-list">
                                <li><a href="#" class="meta-link">Fresh Fruit</a></li>
                            </ul>
                        </div>
                    </div>
                    <span class="sku">SKU: N/A</span>
                    <div class="biolife-social inline add-title">
                        <span class="fr-title">Share:</span>
                        <ul class="socials">
                            <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll Top Button -->
<a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset('pages/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('pages/assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('pages/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('pages/assets/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('pages/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('pages/assets/js/biolife.framework.js') }}"></script>
<script src="{{ asset('pages/assets/js/functions.js') }}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
{{--<script src="{{asset('assets/js/all.min.js')}}"></script>--}}

<script type="text/javascript">
    $(document).ready(function () {
        $('.add-to-cart-btn').click(function () {
            var id = $(this).data('id_product');

            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_sale_price = $('.cart_product_sale_price_' + id).val();
            var cart_product_regular_price = $('.cart_product_regular_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            // cart_product_qty = $( "#qty" ).val();
            var _token = $('input[name="_token"]').val();
            //alert(_token);

            $.ajax({
                url: '{{url('/add-cart-ajax')}}',
                method: 'POST',
                data:{
                    cart_product_id:cart_product_id,
                    cart_product_name:cart_product_name,
                    cart_product_image:cart_product_image,
                    cart_product_sale_price:cart_product_sale_price,
                    cart_product_regular_price:cart_product_regular_price,
                    cart_product_qty:cart_product_qty,
                    _token:_token,
                },
                success:function(data){
                    swal({
                            title: "Product added to cart",
                            text: "You can purchase or go to the cart to proceed with the payment",
                            showCancelButton: true,
                            cancelButtonText: "See more",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Go to cart",
                            closeOnConfirm: false
                        },
                        function() {
                            window.location.href = "{{url('/show-cart-ajax')}}";
                        });
                }
            })
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.add-to-cart-btn-two').click(function () {
            var id = $(this).data('id_product');

            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_sale_price = $('.cart_product_sale_price_' + id).val();
            var cart_product_regular_price = $('.cart_product_regular_price_' + id).val();
            cart_product_qty = $( "#qty" ).val();
            var _token = $('input[name="_token"]').val();
            //alert(_token);

            $.ajax({
                url: '{{url('/add-cart-ajax')}}',
                method: 'POST',
                data:{
                    cart_product_id:cart_product_id,
                    cart_product_name:cart_product_name,
                    cart_product_image:cart_product_image,
                    cart_product_sale_price:cart_product_sale_price,
                    cart_product_regular_price:cart_product_regular_price,
                    cart_product_qty:cart_product_qty,
                    _token:_token,
                },
                success:function(data){
                    swal({
                            title: "Product added to cart",
                            text: "You can purchase or go to the cart to proceed with the payment",
                            showCancelButton: true,
                            cancelButtonText: "See more",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Go to cart",
                            closeOnConfirm: false
                        },
                        function() {
                            window.location.href = "{{url('/show-cart-ajax')}}";
                        });
                }
            })
        });
    });

</script>
{{--<script src="{{ asset('assets/js/all.min.js') }}"></script>--}}
</body>

</html>
