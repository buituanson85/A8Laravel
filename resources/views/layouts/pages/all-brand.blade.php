<div class="mega-content">
    @foreach($bras as $bra)
        <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
            <div class="wrap-custom-menu vertical-menu">
                <h4 class="menu-title">{{ $bra->name }}</h4>
                <ul class="menu">
                    @foreach($brands as $brand)
                        @if($bra->id == $brand->parent)
                            <li><a href="{{ route('pages-brands.show', $brand->id) }}">{{ $brand->name }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>



