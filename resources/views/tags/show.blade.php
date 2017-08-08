@extends("layouts.main")

@section("main-body")
    <div id="category-show" class="container">

        <div class="pure-g">

            <div class="pure-u-18-24">
                <div id="category-show-title">
                    {{ $tag['name'] }}
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
                                        {{ $article['title'] }}
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
                                    <div class="article-list-tags">
                                        @foreach($article['tags'] as $tag)
                                            <a href="{{ url('tag/'.$tag['name']) }}">{{ $tag['name'] }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="pure-u-1-24">

            </div>

            <div class="pure-u-5-24">
                <div id="tag-show-tag-list">
                    <div id="tag-show-tag-list-title">
                        热门标签
                    </div>
                    <ul class="pure-menu-list">
                        @foreach($tags as $tag)
                            <li>
                                <a href="{{ url('tag/'.$tag['name']) }}">{{ $tag['name'] }}&nbsp;{{ $tag['article_count'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

    </div>
@endsection