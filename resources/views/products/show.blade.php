@extends('layouts.template')

@section('title', $product->title)

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/s_product.css') }}"/>
@endsection

@section('content')

    <br>
    <a href="/produits">
        <button type="button" class="btn btn-primary" style="display: block;margin:auto;"><-- Retour</button>
    </a>
    <br>
    <div class="s-product-header">
        <h1>{{ $product->title }}</h1>
    </div>
    <div class="s-product-image"><img src="{{ asset('/products/'.$product->image) }}"></div>
    <div class="s-product-description">
        <p>{{ $product->description }}</p>
    </div>
    <div class="s-product-price"><p>{{ $product->price }}€</p></div>

@endsection