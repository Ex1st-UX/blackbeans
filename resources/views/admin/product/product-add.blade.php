@extends('admin.main')

@section('title', 'Добавить товар')

@section('admin-content')

    <?php
    $category_list = DB::table('category_lists')->get('name');
    $id = 1;
    ?>

    <form action="/admin/product/add/submit" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="formGroupExampleInput">Название</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="">
        </div>
        {{-- Выводим категории в чекбокс--}}
        <p>Категории</p>
        @foreach($category_list as $item)
            <?php
            $id++;
            ?>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck{{ $id }}" value="{{ $item->name }}"
                       name="options[]">
                <label class="custom-control-label" for="customCheck{{ $id }}">{{ $item->name }}</label>
            </div>
        @endforeach

        <div class="form-group">
            <label for="formGroupExampleInput3">Цена за 250 гр</label>
            <input type="text" class="form-control" id="formGroupExampleInput3" name="price" value="">
        </div>
        <div class="form-group">
            <label for="sku_price">Цена за 1000гр</label>
            <input type="text" class="form-control" name="sku_price" id="sku_price">
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="sku-img" name="sku_image">
            <label class="custom-file-label" for="sku-img">Выберите картинку (1000г)</label>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput4">Описание</label>
            <textarea type="text" class="form-control" id="formGroupExampleInput4" name="description"
                      value=""></textarea>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput5">Кислотность</label>
            <select class="custom-select" id="formGroupExampleInput5" name="acidity">
                <option selected>Уровень кислотности</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput6">Плотность</label>
            <select class="custom-select" id="formGroupExampleInput6" name="dencity">
                <option selected>Уровень плотности</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <p>Картинка товара</p>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="image">
            <label class="custom-file-label" for="customFile">Выберите картинку (основной товар)</label>
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-warning">Добавить</button>
    </form>
@endsection

