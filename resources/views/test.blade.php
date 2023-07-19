<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> -->

        <!-- CSS & SCSS ＆ JS -->
        @vite('resources/sass/app.scss')
        @vite('resources/css/app.css')
        @vite('resources/js/bootstrap.js')
        @vite('resources/js/app.js')

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Popper -->
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        
       
        

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen" style="width: 100%; height: 100%;">


            
            <!-- ナビ -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light outline-secondary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        
                        <!-- 左側に配置するナビの要素 -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item dropdown">
                                <a class="navbar-brand" href="/">Logo</a>
                            </li>
                        </ul>
                        
                        <!-- 右側に配置するナビの要素 -->
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('img/index/ico_account.png') }}" height=40px>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">プロフィール</a></li>
                                    <li><a class="dropdown-item" href="#">アップグレード</a></li>
                                    <li><a class="dropdown-item" href="#">サインアウト</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>

            
            <div class="inline-container">
                <!-- フォルダ階層表示 -->
                <nav class="ms-5 me-auto mt-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><h4 style="display:inline;">Root</h4></a></li>
                        <li class="breadcrumb-item"><a href="#"><h4 style="display:inline;">REINS</h4></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><h4 style="display:inline;">沖縄県の不動産データを取得する</h4></li>
                    </ol>
                </nav>
                <!--  -->
                <button type="submit" class="btn btn-outline-secondary me-5 mt-3" id="" style="width: 80px; height: 40px;">次へ</button>
            </div>
            
            
            <div class="inline-container ajust-size1 mt-2" style="width: 100%; min-height: 0%; max-height: 100%;">
                <!-- サイト -->
                <div class="site-container ms-3">
                    <h5 class="ms-2"><strong>サイト</strong></h5>
                    <div class="inline-container d-flex">
                        <button type="button" class="btn btn-outline-secondary" style="width: 40px; height: 40px;">⬅︎</button>
                        <button type="button" class="btn btn-outline-secondary" style="width: 40px; height: 40px;">➡︎</button>
                        <input type="text" class="form-control flex-fill" id="url-input" placeholder="URLを入力" >
                        <button type="submit" class="btn btn-outline-secondary" id="update-button" style="width: 60px; height: 40px;">更新</button>
                    </div>
                    <br>
                    
                    <iframe class="img-thumbnail ajust-size2" id="web-iframe" src="https://example.com" style="width: 100%;"></iframe>
                    
                </div>

                <!-- ワークフロー -->
                <div class="workflow-container me-3">
                    <h5 class="ms-2"><strong>ワークフロー</strong></h5>
                    <div class="inline-container">
                        <button type="submit" class="btn btn-outline-secondary ms-auto me-3" id="" style="width: 40px; height: 40px;">▷</button>
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
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                            <small class="text-muted">And some muted small print.</small>
                        </a><a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small>3 days ago</small>
                            </div>
                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                            <small>And some small print.</small>
                        </a>
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
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                            <small class="text-muted">And some muted small print.</small>
                        </a>
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
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                            <small class="text-muted">And some muted small print.</small>
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
                        console.log(0);
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

        
        </div>
    </body>
</html>
