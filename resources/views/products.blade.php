@extends('layouts.template')

@section('title', 'Produits')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- DROPDOWN LIST TO CHOOSE THE TYPE TO ORDER PRODUCTS -->
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

    <!-- PRODUCTS DISPLAY -->
    <div class="row" style="justify-content: space-around">

        @foreach ($products as $product)
            <div class="col-md-3 product-item">
                <div class="product-header">
                    <a href="/produit/{{ $product->id }}">
                        <h1>{{ $product->title }}</h1></a>
                </div>
                <div class="product-image"><img src="{{ asset('/products/'.$product->image) }}">
                </div>
                <div class="product-description">
                    <p>{{ $product->description }}</p>
                </div>
                <div class="product-price">
                    @if ($product->old_price !== null)
                        <p id="old-price">{{ $product->old_price }}€</p>
                    @endif
                    <p id="price">{{ $product->price }}€</p>
                </div>
            </div>
        @endforeach

    </div>

@endsection