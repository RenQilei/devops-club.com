@extends("layouts.main")

@section("main-body")

    <div id="article-create" class="container">

        <form class="pure-form pure-form-stacked form-refine" method="POST" action="{{ url('article') }}">

            {{ csrf_field() }}

            @include("articles.partials.form")

        </form>

    </div>

@endsection

@section("main-head")
    @include("articles.partials.form-head")
@endsection

@section("main-script")
    @include("articles.partials.form-script")
@endsection