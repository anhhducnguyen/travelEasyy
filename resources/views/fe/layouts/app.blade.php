<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    @yield('head')
    <link rel="stylesheet" href="{{ asset('assets/css/user/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/user/footer.css') }}">
    <script src="https://kit.fontawesome.com/1214d8ad52.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo_mini.png')}}" type="image/x-icon">
</head>
<body>
    @include('fe.layouts.header')

    @yield('content')

    @include('fe.layouts.footer')

    @yield('scripts')
</body>
</html>
