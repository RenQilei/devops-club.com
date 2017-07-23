@extends("layouts.main")

@section("main-body")
    <div id="article-show" class="container">
        <div class="pure-g">

            <div class="pure-u-2-3">

                <div id="article-show-top">
                    <div id="article-show-tags">
                        @foreach($article['tags'] as $tag)
                            <a href="">{{ $tag['name'] }}</a>
                        @endforeach
                    </div>

                    @if(\Illuminate\Support\Facades\Auth::id() == $article['user_id'])
                        <div id="article-show-edit-panel">
                            <a href="{{ url('article/'.$article['uuid'].'/edit') }}" id="article-show-edit-panel-edit">编辑</a>
                            @if($article['is_draft'])
                                <a href="{{ url('article/'.$article['uuid'].'/to_publish') }}}" id="article-show-edit-panel-status">转发布</a>
                            @else
                                <a href="{{ url('article/'.$article['uuid'].'/to_draft') }}}" id="article-show-edit-panel-status">转草稿</a>
                            @endif
                        </div>
                    @endif
                </div>

                <div id="article-show-title">
                    {{ $article['title'] }}
                </div>

                <div id="article-show-meta">
                    <span>
                        <a href="{{ url('category/'.$article['category']['name']) }}">
                            {{ $article['category']['display_name'] }}
                        </a>
                    </span>
                    <span>
                        {{ $article['user_name'] }}
                    </span>
                    <span>
                        {{ mb_substr($article['published_at'], 0, 10) }}
                    </span>
                    <span>
                        阅读量：{{ $article['page_view'] }}
                    </span>
                </div>

                @if(!empty($article['banner_url']))
                    <div id="article-show-banner">
                        <img src="{{ $article['banner_url'] }}">
                    </div>
                @endif

                <div id="article-show-content">
                    {!! $article['content'] !!}
                </div>

            </div>

            <div class="pure-u-1-3">



            </div>

        </div>
    </div>
@endsection