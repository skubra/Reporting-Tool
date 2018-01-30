<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="{{ asset('css/awesomplete.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kullanici.css') }}">
     @yield('css')
</head>
<body>
    @if (Auth::user()->active != "Pasif")

    <div id="app">
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Raporları açacak buton -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#reports-content">
                        <span class="sr-only">Report Toggle</span>
                        <span class="glyphicon glyphicon-list-alt"></span>
                    </button>

                    <!-- Arama ayarlarını açacak buton -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search-content">
                        <span class="sr-only">Search Toggle</span>
                        <span class="glyphicon glyphicon-search"></span>
                    </button>

                    <!-- İlk üç elementi açacak buton -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-content">
                        <span class="sr-only">Menu Toggle</span>
                        <span class="glyphicon glyphicon-user"></span>
                    </button>

                </div>
            </div>
        </nav>

       @include ('pages.userpages.components.sidenav')

        <div class="clearfix"></div>
        <div class="page-content">

            <div class="main-body">

                <div class="col-md-3 side-column">
                    <div class="title">
                        @yield('side-title')
                    </div>
                    <div class="side-content">
                        <br>
                        @yield('side-content')
                    </div>
                </div>

                <div class="col-md-9 main-column">
                    <div class="title">
                        @yield('main-title')
                    </div>
                    <div class="main-content">
                        <br>
                        @yield('main-content')
                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/awesomplete.js') }}"></script>
    @yield('scripts')
    <script>
        document.getElementById('awe').addEventListener('awesomplete-selectcomplete',function(){
            window.location = this.value;
        });
    </script>

    @else
        <br><br>
        <div class="col-md-2"></div>
        <div class=" col-md-8 alert alert-danger" style="text-align: center;">
            <h2><strong>Sayın {{Auth::user()->name}}</strong></h2>
            Tüm yetkileriniz kaldırılmıştır. <br>
            Erişim Hakkınız Bulunmamaktadır. <br>
            <a href="{{ route('user.logout') }}">Buraya Tıklayarak Çıkış Yapabilirsiniz.</a>
        </div>
        <div class="col-md-2"></div>
    @endif
</body>
</html>
