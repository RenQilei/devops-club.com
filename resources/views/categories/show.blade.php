@extends("layouts.main")

@section("main-body")
    <div id="category-show" class="container">

        <div class="pure-g">

            <div class="pure-u-18-24">
                <div id="category-show-title">
                    {{ $category['display_name'] }}
                </div>

                <div id="category-show-article-list">
                    <ul>
                        @foreach($articles as $article)
                            <li class="article-list-block">
                                <div class="article-list-title">
                                    {{-- 类型 --}}
                                    @if($article['type'] == 0)
                                        <img src="{{ asset('assets/images/original.png') }}">
                                    @elseif($article['type'] == 1)
                                        <img src="{{ asset('assets/images/reprint.png') }}">
                                    @elseif($article['type'] == 2)
                                        <img src="{{ asset('assets/images/translation.png') }}">
                                    @endif
                                    {{-- 标题 --}}
                                    <a href="{{ url('article/'.($article['url'] ? $article['url'] : $article['uuid'])) }}">
                                        {{ mb_strlen($article['title']) > 30 ? mb_substr($article['title'], 0, 30)."……" : $article['title'] }}
                                    </a>
                                </div>
                                <div class="article-list-brief">
                                    @if($article['banner_url'])
                                        <a href="{{ url('article/'.($article['url'] ? $article['url'] : $article['uuid'])) }}">
                                            <img src="{{ $article['banner_url'] }}">
                                        </a>
                                    @else
                                        {{ mb_substr(strip_tags($article['content']), 0, 120)."……" }}
                                    @endif
                                </div>
                                <div class="article-list-meta">
                                    {{-- 作者 --}}
                                    {{--<span class="category-show-article-list-user">--}}
                                    {{--<a href="">--}}
                                    {{--{{ $article['user_name'] }}--}}
                                    {{--</a>--}}
                                    {{--</span>--}}
                                    {{-- 发布时间 --}}
                                    {{--<span class="category-show-article-list-published">--}}
                                    {{--{{ mb_substr($article['published_at'], 0, 10) }}--}}
                                    {{--</span>--}}
                                    {{-- 标签 --}}
                                    <span class="article-list-tags">
                                                @foreach($article['tags'] as $tag)
                                            <a href="">{{ $tag['name'] }}</a>
                                        @endforeach
                                            </span>
                                    {{-- 阅读全文 --}}
                                    <span class="article-list-more">
                                        <a href="{{ url('article/'.($article['url'] ? $article['url'] : $article['uuid'])) }}">阅读全文</a>
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="pure-u-1-24">

            </div>

            <div class="pure-u-5-24">
                <div id="category-show-category-list">
                    <ul class="pure-menu-list">
                        @foreach($categories as $v)
                            @if($v['name'] == $category['name'])
                                <li class="pure-menu-item active">
                                    <div class="category-show-category-list-icon">
                                        <img src="{{ asset('assets/images/'.$v['name'].'.png') }}">
                                    </div>
                                    <div class="category-show-category-list-name">
                                        {{ $v['display_name'] }}
                                    </div>
                                </li>
                            @else
                                <li class="pure-menu-item">
                                    <a href="{{ url('category/'.$v['name']) }}">
                                        <div class="category-show-category-list-icon">
                                            <img src="{{ asset('assets/images/'.$v['name'].'.png') }}">
                                        </div>
                                        <div class="category-show-category-list-name">
                                            {{ $v['display_name'] }}
                                        </div>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

    </div>
@endsection