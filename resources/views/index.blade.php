<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
    <title>Shortener</title>
</head>
<body>
    <div class="shortener__container">
        <div class="shortener__header">
            <h1>Shortener</h1>
        </div>
        <p>Получи короткую ссылку на выбранный ресурс</p>
        <form class="shortener__form" action="/shortener" method="post">
            @csrf
            <input type="text" />
            <input type="submit" value="Получить"/>
        </form>
    </div>
</body>
</html>
