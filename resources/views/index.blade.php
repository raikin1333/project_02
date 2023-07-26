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

</div>


<!-- オブジェクト一覧 -->
<div class="row row-cols-1 row-cols-md-2 row-cols-xxl-3 g-4 ms-3 me-3 mb-3">

    @foreach($child_objects as $child_object)
    <div class="col">
        <a type="button" href="/index/{{ $child_object['id'] }}" class="btn m-0 p-0 w-100" style="text-align:left;">
            <div class="card border-secondary card-animation" style="height:150px;">
                    <div class="card-header" id="object-title">
                        @if($child_object['object_type'] == 'dir')
                        <img src="{{ asset('img/index/ico_folder.png') }}" class="m-1" width="20px">
                        @elseif($child_object['object_type'] == 'scr')
                        <img src="{{ asset('img/index/ico_file.png') }}" class="m-1" width="20px">
                        @endif
                        {{ $child_object['object_title'] }}
                    </div>
                <div class="card-body text-secondary">
                    <h5 class="card-title" id="object-subtitle">{{ $child_object['object_explain'] }}</h5>
                    <p class="card-text" id="object-explain">Some quick.</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach

    <div class="col">
            <a type="button" href="/scr/record?parent_object_id={{ $object['object_id'] }}" class="btn m-0 p-0 w-100" style="text-align:left;">
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
        </a>
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
    // cardのアニメーション
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