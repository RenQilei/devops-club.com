@extends("layouts.main")

@section("main-body")

    <div class="container">
        <div class="pure-g">
            {{-- 用户管理 左侧工具栏 --}}
            <div class="pure-u-1-5">
                <div id="profile-sidebar" class="pure-menu">
                    <ul class="pure-menu-list">
                        <li class="pure-menu-item">
                            <a href="{{ url('proifle') }}" class="pure-menu-link">
                                用户信息
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- 用户管理 右侧内容面板 --}}
            <div class="pure-u-4-5">
                <div id="profile-content">
                    <div class="pure-g">
                        <div class="pure-u-1-5">
                            电子邮箱
                        </div>
                        <div class="pure-u-1-5">
                            {{ Auth::user()->email }}
                        </div>
                    </div>

                    <div class="pure-g">
                        <div class="pure-u-1-5">
                            用户名
                        </div>
                        <div class="pure-u-1-5">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="pure-u-1-5">
                            <button class="pure-button">
                                修改
                            </button>
                        </div>
                    </div>

                    <div class="pure-g">
                        <div class="pure-u-1-5">
                            密码
                        </div>
                        <div class="pure-u-1-5">
                        </div>
                        <div class="pure-u-1-5">
                            <button class="pure-button">
                                修改
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection