@extends("layouts.main")

@section("main-body")
<div class="container">
    <div class="pure-g">
        <div class="pure-u-1-5"></div>
        <div class="pure-u-3-5">
            <div class="panel">
                <div class="panel-heading">注册</div>
                <div class="panel-body">

                    <div class="pure-g">

                        <div class="pure-u-12-24">

                            <form class="pure-form pure-form-stacked" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <fieldset>

                                    {{-- 用户名 --}}
                                    <label for="name">用户名</label>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                    <span class="pure-form-message">
                                    @if ($errors->has('name'))
                                        <strong>{{ $errors->first('name') }}</strong>
                                    @endif
                                    </span>

                                    {{-- email --}}
                                    <label for="email">Email</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                                    <span class="pure-form-message">
                                    @if ($errors->has('email'))
                                        <strong>{{ $errors->first('email') }}</strong>
                                    @endif
                                    </span>

                                    {{-- 密码 --}}
                                    <label for="password">密码</label>
                                    <input id="password" type="password" name="password" required>
                                    <span class="pure-form-message">
                                    @if ($errors->has('password'))
                                        <strong>{{ $errors->first('password') }}</strong>
                                    @endif
                                    </span>

                                    {{-- 确认密码 --}}
                                    <label for="password-confirmation">确认密码</label>
                                    <input id="password-confirmation" type="password" name="password_confirmation" required>
                                    <span class="pure-form-message">
                                    @if ($errors->has('password_confirmation'))
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    @endif
                                    </span>

                                    {{-- 注册 --}}
                                    <button type="submit" class="pure-button pure-button-primary">
                                        注册
                                    </button>

                                </fieldset>

                            </form>

                        </div>

                        <div class="pure-u-12-24">

                            <div class="panel-column-line">
                                <div id="panel-login-right-content">
                                    如果你已经有账号，<br>
                                    那么就直接登录吧！<br>
                                </div>
                                <div>
                                    <a href="{{ route('login') }}" class="pure-button pure-button-primary">
                                        立即登录
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
