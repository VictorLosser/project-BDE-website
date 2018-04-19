@extends('layouts.template')

@section('title', 'Produits')

@section('custom_head')
    <script src="{{ asset('/js/products-list.js') }}"></script>
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <body id="bodyProduct">

    <div class="flexCenter">
        <div id="divSearch">
            <input id="searchBar" type="text" placeholder="Votre recherche ici ..." />
            <div id="searchBarCompletion">
                <script>
                    /*creations du selecteur :contains en case non-sensitive !!!*/
                    $.extend($.expr[":"], {
                        "containsIN": function(elem, i, match, array) {
                            return (elem.textContent || elem.innerText || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                        }
                    });

                    $('#searchBar').on('change input focusin', function () {
                        $('#searchBarCompletion').slideDown(100);

                        searchText = $(this).val();
                        $('#searchBarCompletion').text("");
                        $('.product-header:containsIN('+searchText+')').each(function(){
                            text = $("h2", this).text();
                            href = $("a", this).attr("href");
                            $('#searchBarCompletion').append('<a href="' + href + '">' + '<p>' + text + '</p>' + '</a>');
                        });
                    });
                    $('#searchBar').on('focusout', function () {
                        $('#searchBarCompletion').delay(150).fadeOut(250);
                    });
                </script>
            </div>
        </div>
    </div>

    <div id="orderByPrice">
        <form id="byName" action="/produits/productsData" method="get"
              class="btnInline">
            {{ csrf_field() }}
            <button class="btn btn-warning"
                    id="orderName"
                    type="submit"
                    name="title"
                    value="title">
                <i class="fas fa-sort-alpha-down"></i>
                Trier par nom
            </button>
        </form>
        <form id="byPrice" action="/produits/productsData" method="get"
              class="btnInline">
            {{ csrf_field() }}
            <button class="btn btn-warning"
                    id="orderPrice"
                    type="submit"
                    name="price"
                    value="price">
                <i class="fas fa-sort-numeric-down"></i>
                Trier par prix
            </button>
        </form>
    </div>

    {{--        <p>Formulaires PHP normal</p>
            @foreach ($categories as $category)
                <form action="/produits" method="get" class="btnInline">
                    <button class="btn btn-info"
                            type="submit"
                            name="category"
                            value="{{ $category->id }}">
                        {{ $category->category_name }}
                    </button>
                </form>
            @endforeach--}}

    <br>

    <div id="sortByCategory">
        <form id="no-category" action="/produits/productsData" method="get"
              class="btnInline">
            {{ csrf_field() }}
            <button class="btn btn-info"
                    id="non-category"
                    type="submit"
                    name="no-category">
                Tous les produits
            </button>
        </form>
        @foreach ($categories as $category)
            <form id="Category{{ $category->category_name }}" action="/produits/productsData" method="get"
                  class="btnInline">
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
    </div>

    <br>

    <div id="sortByPrice">
        <p>
            <label for="amount">Prix :</label>
            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
        </p>
        <div id="slider-range" style="width:300px;"></div>
    </div>

    <br>

    <div id="products-display" class="row" style="justify-content: space-around">

        {{-- UNCOMMENT FOLLOWING CODE FOR A CLASSIC PHP WAY (because currently it's run with AJAX --}}

        {{--
        @foreach ($products as $key => $product)

                        <div class="col-md-3 product-item">
                            <div class="product-header">
                                <a href="/produit/{{ $product->id }}">
                                    <h1>{{ $product->title }}</h1></a>
                            </div>
                            <div class="product-image"><img
                                        src="{{asset('storage/'.$products[$key]->images[0]->image_link)}}"
                                        alt="{{$products[$key]->images[0]->alt}}">
                            </div>
                            <div class="product-description">
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="product-price">
                                --}}{{--@if ($product->old_price !== null)--}}{{--
                                --}}{{--<p id="old-price">{{ $product->old_price }}€</p>--}}{{--
                                --}}{{--@endif--}}{{--
                                <p id="price">{{ $product->price }}€</p>
                            </div>
                        </div>
                    @endforeach
                    --}}
    </div>

    <aside class="aside">
        <p id="asideCroix">x</p>
        <h5><i class="fas fa-exclamation-circle"></i> Notre dernier produit ! <i class="fas fa-exclamation-circle"></i></h5>
        <?php $lastProduct = $products->last(); ?>
        <div class="col-md aside-item">
            <div>
                <h1 style="font-size: 1.3em; padding: 10px 0px 5px 0px;" class="">{{ $lastProduct->title }}</h1>
            </div>
            <div class="product-image"><img src="{{asset('storage/'.$lastProduct->images[0]->image_link)}}"
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
            $('#asideCroix').click(function () {
                $('.aside').slideToggle(250);
            });
            $('.aside .product-item').click(function () {
                window.location = "/produit/" + {{ $lastProduct->id }};
            });
        </script>
    </aside>

    </body>

@endsection