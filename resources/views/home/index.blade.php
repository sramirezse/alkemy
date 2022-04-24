<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ env('APP_NAME') }} </title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    @include('home.layout.navbar')
    <div class="pt-5"></div>
    @include('home.section1')
    @include('home.section2')
    @include('home.section3')
    @include('home.section4')
    @include('home.layout.footer')
    <script src="{{ mix('js/home.js') }}"></script>
</body>

</html>
