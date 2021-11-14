@extends('admin.main')

@section('title', 'Список товаров')

@section('admin-content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категории</th>
            <th>Цена</th>
            <th>Дата изменения</th>
            <th><a href="{{ route('product-add-admin') }}"><button class="btn btn-warning">Добавить товар</button></a></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ (!empty($item->category->category)) ? $item->category->category : '' }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->updated_at }}</td>
            <td><a href="{{ route('product-edit-admin', $item->id) }}"><button class="btn btn-warning">Подробнее</button></a></td>
            <td><a href="{{ route('product-delete', $item->id) }}"><button type="button" class="btn btn-warning">Удалить</button></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
