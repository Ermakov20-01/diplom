@extends('layouts.layout')

@section('title', 'Корзина')

@section('main')
    <h3 class="text-center border">Добро пожаловать, {{Auth::user()->name}}</h3>
    <br>
    <h4 class="text-center border">Корзина бронирования заказов</h4>
    @if($products)
        <a class="button btn mb-3" href="/catalog" style="font-size: 18px">Добавить товары в каталог</a>
        <table class="table table-dark" style="vertical-align: middle">
            <thead>
            <tr>
                <th class="text-center">Товар</th>
                <th class="text-center">Название</th>
                <th class="text-center">Производитель</th>
                <th class="text-center">Цена за штуку</th>
                <th class="text-center">Количество</th>
                <th class="text-center">Цена</th>
                <th class="text-center">Операции</th>
            </tr>
            </thead>
            <tbody>
            @php
                $price_all = 0
            @endphp
            @foreach($products as $product)
                @php
                    $price_all += $product['cart_price'];

                    $image = '';
                      if (count($product->images) > 0) {
                          $image = $product->images[0]['img'];
                      } else {
                          $image = 'noimg.png';
                      }
                @endphp


                <tr>
                    <th>
                        <div class="image">
                            <img src="/img/{{$image}}" alt="{{$product->title}}" width="150">
                        </div>
                    </th>
                    <th class="text-center" style="width: 400px">{{$product->title}}</th>
                    <th class="text-center">
                        <p>{{$product->brand->title}}</p>
                    </th>
                    <th class="text-center">{{$product->price}} ₽</th>
                    <th class="text-center">
                        <button class="cart-btn-del btn-secondary" data-product="{{$product->id}}">-</button>
                        <input type="text" class="cart-btn-edit" style="width: 40px; text-align: center"
                               data-product="{{$product->id}}" value="{{$product->cart_count}}">
                        <button class="cart-btn-add btn-secondary" data-product="{{$product->id}}">+</button>
                    </th>
                    <th class="text-center">{{$product->cart_price}} ₽</th>
                    <th>
                        <div  class="d-flex justify-content-center">
                            <img src="/img/custom/delete.png" class="cart-btn-clear" data-product="{{$product->id}}"
                                 title="Убрать товар" style="height: 50px; width: 50px; cursor: pointer; right: -10px;" alt="Убрать">
                        </div>
                    </th>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th style="font-size: 18px">Итого:</th>
                <th style="font-size: 18px">{{$price_all}} ₽</th>
                <td></td>
            </tr>
            </tbody>
        </table>
        <form action="/cart" class="mb-3" method="post">
            @csrf
            <input type="submit" class="btn btn-secondary" style="width: 100%;font-size: 18px; text-transform: uppercase;" value="Оформить заказ">
        </form>
        <h5 class="text-center border">После отправки заказа, ожидайте звонок по указанному номеру телефона с уточнением от
            лица администрации сайта </h5>
    @else
        <a class="button btn" href="/catalog" style="font-size: 18px;">Добавить товары в каталог</a>
    @endif

    <h4 class="text-center mt-4 border">История заказов</h4>

@endsection
