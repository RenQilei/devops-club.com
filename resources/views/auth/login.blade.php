@extends("layouts.main")

@section("main-body")
<div class="container">
    <div class="pure-g">
        <div class="pure-u-1-5"></div>
        <div class="pure-u-3-5">
            <div class="panel">
                <div class="panel-heading">登录</div>
                <div class="panel-body">

                    <div class="pure-g">

                        <div class="pure-u-12-24">

                            <form class="pure-form pure-form-stacked" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <fieldset>

                                    {{-- email --}}
                                    <label for="email">Email</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                    <span class="pure-form-message">
                                    @if ($errors->has('email'))
                                            <strong>{{ $errors->first('email') }}</strong>
                                    @endif
                                    </span>

                                    {{-- 密码 --}}
                                    <label for="password">密码</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <span class="pure-form-message">
                                    @if ($errors->has('password'))
                                            <strong>{{ $errors->first('password') }}</strong>
                                    @endif
                                    </span>

                                    {{-- 保持登录 --}}
                                    <label for="remember" class="pure-checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 保持登录
                                    </label>

                                    {{-- 登录 --}}
                                    <button type="submit" class="pure-button pure-button-primary">
                                        登录
                                    </button>

                                    {{-- 忘记密码 --}}
                                    <a id="forget-password" class="panel-link" href="{{ route('password.request') }}">
                                        忘记密码？
                                    </a>

                                </fieldset>
                            </form>

                        </div>

                        <div class="pure-u-12-24">

                            <div class="panel-column-line">
                                <div id="panel-login-right-content">
                                    如果你还没有账号，<br>
                                    就赶紧加入我们吧！<br>
                                </div>
                                <div>
                                    <a href="{{ route('register') }}" class="pure-button pure-button-primary">
                                        立即加入
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
