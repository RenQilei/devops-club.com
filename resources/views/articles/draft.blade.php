@extends("layouts.main")

@section("main-body")

    <div class="container">

        <div id="article-draft-title">

            <i class="fa fa-inbox fa-lg" aria-hidden="true"></i>
            我的草稿箱

        </div>

        <div id="article-draft-content">

            <ul>

                <?php $i = 0; ?>
                @foreach($drafts as $draft)

                    @if($i % 2)
                    <li>
                    @else
                    <li class="striped">
                    @endif

                        <div class="pure-g">

                            <div class="pure-u-20-24">
                                {{ $draft['title'] }}
                            </div>

                            <div class="pure-u-4-24 article-draft-content-panel">
                                <a href="{{ url('article/'.$draft['uuid'].'/edit') }}">编辑</a>
                                <a href="" class="pure-button-disabled">直接发布</a>
                            </div>

                        </div>
                    </li>

                   <?php $i++; ?>

                @endforeach

            </ul>

        </div>

    </div>

@endsection