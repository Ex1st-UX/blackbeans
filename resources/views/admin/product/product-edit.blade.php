@extends('admin.main')

@section('title', 'Изменить товар')

@section('admin-content')

    <?php
    $category_list = DB::table('category_lists')->get('name');
    ?>

    <form action="/admin/product/edit/{id}/submit" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="formGroupExampleInput">Название</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{ $product->name }}">
        </div>
        {{-- Выводим категории в чекбокс--}}
       {{-- <p>Категории</p>
        @foreach($category_list as $item)
            <?php
            $id++;
            ?>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck{{ $id }}" value="{{ $item->name }}"
                       name="options[]">
                <label class="custom-control-label" for="customCheck{{ $id }}">{{ $item->name }}</label>
            </div>
        @endforeach--}}

        <div class="form-group">
            <label for="formGroupExampleInput3">Цена за 250 гр</label>
            <input type="text" class="form-control" id="formGroupExampleInput3" name="price"
                   value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput3">Цена за 1000гр</label>
            <input type="text" class="form-control" id="formGroupExampleInput3" name="price_2"
                   value="{{ $product->price_2 }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput4">Описание</label>
            <textarea type="text" class="form-control" id="formGroupExampleInput4" name="description"
                      value="{{ $product->description }}"></textarea>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput5">Кислотность</label>
            <select class="custom-select" id="formGroupExampleInput5" name="acidity">
                <option>Уровень кислотности</option>
                <option <?php if ($product->acidity == 1): echo "selected"; endif; ?> value="1">1</option>
                <option <?php if ($product->acidity == 2): echo "selected"; endif; ?> value="2">2</option>
                <option <?php if ($product->acidity == 3): echo "selected"; endif; ?> value="3">3</option>
                <option <?php if ($product->acidity == 4): echo "selected"; endif; ?> value="4">4</option>
            </select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput6">Плотность</label>
            <select class="custom-select" id="formGroupExampleInput6" name="dencity">
                <option>Уровень плотности</option>
                <option <?php if ($product->dencity == 1): echo "selected"; endif; ?> value="1">1</option>
                <option <?php if ($product->dencity == 2): echo "selected"; endif; ?> value="2">2</option>
                <option <?php if ($product->dencity == 3): echo "selected"; endif; ?> value="3">3</option>
                <option <?php if ($product->dencity == 4): echo "selected"; endif; ?> value="4">4</option>
            </select>
        </div>
        <p>Картинка товара</p>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="image" value="{{ $product->image }}">
            <label class="custom-file-label" for="customFile">Выберите картинку</label>
        </div>
        <br>
        <br>
        <a href="{{ route('product_edit', $product->id) }}"><button type="submit" class="btn btn-warning">Добавить</button></a>
    </form>
@endsection
