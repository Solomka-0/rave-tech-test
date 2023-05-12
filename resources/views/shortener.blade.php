<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('/css/shortener.css')}}">
    <title>Shortener</title>
</head>
<body>
    <div class="shortener__container">
        <div class="shortener__header">
            <h1>Shortener</h1>
            <a href="/" class="shortener__back">
                <img src="{{asset("/images/back.png")}}"/>
            </a>
        </div>
        <p>Компактная ссылка:</p>
        <form class="shortener__form" action="/shortener" method="dialog">
            <input id="shortener-result" type="text" readonly/>
            <input class="shortener__copy-button" type="submit" value="Копировать"/>
        </form>
        <p>Исходная ссылка: <a href="http://someresource.org">http://someresource.org</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{asset('/js/shortener.js')}}"></script>
</body>
</html>
