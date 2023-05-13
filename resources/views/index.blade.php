<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
    <title>Shortener</title>
</head>
<body>
<div class="shortener__dialog shortener">
    <div class="shortener__header">
        <h1>Shortener</h1>
    </div>
    <p>Получи короткую ссылку на выбранный ресурс</p>
    <form class="shortener__form" method="dialog">
        @csrf
        <input name="resource" type="text"
               placeholder="Например: vk.com/video/@shortparis?z=video-23220404_456239189%2Fclub23220404%2Fpl_-23220404_-2"/>
        <input id="submit" type="submit" value="Получить"/>
    </form>
</div>
<div class="shortener__dialog bg-alternative shortener ">
    <p>Компактная ссылка:</p>
    <form class="shortener__form" action="/shortener" method="dialog">
        <input id="shortener-result" type="text" value="" readonly/>
        <input id="shortener__copy-button" type="submit" value="Копировать"/>
    </form>
    <p>Исходная ссылка: <a id="src" href=""></a></p>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="{{asset('/js/index.js')}}"></script>
</body>
</html>
