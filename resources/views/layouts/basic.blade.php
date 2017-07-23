<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DevOps Club</title>

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


    @yield("basic-head")
</head>
<body>

@yield("basic-body")

@yield("basic-script")
</body>
</html>