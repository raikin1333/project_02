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
       
        

    </head>
    <body class="antialiased">
        <!-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen"> -->


        <div class="inline-container">
                <!-- サイト -->
                <div class="site-container">
                    <h5><strong>サイト</strong></h5>
                    <!-- <div class="inline-container">
                        <button type="button" class="btn btn-outline-secondary">⬅︎</button>
                        <button type="button" class="btn btn-outline-secondary">➡︎</button>
                        <input type="password" class="form-control" id="url-input" placeholder="新しいURLを入力" style="width: 60%;">
                        <button type="submit" class="btn btn-outline-secondary" id="update-button">更新</button>
                    </div>
                    <br> -->
                    
                    <iframe id="web-iframe" src="https://example.com" width="100%" height="100%"></iframe>
                </div>

                <!-- ワークフロー -->
                <div class="workflow-container">
                    <h5><strong>ワークフロー</strong></h5>
                    <div class="list-group scroll-container">
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
                }

                .inline-container {
                    display: flex;
                    width: 100%;
                    height: 100%;
                }

                .site-container {
                    width: 75%;
                    height: 100%;
                }

                .workflow-container {
                    width: 25%;
                    height: 100%;
                }

                #web-iframe {

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

                // $(document).ready(function () {
                //     hsize = $(window).height();
                //     console.log(hsize);
                //     $(".site-container").css("height", hsize + "px");
                // });
                // $(window).resize(function () {
                //     hsize = $(window).height();
                //     console.log(hsize);
                //     $(".site-container").css("height", hsize + "px");
                // });

            </script>

        
        </div>
    </body>
</html>
