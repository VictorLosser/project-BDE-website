@extends('layouts.template')

@section('title', 'Produits')

@section('content')

    <!-- DROPDOWN LIST TO CHOOSE THE TYPE TO ORDER PRODUCTS -->
    <FORM method="post" action="produits">
        <div id="form-tri" class="form-group">
            <p id="prix-avg">Le prix moyen est :
                <strong>{{ round($priceAVG, 2) }}</strong> €</p>
            <p id="msg-tri">
                @if (isset($_POST['ordreTri']))
                    Actuellement trié par {{ $_POST['ordreTri'] }}
                @endif
            </p>
            <SELECT name="ordreTri" class="form-control" id="selectTri">
                <OPTION value="nom"
                        @if (isset($_POST['ordreTri']))
                        @if ($_POST['ordreTri'] == "nom")
                        selected
                        @endif
                        @endif>
                    nom
                </OPTION>
                <OPTION value="price"
                        @if (isset($_POST['ordreTri']))
                        @if ($_POST['ordreTri'] == "price")
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

        @foreach ($products as $productsAnswer)
            <div class="col-md-3 product-item">
                <div class="product-header">
                    <a href="produit/{{ $productsAnswer->id }}">
                        <h1>{{ $productsAnswer->title }}</h1></a>
                </div>
                <div class="product-image"><img src="{{ asset('products/'.$productsAnswer->image) }}">
                </div>
                <div class="product-description">
                    <p>{{ $productsAnswer->description }}</p>
                </div>
                <div class="product-price">
                    @if ($productsAnswer->old_price !== null)
                        <p id="old-price">{{ $productsAnswer->old_price }}€</p>
                    @endif
                    <p id="price">{{ $productsAnswer->price }}€</p>
                </div>
            </div>
        @endforeach

    </div>

@endsection