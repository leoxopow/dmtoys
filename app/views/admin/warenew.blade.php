@extends('admin.template')

@section('content')
    {{Form::open( ['files' => true] )}}
    <div class="form-group">
        <label for="title">Назва товару</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="article">SKU/Артикуль</label>
        <input type="text" name="article" id="article" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Опис</label>
        <textarea name="description" id="description" class="editor"></textarea>
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