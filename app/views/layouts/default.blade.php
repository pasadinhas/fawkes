<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Fawkes')</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>

    @include('layouts.partials.navbar')

    @yield('content')

    <!--@include('layouts.partials.footer')-->

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>