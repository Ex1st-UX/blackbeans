@extends('admin.main')

@section('title', 'Добавить пользователя')

@section('admin-content')
    <form action="/admin/add-user/submit" method="post">
        @csrf

        <div class="form-group">
            <label for="formGroupExampleInput">Имя пользователя</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">E-mail пользователя</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="email" value="">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Пароль</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="password" value="">
        </div>
        <button class="btn btn-warning" type="submit">Добавить</button>
    </form>
@endsection
