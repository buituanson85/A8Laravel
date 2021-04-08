@if(Route::has('login'))
    @auth()
        @if(Auth::user()->utype === 'ADM')
            <li class="horz-menu-item">
                <div class="vertical-menu vertical-category-block">
                    <div class="block-title">
                        <span class="menu-title" style="margin-right: 10px">{{ Auth::user()->name }}</span>
                        <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                    </div>
                    <div class="wrap-menu">
                        <ul class="menu clone-main-menu">
                            <li class="menu-item menu-item-has-children has-child"><a href="{{ route('dashboard.index') }}" style="color: #090808 !important;">Dashboash</a></li>
                            <li class="menu-item menu-item-has-children has-child"><a style="color: #090808 !important;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="post">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </li>
        @else
            <li class="horz-menu-item">
                <div class="vertical-menu vertical-category-block">
                    <div class="block-title">
                        <span class="menu-title" style="margin-right: 5px;">{{ Auth::user()->name }}</span>
                        <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                    </div>
                    <div class="wrap-menu">
                        <ul class="menu clone-main-menu">
                            <li class="menu-item menu-item-has-children has-child"><a href="#" style="color: #090808 !important;">Profile</a></li>
                            <li class="menu-item menu-item-has-children has-child"><a style="color: #090808 !important;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="post">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </li>
        @endif

    @else
        <ul class="social-list">
            <li class="horz-menu-item lore" ><a href="{{route('login')}}">Login</a></li>
            <li class="horz-menu-item lore" ><a href="{{route('register')}}">Register</a></li>
        </ul>
    @endif
@endif
