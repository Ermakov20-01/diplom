@extends('layouts.layout')

@section('title', $search)

@section('main')
    <div class="container">

        {{$search}}

        @foreach($products as $product)
            {{$product->title}}
        @endforeach

    </div>
@endsection
