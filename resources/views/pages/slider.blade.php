<!--Block 01: Main slide-->
<div class="main-slide block-slider">
    <ul class="biolife-carousel nav-none-on-mobile" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}' >
        @foreach($sliders as $slider)
        <li>
            <div class="slide-contain slider-opt03__layout01">
                <div class="media">
                    <div class="child-elememt">
                        <a href="#" class="link-to">
                            <img src="{{ $slider->image }}" width="604" height="500" alt="">
                        </a>
                    </div>
                </div>
                <div class="text-content">
                    <i class="first-line">{{ $slider->name }}</i>
                    <h3 class="second-line">{{ $slider->title }}</h3>
                    <p class="third-line">{{ $slider->short_description }}</p>
                    <p class="buttons">
                        <a href="#" class="btn btn-bold">Shop now</a>
                        <a href="#" class="btn btn-thin">View lookbook</a>
                    </p>
                </div>
            </div>
        </li>
        @endforeach

    </ul>
</div>
