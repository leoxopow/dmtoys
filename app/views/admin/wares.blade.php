@extends('admin.template')

@section('content')
    <h1>Товари</h1>
    <ul class="list-group">
        @foreach($wares as $ware)
            <li class="list-group-item clearfix">
                <div class="col-sm-2">
                    <img src="{{asset('uploads/originals/'.$ware->thumbnail)}}" class="thumbnail img-responsive" alt="">
                </div>
                <a href="/adm/wares/{{$ware->id}}" class="col-sm-9">{{$ware->title}}</a>
                <div class="col-sm-1 text-right">
                    <a href="/adm/wares/{{$ware->id}}/destroy" class="btn btn-sm btn-danger">
                        <i class="glyphicon glyphicon-remove"></i>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
    {{$wares->links()}}
@stop