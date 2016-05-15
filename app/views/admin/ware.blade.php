@extends('admin.template')

@section('content')
    <h1>Товар: {{$ware->title}}</h1>
    {{Form::open( ['files' => true, 'url' => 'adm/wares/'.$ware->id] )}}
    <div class="form-group">
        <label for="title">Назва товару</label>
        <input type="text" name="title" id="title" class="form-control" value="{{$ware->title}}">
    </div>
    <div class="form-group">
        <label for="article">SKU/Артикуль</label>
        <input type="text" name="article" id="article" class="form-control" value="{{$ware->article}}">
    </div>
    <div class="form-group">
        <label for="description">Опис</label>
        <textarea name="description" id="description" class="editor">{{$ware->description}}</textarea>
    </div>
    <div class="form-group">
        <h4>Головне зображення:</h4>
        <img src="{{asset('uploads/thumbnails/' . $ware->id . '/' . $ware->thumbnail)}}" class="thumbnail" alt="">
    </div>
    <div class="form-group">
        <label for="thumbnail">Головне зображення</label>
        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Зберегти</button>
    </div>
    {{Form::close()}}
@stop