@extends('layouts.template')

@section('title', 'Produits')

@section('custom_css')
    <script src="{{ asset('js/categories.js') }}"></script>
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <body id="bodyProduct">
    <!-- DROPDOWN LIST TO CHOOSE THE TYPE TO ORDER PRODUCTS -->
    <section>
        <FORM method="get" action="produits">
            <div id="form-tri" class="form-group">
                <p id="prix-avg">Le prix moyen est :
                    <strong>{{ round($priceAVG, 2) }}</strong> €</p>
                <p id="msg-tri">
                    @if (isset($_GET['orderBy']))
                        Actuellement trié par {{ $_GET['orderBy'] }}
                    @endif
                </p>
                <SELECT name="orderBy" class="form-control" id="selectTri">
                    <OPTION value="title"
                            @if (isset($_GET['orderBy']))
                            @if ($_GET['orderBy'] == "title")
                            selected
                            @endif
                            @endif>
                        nom
                    </OPTION>
                    <OPTION value="price"
                            @if (isset($_GET['orderBy']))
                            @if ($_GET['orderBy'] == "price")
                            selected
                            @endif
                            @endif>
                        prix
                    </OPTION>
                </SELECT>
                <input type="submit" value="OK" class="btn btn-sm btn-secondary"/>
            </div>
        </FORM>

        @foreach ($categories as $category)
            <form action="/produits" method="get">
                <button class="btn btn-info"
                        type="submit"
                        name="category"
                        value="{{ $category->id }}">
                    {{ $category->category_name }}
                </button>
            </form>
        @endforeach

        @foreach ($categories as $category)
            <form id="Category{{ $category->category_name }}" action="/produits/categorie" method="get">
                {{ csrf_field() }}
                <button class="btn btn-info"
                        id="category-{{ $category->category_name }}"
                        type="submit"
                        name="category-{{ $category->category_name }}"
                        value="{{ $category->id }}">
                    {{ $category->category_name }}
                </button>
            </form>
        @endforeach

        <p id="test"></p>

        <!-- PRODUCTS DISPLAY -->
        <div id="products-display" class="row" style="justify-content: space-around">

            @foreach ($products as $key => $product)

                <div class="col-md-3 product-item">
                    <div class="product-header">
                        <a href="/produit/{{ $product->id }}">
                            <h1>{{ $product->title }}</h1></a>
                    </div>
                    <div class="product-image"><img
                                src="{{asset('storage/products/'.$products[$key]->images[0]->image_link)}}"
                                alt="{{$products[$key]->images[0]->alt}}">
                    </div>
                    <div class="product-description">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="product-price">
                        {{--@if ($product->old_price !== null)--}}
                        {{--<p id="old-price">{{ $product->old_price }}€</p>--}}
                        {{--@endif--}}
                        <p id="price">{{ $product->price }}€</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <aside class="aside">
        <p id="asideCroix">x</p>
        <h5>Notre dernier produit !</h5>
        <?php $lastProduct = $products->last(); ?>
        <div class="col-md product-item">
            <div class="product-header">
                    <h1>{{ $lastProduct->title }}</h1>
            </div>
            <div class="product-image"><img src="{{asset('storage/products/'.$lastProduct->images[0]->image_link)}}"
                                            alt="{{$lastProduct->images[0]->alt}}">
            </div>
            <div class="product-description">
                <p>{{ $lastProduct->description }}</p>
            </div>
            <div class="product-price">
                {{--@if ($product->old_price !== null)--}}
                {{--<p id="old-price">{{ $product->old_price }}€</p>--}}
                {{--@endif--}}
                <p id="price">{{ $lastProduct->price }}€</p>
            </div>
        </div>
        <script>
            $('#asideCroix').click(function() {
               $('.aside').toggle();
            });
            $('.aside .product-item').click(function(){
                window.location = "/produit/" + {{ $lastProduct->id }};
            });
        </script>
    </aside>

    </body>

@endsection

<!--
{{--PISTES DE RECHERCHE POUR LES 3 ARTICLES LES PLUS COMMANDES--}}

{{--orderBy('quantity', 'desc')->take(3)--}}

{{--<?php--}}
{{--foreach ($most->flatMap->products as $oui) {--}}
{{--$non = $oui->containProduct;--}}
{{--echo $non->quantity;--}}
{{--echo ' '.$oui->title.'<br>';--}}
{{--}--}}
{{--?>--}}
        -->