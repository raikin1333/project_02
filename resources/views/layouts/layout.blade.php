<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- SCSS -->
        @vite('resources/sass/app.scss')

        <!-- CSS -->
        @vite('resources/css/app.css')
        @vite('resources/js/bootstrap.js')

        <!-- JS -->
        @vite('resources/js/app.js')

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->

        @yield('head')
       

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen" style="width: 100%; height: 100%;">

            <!-- ナビ -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border border-2" style="height: 80px;">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        
                        <!-- 左側に配置するナビの要素 -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item dropdown">
                                <a class="navbar-brand" href="/">Logo</a>
                            </li>
                        </ul>
                        
                        <!-- 右側に配置するナビの要素 -->
                        <!--  サインインした後 -->
                        @if(false)
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
                        <!--  サインインする前 -->
                        @else
                        <ul class="navbar-nav">
                            <!-- modal trigger -->
                            <li>
                                <button type="button" class="btn btn-outline-secondary m-1" style="width: 80px; height: 40px;" data-bs-toggle="modal" data-bs-target="#signinModal">Sign In</button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-outline-secondary m-1" style="width: 80px; height: 40px;" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
                            </li>    
                        </ul>


                        @include('includes.signin_modal')
                        @include('includes.signup_modal')
                            

                        @endif

                    </div>
                </div>
            </nav>
            
            

            @yield('body')
            
                    

            <!-- CSS -->
            <style>
       
            </style>

            <!-- JS -->
            <script>

            </script>

        
        </div>
    </body>
</html>
