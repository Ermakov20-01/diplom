<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{--  подключение bootstrap  --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    {{--  подключение стилей  --}}
    <link rel="stylesheet" href="/css/main.css">
    {{--  подключение скриптов  --}}
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/slick.min.js"></script>
    <script src="/js/script.js"></script>
</head>
<body>

    <div class="modal fade" id="exampleModalProductCart" tabindex="-1" aria-labelledby="exampleModalProductCartLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalProductCartLabel">Товар добавлен в корзину</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Продолжить покупки</button>
                    <button type="button" class="btn btn-primary">Перейти в корзину</button>
                </div>
            </div>
        </div>
    </div>


    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="#">Контакты</a>
                </div>
                <div class="col">
                    <a href="tel:83902306501">Телефон: 8(9999) 999-999</a>
                </div>
            </div>
        </div>
    </div>
    <header class="shadow">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="/img/logo/logo.png" alt="logo" width="100">
                </a>
                <div class="justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form class="d-flex" action="{{route('showSearch')}}">
                                <input class="form-control me-2" type="search" name="text" placeholder="Поиск" aria-label="Search">
                                <button class="btn btn-search" type="submit">Найти</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('showCart')}}">
                                <ion-icon name="cart-outline"></ion-icon>
                                Корзина
                            </a>
                        </li>
                        @if(Auth::check())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <ion-icon name="person-circle-outline"></ion-icon>
                                    {{Auth::user()->name}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/profile">Личный кабинет</a></li>
                                    @if(Auth::user()->admin)
                                        <li><a class="dropdown-item" href="{{route('Admin')}}">Админ панель</a></li>
                                    @endif
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/logout">Выйти</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/auth">
                                    <ion-icon name="log-in-outline"></ion-icon>
                                    Войти
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('main')
    </main>

    {{--    Подключение иконок --}}
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>
</html>
