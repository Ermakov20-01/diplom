@extends('layouts.layout')

@section('title', 'Главная страница')

@section('main')
    <div class="container">

        <div class="homepage-top">
            <div class="row">
                <div class="catalog col-sm-3">
                    <div class="menupage">
                        <h3 class="pt-2" style="text-align: center">Каталог товаров</h3>
                        <hr>
                        @foreach($categories as $category)
                            <div class="row category">
                                <a href="{{route('showCategory', $category->alias)}}">
                                    <img src="img/categories/{{$category->image}}" alt="{{$category->title}}" width="20">
                                    {{$category -> title}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-8 col-sm-6">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img/slider.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slider.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slider.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-4 col-sm-6">
                            <div class="sale">
                                Акции
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h2 style="text-align: center">Акуальные предложения</h2>
                        <div class="col">
                            <div class="slider">
                                @foreach($products as $product)

                                    @php
                                        $image = '';
                                          if (count($product->images) > 0) {
                                              $image = $product->images[0]['img'];
                                          } else {
                                              $image = 'noimg.png';
                                          }
                                    @endphp
                                    <div class="slider__item">
                                        <div class="product">
                                            <a href="{{route('showCategory', $product->category['alias'])}}">{{$product->category['title']}}</a>
                                            <div class="image">
                                                <img src="/img/product/{{$image}}" alt="{{$product->title}}" width="150">
                                            </div>
                                            <div class="info">
                                                <a href="{{route('showProduct',[$category->alias,$product->id])}}">
                                                    <h3>{{$product->title}}</h3></a>
                                                <div class="info-price">
                                                    <span class="price">{{$product->price}}<small>₽</small></span>
                                                    <button class="add-to-cart" data-product="{{$product->id}}<">
                                                        <ion-icon name="cart-outline"></ion-icon>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h3 style="text-align: center">Популярные бренды</h3>
        <div class="homepage-brands shadow">
            <div class="slider">

                @foreach($brands as $brand)
                    <div class="slider__item">
                        <a href="{{route('showBrand', $brand->id)}}"><img src="/img/brands/{{$brand->image}}" alt="#"></a>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="homepage-center">
            <h3>Товары</h3>
            <div class="row">
                <div class="col">
                    <div class="tabs">
                        <div class="tabs-triggers">
                            @foreach($favorite_categories as $category)
                                <a href="#tab-{{$category->id}}" class="tabs-triggers__item">
                                    <img src="img/categories/{{$category->image}}" alt="{{$category->title}}" width="20">
                                    {{$category['title']}}</a>
                            @endforeach
                        </div>
                        <div class="tabs-content">
                            @foreach($favorite_categories as $category)
                                <div id="tab-{{$category->id}}" class="tabs-content__item">
                                    <div class="slider">
                                        @foreach(\App\Models\Product::where('category_id', $category->id)->take(5)->get() as $product)
                                            @php
                                                $image = '';
                                                  if (count($product->images) > 0) {
                                                      $image = $product->images[0]['img'];
                                                  } else {
                                                      $image = 'noimg.png';
                                                  }
                                            @endphp
                                            <div class="slider__item">
                                                <div class="product">
                                                    <div class="image">
                                                        <img src="/img/product/{{$image}}" alt="{{$product->title}}" width="200">
                                                    </div>
                                                    <div class="info">
                                                        <h3>{{$product->title}}</h3>
                                                        <div class="info-price">
                                                            <span class="price">{{$product->price}}<small>₽</small></span>
                                                            <button class="add-to-cart" data-product="{{$product->id}}">
                                                                <ion-icon name="cart-outline"></ion-icon>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="homepage-benefits">
            <h3>Почему мы?</h3>
            <div class="row">
                <div class="col">
                    Column
                </div>
                <div class="col">
                    Column
                </div>
                <div class="col">
                    Column
                </div>
            </div>
        </div>

@endsection
