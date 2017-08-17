@extends("layouts.main")

@section("main-body")

    <div id="article-create" class="container">

        <form class="pure-form pure-form-stacked form-refine" method="POST" action="{{ url('article/reprint') }}">

            {{ csrf_field() }}

            {{--@include("articles.partials.form")--}}

            <fieldset>

                <label for="reprint_url">转载文章源地址</label>
                <input id="reprint_url" type="text" name="reprint_url" placeholder="">

                <label for="reprint_category">分类</label>
                <select name="reprint_category" id="reprint_category">
                    <option value="">可选择一个分类</option>
                    @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['display_name'] }}</option>
                    @endforeach
                </select>

                <button class="pure-button pure-button-primary">转载</button>

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