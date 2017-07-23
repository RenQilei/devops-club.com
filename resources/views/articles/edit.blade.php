@extends("layouts.main")

@section("main-body")

    <div id="article-create" class="container">

        <form class="pure-form pure-form-stacked form-refine" method="POST" action="{{ url('article/'.$article['uuid']) }}">

            {{ csrf_field() }}

            {{ method_field('PUT') }}

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