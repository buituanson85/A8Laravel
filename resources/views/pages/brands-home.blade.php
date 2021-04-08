<div class="brand-slide sm-margin-top-100px background-fafafa xs-margin-top-80px xs-margin-bottom-80px">
    <div class="container">
        <ul class="biolife-carousel nav-center-bold nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}},{"breakpoint":450, "settings":{ "slidesToShow": 1, "slidesMargin":10}}]}'>
            @foreach($brands as $brand)
            @if($brand->parent != 0)
            <li>
                <div class="biolife-brd-container">
                    <a href="#" class="link">
                        <figure><img src="{{ $brand->image }}" width="150" height="100" alt=""></figure>
                    </a>
                </div>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
</div>

