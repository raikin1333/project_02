@extends('layouts.layout')

@section('head')
    <!-- recordページ -->
    <!-- SCSS -->

    <!-- CSS -->

    <!-- JS -->
    
@endsection

@section('body')

<div class="inline-container">
    <!-- ディレクトリ階層表示 -->
    <nav class="ms-5 me-auto mt-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><h4 style="display:inline;">ROOT</h4></a></li>
            <li class="breadcrumb-item"><a href="#"><h4 style="display:inline;">REINS</h4></a></li>
            <li class="breadcrumb-item active" aria-current="page"><h4 style="display:inline;">沖縄県の不動産データを取得する</h4></li>
        </ol>
    </nav>

</div>

<!-- オブジェクト一覧 -->
<div class="row row-cols-1 row-cols-md-2 row-cols-xxl-3 g-4 ms-3 me-3 mb-3">

    <div class="col">
        <button type="button" class="btn m-0 p-0 w-100" style="text-align:left;">
            <div class="card border-secondary card-animation" style=" height:150px;">
                <div class="card-header" id="object-title"><img src="{{ asset('img/index/ico_file.png') }}" class="m-1" width="20px">楽天市場から商品情報を取得する</div>
                <div class="card-body text-secondary">
                    <h5 class="card-title" id="object-subtitle">Secondary card title</h5>
                    <p class="card-text" id="object-explain">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </button>
    </div>

    <div class="col">
        <button type="button" class="btn m-0 p-0 w-100" style="text-align:left;">
            <div class="card border-secondary card-animation" style=" height:150px;">
                <div class="card-header" id="object-title"><img src="{{ asset('img/index/ico_folder.png') }}" class="m-1" width="20px">Amazon</div>
                <div class="card-body text-secondary">
                    <h5 class="card-title" id="object-subtitle">Secondary card title</h5>
                    <p class="card-text" id="object-explain">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </button>
    </div>

    <div class="col">
        <button type="button" class="btn m-0 p-0 w-100" style="text-align:left;">
            <div class="card border-secondary card-animation" style="height:150px;">
                <div class="card-header" id="object-title"><img src="{{ asset('img/index/ico_folder.png') }}" class="m-1" width="20px">REINS</div>
                <div class="card-body text-secondary">
                    <h5 class="card-title" id="object-subtitle">Secondary card title</h5>
                    <p class="card-text" id="object-explain">Some quick.</p>
                </div>
            </div>
        </button>
    </div>

    <div class="col">
        <button type="button" class="btn m-0 p-0 w-100" style="text-align:left;">
            <div class="card  border-secondary card-animation" style="height:150px;">
                <div class="card-header p-0 m-0">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex align-items-center">
                            <img src="{{ asset('/img/index/ico_plus.png') }}" width="150px">
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                            <h1 class="card-text text-secondary">新規作成</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card border-secondary" style="max-width: 100%; height: 100%;">
                <div class="card-header" id="object-title"><img src="{{ asset('img/index/ico_folder.png') }}" class="m-1" width="20px">
                    REINS
                </div>
                <div class="card-body text-secondary">
                    <h5 class="card-title" id="object-subtitle">新規作成</h5>
                    <p class="card-text" id="object-explain">Some quick example text to build on the card title.</p>
                </div>
            </div> -->
        </button>
    </div>

</div>


<style>
    /* アニメーション */
    @keyframes pulse {
    0% {
        transform: scale(1);
    }
    100% {
        transform: scale(1.02);
    }
    }

    @keyframes reverse-pulse {
    0% {
        transform: scale(1.02);
    }
    100% {
        transform: scale(1);
    }
    }

    .pulse {
    animation-name: pulse;
    animation-duration: 0.2s;
    animation-fill-mode: forwards;
    }

    .reverse-pulse {
    animation-name: reverse-pulse;
    animation-duration: 0.2s;
    animation-fill-mode: forwards;
    }
</style>

<script>
    // cardの上にカーソルがあるときアニメーションを実行
    $(document).ready(function(){
        $(".card-animation").hover(
            function() {
                $(this).removeClass('reverse-pulse');
                $(this).addClass('pulse');
            }, function() {
                $(this).removeClass('pulse');
                $(this).addClass('reverse-pulse');
            }
        );
    });


</script>




@endsection