@extends('layouts.template')

@section('title', $product->title)

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/s_product.css') }}"/>
@endsection

@section('content')

    <div style="text-align: center;">
        <a href="/produits">
            <button type="button" class="btn btn-default"><i class="fas fa-arrow-left"></i> Retour</button>
        </a>
        <div class="s-product-header">
            <h1>{{ $product->title }}</h1>
        </div>
        <div class="s-product-image">
            <a href="{{asset('storage/'.$product->images[0]->image_link)}}">
                <img src="{{asset('storage/'.$product->images[0]->image_link)}}" alt="{{$product->images[0]->alt}}">
            </a>
        </div>
        <div class="s-product-description">
            <p>{{ $product->description }}</p>
        </div>
        <div class="s-product-price"><p>
                <i class="fas fa-chevron-right"></i>
                {{ $product->price }} €
                <i class="fas fa-chevron-left"></i>
            </p></div>
        @if (Auth::check())
            <form action="/commande" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id_product" value="{{ $product->id }}"/>
                <button class="btn btn-danger btn-lg" type="submit"><i class="fas fa-cart-plus"></i> Ajouter au
                    panier
                </button>
            </form>
        @endif
    </div>


@endsection