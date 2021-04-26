@extends('admin.main')

@section('title', 'Список категорий')

@section('admin-content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Категория</th>
            <th>Дата изменения</th>
            <th><a href="{{ route('category-add-admin') }}"><button class="btn btn-warning">Добавить категорию</button></a></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->updated_at }}</td>
                <td><button class="btn btn-warning">Подробнее</button> </td>
                <td><button class="btn btn-warning">Удалить</button> </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
