@include('head')

@section('title', 'Панель администратора')

<div>
    <ul class="nav nav-pills nav-justified sticky-top">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Сайт</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('home-admin') }}">Панель администратора</a>
        </li>
    </ul>
</div>
<br>
<div class="admin-container">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ route('product-admin') }}">
                                <button class="btn btn-warning w-100">Товары</button>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('category-admin') }}">
                                <button class="btn btn-warning w-100">Категории</button>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('users-admin') }}">
                                <button class="btn btn-warning w-100">Пользователи</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                @section('admin-content')
                    <h1 class="text-center">Привет, </h1>
                @endsection
                @yield('admin-content')
            </div>
        </div>
    </div>
</div>





