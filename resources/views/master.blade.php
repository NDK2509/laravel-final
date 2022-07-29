<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/source/assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="/source/assets/dest/vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" href="/source/assets/dest/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="/source/assets/dest/rs-plugin/css/responsive.css">
    <link rel="stylesheet" title="style" href="/source/assets/dest/css/style.css">
    <link rel="stylesheet" href="/source/assets/dest/css/animate.css">
    <link rel="stylesheet" title="style" href="/source/assets/dest/css/huong-style.css">
    @yield('css')
</head>

<body>

    @include('header')

    @yield('content')

    @include('footer')
    @include('script')
    @yield('js')
</body>

</html>
