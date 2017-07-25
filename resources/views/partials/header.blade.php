<header>
    <div id="header" class="container">
        <div id="logo" style="height: 50px; line-height: 50px; font-size: 2em; font-weight: 600;">
            <a href="{{ url('/') }}">
                DevOps Club
            </a>
        </div>

        <div id="user-panel-wrapper">
            @if(\Auth::check())
                <div class="pure-menu pure-menu-horizontal">
                    <ul class="pure-menu-list">
                        <li class="pure-menu-item pure-menu-selected">
                            <a href="{{ url('article/create') }}">
                                新文章
                            </a>
                        </li>
                        <li id="user-panel-profile" class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                            <a class="pure-menu-link">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="pure-menu-children">
                                <li class="pure-menu-item">
                                    <a href="{{ url('article/draft/user/'.Auth::id()) }}" class="pure-menu-link">草稿箱</a>
                                </li>
                                <li class="pure-menu-item">
                                    <a href="{{ url('user/'.Auth::id().'/profile') }}" class="pure-menu-link">用户管理</a>
                                </li>
                                <li class="pure-menu-item">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="pure-menu-link">
                                        登出
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ url('login') }}" class="button">
                    登录
                </a>
            @endif
        </div>
    </div>
</header>