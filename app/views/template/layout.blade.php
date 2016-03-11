<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Детский мир</title>
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/smartmenus/dist/css/sm-core-css.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/smartmenus/dist/css/sm-simple/sm-simple.css')}}">
</head>
<body>
<div class="container">
    <ul id="main-menu" class="sm sm-simple">
        <li><a href="#">Item 1</a></li>
        <li><a href="#">Item 2</a>
            <ul>
                <li><a href="#">Item 2-1</a></li>
                <li><a href="#">Item 2-2</a></li>
                <li><a href="#">Item 2-3</a></li>
            </ul>
        </li>
        <li><a href="#">Item 3</a></li>
    </ul>
</div>
@yield('content')
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('bower_components/smartmenus/dist/jquery.smartmenus.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>