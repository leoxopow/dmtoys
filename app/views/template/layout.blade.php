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
        @foreach($menuCategories as $parent)
            <li>
                <a href="/{{$parent->slug}}">{{$parent->title}}</a>
                @if($parent->children->count() > 0)
                    <ul>
                        @foreach($parent->children as $child1)
                            <li>
                                <a href="/{{$parent->slug}}/{{$child1->slug}}">{{$child1->title}}</a>
                                @if($child1->children->count() > 0)
                                    <ul>
                                        @foreach($child1->children as $child2)
                                            <li>
                                                <a href="/{{$parent->slug}}/{{$child1->slug}}/{{$child2->slug}}">{{$child2->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@yield('content')
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('bower_components/smartmenus/dist/jquery.smartmenus.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>