@extends("layouts.basic")

@section("basic-head")
    @yield("main-head")
@endsection

@section("basic-body")

    {{-- header --}}
    @include("partials.header")

    {{-- body --}}
    <div id="main-body-wrapper">
        @yield("main-body")
    </div>

    {{-- footer --}}
    @include("partials.footer")

@endsection

@section("basic-script")
    @yield("main-script")
@endsection