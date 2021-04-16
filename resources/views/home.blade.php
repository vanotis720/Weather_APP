<?php 
    use Carbon\Carbon;
    Carbon::setLocale('fr');
?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>WEATHER APP - VANDER OTIS</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>

    <link rel="apple-touch-icon" sizes="57x57" href="favicon/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <style>
        body {
            color: #fff;
            overflow-x: hidden;
            height: 100%;
            background-image: linear-gradient(#81D4FA, #2196F3);
            background-repeat: no-repeat
        }

        .card0 {
            width: 94%
        }

        .card1 {
            background-image: linear-gradient(#2196F3, #81D4FA);
            padding: 30px 20px 30px 50px
        }

        .image {
            width: 300px;
            height: 300px
        }

        .large-font {
            font-size: 70px;
            font-family: Arial
        }

        .fa-sun-o {
            font-size: 22px
        }

        .card2 {
            background-color: #607D8B;
            padding: 0px 0px 40px 40px
        }

        input {
            background-color: #607D8B;
            padding: 24px 0px 12px 0px !important;
            width: 80%;
            box-sizing: border-box;
            border: none !important;
            border-bottom: 1px solid #CFD8DC !important;
            font-size: 16px !important;
            color: #fff !important
        }

        input:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border-bottom: 1px solid #fff !important;
            outline-width: 0;
            font-weight: 400
        }

        ::placeholder {
            color: #B0BEC5 !important;
            opacity: 1
        }

        :-ms-input-placeholder {
            color: #B0BEC5 !important
        }

        ::-ms-input-placeholder {
            color: #B0BEC5 !important
        }

        .fa-search {
            color: #607D8B;
            background-color: #E1F5FE;
            font-size: 20px;
            padding: 20px;
            width: 20%;
            cursor: pointer
        }

        .light-text {
            color: #B0BEC5
        }

        .suggestion:hover {
            color: #fff;
            cursor: pointer
        }

        .line {
            height: 1px;
            background-color: #B0BEC5
        }

        @media screen and (max-width: 500px) {
            .card1 {
                padding-left: 26px
            }
        }
    </style>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
    </script>
    <script type='text/javascript'></script>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="container-fluid px-1 px-sm-3 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="row card0">
                <div class="card1 col-lg-8 col-md-7"> <small>Weather APP</small>
                    <div class="text-center"> <img class="image mt-5" src="https://i.imgur.com/M8VyA2h.png"> </div>
                    <div class="row px-3 mt-3 mb-3">
                        <h1 class="large-font mr-3">{{ $info->main->temp }}&#176;</h1>
                        <div class="d-flex flex-column mr-3">
                            <h2 class="mt-3 mb-0 text-capitalize">{{ $city }}</h2> 
                            <small>
                                {{
                                    Carbon::now()->format('d-m-Y H:i')
                                }}
                            </small>
                        </div>
                        <div class="d-flex flex-column text-center">
                            {{-- <h3 class="fa fa-sun-o mt-4"></h3> --}}
                            <h4><img src="http://openweathermap.org/img/wn/{{$info->weather[0]->icon}}.png" alt="icon"></h4>
                            <small class="text-capitalize">{{ $info->weather[0]->description }}</small>
                        </div>
                    </div>
                </div>
                <div class="card2 col-lg-4 col-md-5">
                    <div class="row px-3"> 
                        <input type="text" name="location" placeholder="Saisir la ville" class="mb-5">
                        <div class="fa fa-search mb-5 mr-0 text-center"></div>
                    </div>
                    <div class="mr-5">
                        @foreach (App\Http\Controllers\WeatherController::principalCity() as $ville)
                            @if ($city != $ville)
                                <a href='{{ url("/city/$ville") }}'><p class="light-text suggestion">{{ $ville }}</p></a>
                            @endif
                        @endforeach
                        
                        <div class="line my-5"></div>
                        <p>Détails météo</p>
                        <div class="row px-3">
                            <p class="light-text">Nuages</p>
                            <p class="ml-auto">{{ $info->clouds->all }} %</p>
                        </div>
                        <div class="row px-3">
                            <p class="light-text">Humidité</p>
                            <p class="ml-auto">{{ $info->main->humidity }} %</p>
                        </div>
                        <div class="row px-3">
                            <p class="light-text">Vent</p>
                            <p class="ml-auto">{{ $info->wind->speed }} km/h</p>
                        </div>
                        <div class="row px-3">
                            <p class="light-text">Lever du soleil</p>
                            <p class="ml-auto">{{ Carbon::parse($info->sys->sunrise)->format('H:i') }}</p>
                        </div>
                        <div class="row px-3">
                            <p class="light-text">Le coucher du soleil</p>
                            <p class="ml-auto">{{ Carbon::parse($info->sys->sunset)->format('H:i') }}</p>
                        </div>
                        <div class="line mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>