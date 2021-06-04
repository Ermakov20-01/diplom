@extends('layouts.layout')

@section('title', 'Админ панель')

@section('main')
    <div class="container">

    <div class="container">
        <h2>Добро пожаловать, {{Auth::user()->name}}</h2>
        <br>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="applications-tab" data-bs-toggle="tab" data-bs-target="#applications" type="button" role="tab" aria-controls="applications" aria-selected="true">Заказы</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="categories-tab" data-bs-toggle="tab" data-bs-target="#categories" type="button" role="tab" aria-controls="categories" aria-selected="false">Категории</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="categories-tab" data-bs-toggle="tab" data-bs-target="#brabds" type="button" role="tab" aria-controls="brands" aria-selected="false">Бренды</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="categories-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab" aria-controls="products" aria-selected="false">Товары</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="applications" role="tabpanel" aria-labelledby="applications-tab">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Пользователь</th>
                        <th scope="col">Товары</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Операции</th>
                    </tr>
                    </thead>
                    @foreach($applications as $application)
                        <tbody>
                        <th scope="row">{{$application->id}}</th>
                        <th>{{$application->user->name}}</th>
                        <th>
                            @foreach($application->products as $product)
                                <p>{{$product->title}} {{$product->pivot->count}}</p>
                            @endforeach
                        </th>
                        <th>{{$application->status_id}}</th>
                        <th>
                            <a href="#">Редактировать</a>|
                            <a href="#">Удалить</a>
                        </th>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                <a class="mt-2 float-end btn btn-success" href="{{route('showAdminCategory')}}">Добавить категорию</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Название</th>
                        <th scope="col">Изображение</th>
                        <th scope="col">Alias</th>
                        <th scope="col">Операции</th>
                    </tr>
                    </thead>
                    @foreach($categories as $category)
                    <tbody>
                            <th scope="row">{{$category->id}}</th>
                            <th>{{$category->title}}</th>
                            <th><img src="img/categories/{{$category->image}}" alt="{{$category->title}}" width="100"></th>
                            <th>{{$category->alias}}</th>
                            <th>
                                <a href="#">Редактировать</a>|
                                <a href="#">Удалить</a>
                            </th>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection

