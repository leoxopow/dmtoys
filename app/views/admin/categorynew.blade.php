@extends('admin.template')

@section('content')
    <h1>Нова категорія</h1>
    {{ Form::open( [ 'files' => true, 'url' => 'adm/categories' ] ) }}
    <div class="form-group">
        <label for="title">Назва</label>
        <input type="text" name="title" id="title" class="form-control" value="{{Form::old('title')}}">
    </div>
    <div class="form-group">
        <label for="slug">Url категорії</label>
        <input type="text" name="slug" id="slug" class="form-control" value="{{Form::old('slug')}}">
    </div>
    <div class="form-group">
        <label for="parent_id">Батьківська категорія</label><br>

        {{ Form::select( 'parent_id', $categoriesSelect, Form::old('parent_id'), ['id' => 'parent_id']) }}
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Зберегти</button>
    </div>
    @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
    {{ Form::close() }}
@stop