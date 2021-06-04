@extends('layouts.layout')

@section('title', $cat->title)

@section('main')

    <div class="container">
        <div class="category_container d-flex justify-content-lg-center">
            <h2 style="text-align: center">
                <img src="img/categories/{{$cat->image}}" alt="{{$cat->title}}" width="50">
                {{$cat->title}}</h2>
        </div>
        <br>
        <form action="{{route('showCategory', $cat->alias)}}" method="get">
            <select name="order">
                <option value="1">По наименованию A-Z</option>
                <option value="2">По наименованию Z-A</option>
                <option value="3">По возрастанию цены</option>
                <option value="4">По убаванию цены</option>
            </select>
            <button>Показать</button>
        </form>

        <div class="row">
            @foreach($products as $product)

                @php
                    $image = '';
                      if (count($product->images) > 0) {
                          $image = $product->images[0]['img'];
                      } else {
                          $image = 'noimg.png';
                      }
                @endphp
            <div class="col-sm-3 mt-3">
                <div class="product">
                    <div class="image">
                        <img src="/img/product/{{$image}}" alt="{{$product->title}}" width="150">
                    </div>
                    <div class="info">
                        <a href="{{route('showProduct',[$product->category->alias,$product->id])}}"><h3>{{$product->title}}</h3></a>
                        <div class="info-price">
                            <span class="price">{{$product->price}}<small>₽</small></span>
                            <button class="add-to-cart">
                                <ion-icon name="cart-outline"></ion-icon>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
