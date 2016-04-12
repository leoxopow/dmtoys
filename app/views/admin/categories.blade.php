@extends('admin.template')

@section('content')
    <h1>Категорії</h1>
    <p><a href="/adm/categories/create">Створити категорію</a></p>
    <ul class="list-group">
        @foreach($categories as $i=>$parent)
            <li class="list-group-item">
                <a href="/adm/categories/{{$parent->id}}">{{$parent->title}}</a>
                @if($parent->children->count() > 0)
                    <button type="button" class="btn btn-default btn-sm" data-toggle="collapse" data-target="#list{{$i;}}"><i class="glyphicon glyphicon-chevron-down"></i></button>
                    <ul class="list-group collapse" id="list{{$i}}">
                        @foreach($parent->children as $j=>$child1)
                            <li class="list-group-item">
                                <a href="/adm/categories/{{$child1->id}}">{{$child1->title}}</a>
                                @if($child1->children->count() > 0)
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="collapse" data-target="#listChild{{$j}}"><i class="glyphicon glyphicon-chevron-down"></i></button>
                                    <ul class="list-group collapse" id="listChild{{$j}}">
                                        @foreach($child1->children as $child2)
                                            <li class="list-group-item">
                                                <a href="/adm/categories/{{$child2->id}}">{{$child2->title}}</a>
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
@stop