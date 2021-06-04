@extends('layouts.layout')

@section('title', 'Регистрация')

@section('main')
    <div class="container shadow form-auth">
        <form method="post" action="/reg/reg">
            <h2 style="text-align: center">Регистрация</h2>
            <hr>
            @csrf
            <label class="form-label" for="name">Введите имя</label>
            <input class="form-control" type="text" name="name" required>

            <label class="form-label" for="login">Введите логин</label>
            <input class="form-control" type="text" name="login" required>

            <label class="form-label" for="email">Введите почту</label>
            <input class="form-control" type="email" name="email" required>

            <label class="form-label" for="password">Создайте пароль</label>
            <input class="form-control" type="password" name="password" required>

            <br>
            <button class="btn w-100" type="submit">Создать аккаунт</button>
        </form>
    </div>
@endsection
