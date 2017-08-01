@extends("layouts.main")

@section("main-body")

    <div id="article-create" class="container">

        <form class="pure-form pure-form-stacked form-refine" method="POST" action="{{ url('article/reprint') }}">

            {{ csrf_field() }}

            {{--@include("articles.partials.form")--}}

            <fieldset>

                <label for="reprint_url">转载文章源地址</label>

                <input id="reprint_url" type="text" placeholder="">

            </fieldset>

        </form>

    </div>

@endsection

@section("main-head")
    {{--@include("articles.partials.form-head")--}}
@endsection

@section("main-script")
    {{--@include("articles.partials.form-script")--}}
@endsection