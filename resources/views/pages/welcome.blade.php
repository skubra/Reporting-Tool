<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Raporlama Sist</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #0E2F44;
                font-family: Raleway;
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                margin-top: 100px;
                text-align: center;
            }

            .title {
                margin-bottom: 30px;
                font-size: 84px;
            }

            .title strong{
                color: #6D0011;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            footer{
              position: fixed;
              bottom: 0px;
              right: 10px;
              margin-bottom: 0px;
              display: block;
            }

            @media (max-width: 456px) {
                .title {
                    font-size: 70px;
                }
            }

            @media (max-width: 360px) {
                .title {
                    font-size: 60px;
                }
                .links > a {
                    padding: 0 15px;
                }
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            <div class="lines"></div>
            <div class="content">

                <div class="title m-b-md">
                    <strong>Kayseri Ulaşım</strong><br>Raporlama Sistemi
                </div>
                <hr>
                <div class="links">
                    <a href="{{ route('login') }}">KULLANICI GİRİŞİ</a>
                    <a href="{{ route('admin.login') }}">ADMİN GİRİŞİ</a>
                </div>
            </div>
        </div>

    <footer>
      <p>Kayseri Ulaşım A.Ş. ©2017</p>
    </footer>
    </body>
</html>
