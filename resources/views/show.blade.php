@extends('layouts.layout')

@section('title', 'Товар')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <img src="/img/product.jpg" alt="{{$item->title}}" width="150">
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-8 col-sm-6">
                        <p>Название: {{$item->title}}</p>
                    </div>
                    <div class="col-4 col-sm-6">
                        <p>Цена: {{$item->price}}</p>
                        <p>Описание: {{$item->description}}</p>
                    </div>
                    <button class="add-to-cart" data-product="{{$item->id}}<">
                        <ion-icon name="cart-outline"></ion-icon>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
