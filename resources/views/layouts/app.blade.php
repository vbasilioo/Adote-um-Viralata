<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Adote um Viralata')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        @yield('content')
    </div>
    @vite('resources/js/app.js')
</body>
</html>