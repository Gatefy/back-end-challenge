<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Guilherme Mattioli">

    <title>ToDo List</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/main.css" rel="stylesheet">

</head>
<body id="page-top" @if($routeGroup === 'public') class="bg-gradient-primary" @endif >

{{--{{ $routeName = \Request::route()->getName() }}--}}
@if($routeGroup === 'public')
    @yield('public')
@elseif($routeGroup === 'private')
    @yield('private')
@endif

<!-- JavaScript -->
<script src="/js/app.js"></script>

@yield('extras_scripts')
</body>
</html>
