<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>T-shirtApplication</title>
    

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="">
        <h1 class="text-center text-4xl font-semibold text-gray-900 p-12 ">T-SHIRT</h1>
        @yield('content')
        
    </div>

</body>

</html>