@extends("layouts.main")

@section("main-body")
    <div id="article-show" class="container">
        <div class="pure-g">

            <div class="pure-u-1 pure-u-lg-2-3">

                <div id="article-show-top">
                    @if((Auth::id() == $article['user_id']) || (Auth::user() && Auth::user()->hasRole('admin')))
                        <div id="article-show-edit-panel">
                            <a href="{{ url('article/'.$article['uuid'].'/edit') }}" id="article-show-edit-panel-edit">编辑</a>
                            @if($article['is_draft'])
                                <a href="{{ url('article/'.$article['uuid'].'/to_publish') }}}" id="article-show-edit-panel-status" class="pure-button-disabled">转发布</a>
                            @else
                                <a href="{{ url('article/'.$article['uuid'].'/to_draft') }}}" id="article-show-edit-panel-status" class="pure-button-disabled">转草稿</a>
                            @endif
                        </div>
                    @endif
                </div>

                <div id="article-show-title">
                    {{-- 类型 --}}
                    @if($article['type'] == 0)
                        <img src="{{ asset('assets/images/original.png') }}">
                    @elseif($article['type'] == 1)
                        <img src="{{ asset('assets/images/reprint.png') }}">
                    @elseif($article['type'] == 2)
                        <img src="{{ asset('assets/images/translation.png') }}">
                    @endif
                    {{-- 标题 --}}
                    {{ $article['title'] }}
                </div>

                <div id="article-show-tags">
                    @foreach($article['tags'] as $tag)
                        <a href="{{ url('tag/'.$tag['name']) }}">{{ $tag['name'] }}</a>
                    @endforeach
                </div>

                <div id="article-show-meta">
                    @if($article['category_id'] != 0)
                        <span id="article-show-category">
                            <a href="{{ url('category/'.$article['category']['name']) }}">{{ $article['category']['display_name'] }}</a>
                        </span>
                    @endif
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

                {{-- 转载、翻译文章来源 --}}
                <div id="article-show-source-info">

                </div>

                {{-- 文章分享 --}}
                <div id="article-show-share"></div>

                <script type="text/javascript">
                    var $config = {
                        // url                 : '', // 网址，默认使用 window.location.href
                        source              : '<meta name="site" content="http://devops-club.com" />', // 来源（QQ空间会用到）, 默认读取head标签：<meta name="site" content="http://overtrue" />
                        // title               : , // 标题，默认读取 document.title 或者 <meta name="title" content="share.js" />
                        // description         : '', // 描述, 默认读取head标签：<meta name="description" content="PHP弱类型的实现原理分析" />
                        // image               : '', // 图片, 默认取网页中第一个img标签
                        sites               : ['qq', 'wechat', 'weibo', 'qzone', 'tencent', 'douban', 'diandian', 'linkedin', 'facebook', 'twitter', 'google'], // 启用的站点
                        disabled            : [], // 禁用的站点
                        wechatQrcodeTitle   : "微信扫一扫：分享", // 微信二维码提示文字
                        wechatQrcodeHelper  : '<p>微信里点“发现”，扫一下</p><p>二维码便可将本文分享至朋友圈。</p>',
                    };
                    $("#article-show-share").share($config);
                </script>

            </div>

            {{-- 手机版显示方式还未确定 --}}
            <div class="pure-u-1 pure-u-lg-1-3">



            </div>

        </div>
    </div>
@endsection

@section("main-head")
    <link href="//cdn.bootcss.com/social-share.js/1.0.16/css/share.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/social-share.js/1.0.16/js/jquery.share.min.js"></script>
@endsection