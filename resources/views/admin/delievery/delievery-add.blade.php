@extends('admin.main')

@section('title', 'Добавить доставку')

@section('admin-content')
    <form method="post" action="{{ route('delievery-add-submit-admin') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="formGroupExampleInput">Название доставки</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Стоимость доставки</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="cost">
        </div>
        <p>Картинка товара</p>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="image">
            <label class="custom-file-label" for="customFile">Выберите картинку</label>
        </div>
        <br>
        <br>
        <button class="btn btn-warning" type="submit">Добавить категорию</button>
    </form>
@endsection
