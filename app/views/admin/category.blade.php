@extends('admin.template')

@section('content')
    <h1>Редагувати категорію: {{$category->title}}</h1>
    {{ Form::open( [ 'files' => true, 'url' => 'adm/categories', 'method' => 'PUT'] ) }}
    <div class="form-group">
        <label for="title">Назва</label>
        <input type="text" name="title" id="title" class="form-control" value="{{$category->title}}">
    </div>
    <div class="form-group">
        <label for="slug">Url категорії</label>
        <input type="text" name="slug" id="slug" class="form-control"  value="{{$category->slug}}">
    </div>
    <div class="form-group">
        <label for="parent_id">Батьківська категорія</label><br>
        @if($category->parent_id != 0)
            {{ Form::select( 'parent_id', $categoriesSelect, $category->parent->id, ['id' => 'parent_id']) }}
        @else
            {{ Form::select( 'parent_id', $categoriesSelect, null, ['id' => 'parent_id'] ) }}
        @endif
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Зберегти</button>
    </div>
    {{ Form::close() }}
@stop