@extends('layouts.layout')

@section('title', 'Новая категория')

@section('main')
    <div class="container shadow form-auth">
        <form method="post" action="createCategory">
            <h2 style="text-align: center">Новая категория</h2>
            <hr>
            @csrf
            <label class="form-label" for="title">Название</label>
            <input class="form-control" type="text" name="title" required>

            <label class="form-label" for="desc">Описание</label>
            <input class="form-control" type="text" name="desc" required>

            <label class="form-label" for="email">Изображение</label>
            <input class="form-control" type="email" name="email" required>

            <label class="form-label" for="alias">Название ссылки</label>
            <input class="form-control" type="text" name="alias" required>

            <br>
            <button class="btn w-100" type="submit">Создать</button>
        </form>
    </div>
@endsection

