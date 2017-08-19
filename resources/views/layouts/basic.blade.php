<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($pageTitle) ? $pageTitle." | " : "" }}DevOpsClub - 全栈开发营</title>

    <!-- FAVICO -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#e35d5b">
    <meta name="theme-color" content="#e35d5b">

    <meta name="keywords" content="{{ isset($siteKeywords) ? $siteKeywords.',DevOpsClub,全栈开发营,DevOps,全栈,运维,开发' : 'DevOps-Club,全栈开发营,DevOps,全栈,运维,开发' }}">
    <meta name="description" content="{{ isset($siteDescription) ? $siteDescription : '全栈开发营（DevOps-Club.com，DOC）是全栈开发者的社区之一，希望为全栈开发者提供一个分享、讨论、学习全栈开发相关资讯和知识的平台！ALWAYS ON DEVOPS\' WAY, NEVER BE ALONE!' }}">

    {{--<!-- Bootstrap -->--}}
    {{--<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">--}}
    {{----}}
    {{--<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->--}}
    {{--<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->--}}
    {{--<!--[if lt IE 9]>--}}
    {{--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    {{--<![endif]-->--}}


    <!-- Pure -->
    <link href="//cdn.bootcss.com/pure/1.0.0/pure-min.css" rel="stylesheet">
    {{--<link href="//cdn.bootcss.com/pure/1.0.0/base-min.css" rel="stylesheet">--}}

    <!-- Normalize -->
    <link href="//cdn.bootcss.com/normalize/7.0.0/normalize.min.css" rel="stylesheet">

    <!--[if lte IE 8]>
    <link href="//cdn.bootcss.com/pure/1.0.0/grids-responsive-old-ie-min.css" rel="stylesheet">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link href="//cdn.bootcss.com/pure/1.0.0/grids-responsive-min.css" rel="stylesheet">
    <!--<![endif]-->

    <!-- Font Awesome -->
    <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Customised -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Vue -->
    <script src="//cdn.bootcss.com/vue/2.4.1/vue.min.js"></script>

    <!-- Bootstrap -->
    <script src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

    <!-- Highlight.js -->
    <link href="//cdn.bootcss.com/highlight.js/9.12.0/styles/mono-blue.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>


    @yield("basic-head")
</head>
<body>

@yield("basic-body")

@yield("basic-script")

{{-- 百度链接提交自动推送 --}}
<script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>

{{-- 百度统计 --}}
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?661a72f655c767507c494a04f9adbacf";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>


</body>
</html>