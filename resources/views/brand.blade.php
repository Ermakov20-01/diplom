@extends('layouts.layout')

@section('title', $brand->title)

@section('main')
    <div class="container">

        <img src="/img/brands/{{$brand->image}}" alt="#">
        <h2>{{$brand->title}}</h2>
        <br>
        <p>{{$brand->description}}</p>
        <h2>Все продукты:</h2>
        @foreach($brand->products as $product)

            @php
                $image = '';
                  if (count($product->images) > 0) {
                      $image = $product->images[0]['img'];
                  } else {
                      $image = 'noimg.png';
                  }
            @endphp
                <div class="product">
                    <div class="image">
                        <img src="/img/product/{{$image}}" alt="{{$product->title}}" width="150">
                    </div>
                    <div class="info">
                            <h3>{{$product->title}}</h3></a>
                        <div class="info-price">
                            <span class="price">{{$product->price}}<small>₽</small></span>
                            <button class="add-to-cart" data-product="{{$product->id}}<">
                                <ion-icon name="cart-outline"></ion-icon>
                            </button>
                        </div>
                    </div>
                </div>

        @endforeach
    </div>
@endsection
