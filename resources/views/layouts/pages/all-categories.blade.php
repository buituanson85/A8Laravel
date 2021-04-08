<ul class="menu clone-main-menu">

    @foreach($cates as $cate)
        <li class="menu-item menu-item-has-children has-child {{ $cate->slug }}">
            <a href="{{ route('pages-categories.show', $cate->id) }}" class="menu-name" data-title="Butter & Eggs">{!!  $cate->icon !!}<span>{{ $cate->name }}</span></a>

            <ul class="sub-menu">
                <div class="wrap-custom-menu vertical-menu">
                    <h4 class="menu-title {{ $cate->slug }}" style="display: none;margin-left: 20px; font-size: 14px; padding-top: 20px;">{{ $cate->name }}</h4>
                    @foreach($categories as $category)
                        @if( $cate->id == $category->parent )
                            <li class="menu-item"><a href="{{ route('pages-categories.show', $cate->id) }}">{{ $category->name }}</a></li>
                            <style>
                                .vertical-category-block .wrap-menu .menu li.{{ $cate->slug }}>a:after{
                                    font-family: 'FontAwesome', sans-serif;
                                    text-rendering: auto;
                                    -webkit-font-smoothing: antialiased;
                                    content: '\f105';
                                    display: inline-block;
                                    font-size: 14px;
                                    line-height: 45px;
                                    position: absolute;
                                    top: 0;
                                    right: 0;
                                    color: #333333;
                                }
                                .vertical-category-block .wrap-menu .menu li.{{ $cate->slug }} > ul > .vertical-menu > h4.menu-title{
                                    display: block!important;
                                }
                            </style>
                        @endif
                    @endforeach
                </div>
            </ul>

        </li>
    @endforeach

</ul>
