@extends('admin.main')

@section('title', 'Список пользователей')

@section('admin-content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>E-mail</th>
            <th><a href="{{ route('add-user') }}"><button class="btn btn-warning">Добавить пользователя</button></a></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td><button class="btn btn-warning">Редактировать</button></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
        </tr>
        </tbody>
    </table>
@endsection
