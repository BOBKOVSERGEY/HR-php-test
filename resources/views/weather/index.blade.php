<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$pageTitle}}</title>

    <link href="{{asset('/css/app.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>{{$pageTitle}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>
                @if ($temperature)
                    Значение температуры {{$temperature}} &deg;C
                @else
                    В настоящий момент невозможно получить данные по температуре
                @endif
            </p>
        </div>
    </div>
</div>
<script src="{{asset('/js/app.js')}}"></script>
</body>
</html>