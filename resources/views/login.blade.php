@extends('layouts.layout')

@section('title')
    Войти в аккаунт
@endsection

@section('main')
    <div class="container shadow form-auth">
        <form method="post" action="/auth/login">
            <h2 style="text-align: center">Авторизация</h2>
            <hr>
            @csrf
            <label class="form-label" for="login">Логин</label>
            <input class="form-control" type="text" name="login">

            <label class="form-label" for="password">Пароль</label>
            <input class="form-control" type="password" name="password">
            <br>
            <button class="btn w-100" type="submit">Войти</button>
            <br>
            <a href="/reg">
                Нет аккаунта? Создайте его!
            </a>
        </form>
    </div>
@endsection
