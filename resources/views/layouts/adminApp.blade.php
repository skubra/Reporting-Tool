<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed toggle-btn" data-toggle="collapse" data-target="#admin-menu-content">
                        <span class="sr-only">Menu Toggle</span>
                        <span class="glyphicon glyphicon-th-list"></span>
                    </button>

                </div>

            </div>
        </nav>

        @include ('pages.adminpages.components.sidenav')

        <div class="clearfix"></div>
        <div class="page-content">

            <div class="main-body">

                <div class="col-md-8 main-column">
                    <div class="title">
                        @yield('main-title')
                    </div>
                    <div class="content">
                        @yield('content')
                    </div>
                </div>

                <div class="col-md-4 side-column">
                    <div class="title">
                        @yield('side-title')
                    </div>
                    <div class="side-content">
                        @yield('side-content')
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/livechart.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    @yield('scripts')

    @include('pages.adminpages.kullaniciislemleri.usermodal')
    @include('pages.adminpages.raporislemleri.rapormodal')

</body>
</html>
