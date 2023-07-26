@extends('layouts.layout')

@section('head')
    <!-- recordページ -->
    <!-- SCSS -->

    <!-- CSS -->
    @vite('resources/css/record.css')

    <!-- JS -->
    @vite('resources/js/aprecord.js')
@endsection

@section('body')
<div class="inline-container">
    <!-- ディレクトリ階層表示 -->
    <nav class="ms-5 me-auto mt-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach($layers as $layer)
            <!-- 親オブジェクト -->
            @if($layer !== end($layers))
            <li class="breadcrumb-item"><a href="/index/{{ $layer['object_id'] }}"><h4 style="display:inline;">{{ $layer['object_title'] }}</h4></a></li>
            <!-- 選択したオブジェクト -->
            @else
            <li class="breadcrumb-item active" aria-current="page"><h4 style="display:inline;">{{ $layer['object_title'] }}</h4></li>
            @endif
            @endforeach
        </ol>
    </nav>
    <!--  -->
    <button type="submit" class="btn btn-outline-secondary me-5 mt-3" id="next-button" style="width: 80px; height: 40px;">次へ</button>
</div>

<div class="inline-container ajust-size1 align-items-stretch mt-2" style="width: 100%; min-height: 0%; max-height: 100%;">
    <!-- サイト -->
    <div class="site-container ms-3">
        <h5 class="ms-2"><strong>サイト</strong></h5>
        <div class="inline-container d-flex">
            <button type="button" class="btn btn-outline-secondary" style="width: 40px; height: 40px;">⬅︎</button>
            <button type="button" class="btn btn-outline-secondary" style="width: 40px; height: 40px;">➡︎</button>
            <input type="text" class="form-control flex-fill" id="url-input" placeholder="新しいURLを入力" >
            <button type="submit" class="btn btn-outline-secondary" id="update-button" style="width: 80px; height: 40px;">更新</button>
        </div>
        <br>
        
        <iframe class="img-thumbnail ajust-size2 d-flex align-items-stretch" id="web-iframe" src="https://example.com" style="width: 100%;"></iframe>
        
    </div>

    <!-- ワークフロー -->
    <div class="workflow-container me-3">
        <h5 class="ms-2"><strong>ワークフロー</strong></h5>
        <div class="inline-container">
            <button type="submit" class="btn btn-outline-secondary ms-auto me-3" id="execute-button" style="width: 40px; height: 40px;">▶︎</button>
        </div>

        <div class="list-group scroll-container ajust-size3 d-flex align-items-stretch mt-4" style="width: 100%; min-height: 0%; max-height: 100%;">

            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small class="text-muted">3 days ago</small>
                </div>
                <p class="mb-1">Some placeholder content in a paragraph.</p>
                <small class="text-muted">And some muted small print.</small>
            </a>

            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small>3 days ago</small>
                </div>
                <p class="mb-1">Some placeholder content in a paragraph.</p>
                <small>And some small print.</small>
            </a>
            
        </div>
    </div>
</div>
                    


<!-- CSS -->
<style>
        html, body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden
    }

    .inline-container {
        display: flex;
    }

    .inline-text {
        display:inline;
    }

    .site-container {
        width: 75%;
        height: 100%;
    }

    .workflow-container {
        width: 25%;
        height: 100%;
    }

    
    /* スクロールバーを表示 */
    .scroll-container {
        overflow-y: scroll;
    }
</style>

<!-- JS -->
<script>
    $(document).ready(function() {
        $('#update-button').click(function() {
            var newUrl = $('#url-input').val();
            $('#web-iframe').attr('src', newUrl);
        });
    });

    // リサイズ
    // inline-container
    $(document).ready(function () {
        hsize = $(window).height() - 160;
        wsize = $(window).width();
        $(".ajust-size1").css("height", hsize + "px");
        $(".ajust-size1").css("width", wsize + "px");
    });
    $(window).resize(function () {
        hsize = $(window).height() - 160;
        wsize = $(window).width();
        $(".ajust-size1").css("height", hsize + "px");
        $(".ajust-size1").css("width", wsize + "px");
    });

    // iframeタグ
    $(document).ready(function () {
        hsize = $(".ajust-size1").height() - 80;
        $(".ajust-size2").css("height", hsize + "px");
    });
    $(window).resize(function () {
        hsize = $(".ajust-size1").height() - 80;
        $(".ajust-size2").css("height", hsize + "px");
    });

    // list-group
    $(document).ready(function () {
        hsize = $(".ajust-size1").height() - 80;
        $(".ajust-size3").css("height", hsize + "px");
    });
    $(window).resize(function () {
        hsize = $(".ajust-size1").height() - 80;
        $(".ajust-size3").css("height", hsize + "px");
    });

</script>

@endsection