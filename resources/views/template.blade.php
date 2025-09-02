<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    
    <title>@yield('title')</title>
</head>
<body>
    <div class="mt-20 h-max">
        @yield('content')
    </div>
</body>
</html>