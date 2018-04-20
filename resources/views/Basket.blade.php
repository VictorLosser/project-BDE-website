@extends('layouts.template')

@section('title', 'Produits')

@section('content')

    <div id="sectionPanier">
        <h1><i class="fas fa-shopping-cart"></i> Votre panier</h1>
        <br>
        <h2>Commande N°{{$orderID->id}}</h2>
        <br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Produit</th>
                <th scope="col">Quantité</th>
                <th scope="col">prix</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $product)
                <tr>
                    <th>{{$product->title}}</th>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}} €</td>
                </tr>
            @endforeach
            <tr>
                <th scope="row">TOTAL</th>
                <td></td>
                <td>{{$orderID->total_price}} €</td>
            </tr>
            </tbody>
        </table>
        <tr>
            <td>
                <form action="/commande/validation" method="POST">
                    {{ csrf_field() }}
                    <input name="_method" value="PUT" type="hidden">
                    <button class="btn btn-danger" type="submit"><i class="fas fa-check-circle"></i> Valider ma Commande</button>
                </form>
            </td>
        </tr>
        </table>
    </div>
@endsection