@extends('admin.main')

@section('title', 'Добавить категорию')

@section('admin-content')
    <form method="post" action="/admin/category/add/submit">
        @csrf

        <div class="form-group">
            <label for="formGroupExampleInput">Название категории</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name">
        </div>
        <button class="btn btn-warning" type="submit">Добавить категорию</button>
    </form>
@endsection
