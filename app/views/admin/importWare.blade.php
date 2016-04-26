@extends('admin.template')
@section('content')
    <h1>Імпорт товарів</h1>
{{Form::open(['files' => true, 'url' => 'adm/wares/import'])}}
    <div class="form-group">
        <label for="importFile">Файл Csv</label>
        {{Form::file('importFile', ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Зберегти</button>
    </div>
{{Form::close()}}
@stop