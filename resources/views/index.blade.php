@extends("layouts.main")

@section("main-body")
    <div class="container">
        <div class="pure-g">
            <div class="pure-u-2-3">

                <div id="index-article-list">
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
                                    {{-- 分类 --}}
                                    @if($article['category_id'])
                                        <a href="{{ url('category/'.$article['category']['name']) }}" class="index-article-list-category">{{ $article['category']['display_name'] }}</a>
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
                                    {{--<span class="index-article-list-user">--}}
                                        {{--<a href="">--}}
                                            {{--{{ $article['user_name'] }}--}}
                                        {{--</a>--}}
                                    {{--</span>--}}
                                    {{-- 发布时间 --}}
                                    {{--<span class="index-article-list-published">--}}
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

                <div id="index-article-pagination">
                    @if($currentPage > 1)
                        <a href="{{ url('/?page='.($currentPage - 1)) }}">更新</a>
                    @endif
                    第 {{ $currentPage }} 页
                    @if($currentPage < $totalPageCount)
                        <a href="{{ url('/?page='.($currentPage + 1)) }}">更旧</a>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection