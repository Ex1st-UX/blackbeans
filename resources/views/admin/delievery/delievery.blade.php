@extends('admin.main')

@section('title', 'Список доставок')

@section('admin-content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Стоимость</th>
            <th>Активность</th>
            <th>
                <a href="{{ route('delievery-add-admin') }}">
                    <button class="btn btn-warning">Добавить доставку</button>
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
        @if (!empty($data) || isset($data))
            @foreach($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->cost }}</td>
                    <td>{{ $item->active }}</td>
                </tr>
            @endforeach
        @endif
        {{--        @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category->category }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td><a href="{{ route('product-edit-admin', $item->id) }}"><button class="btn btn-warning">Подробнее</button></a></td>
                        <td><button class="btn btn-warning">Удалить</button> </td>
                    </tr>
        @endforeach--}}
        </tbody>
    </table>
@endsection
