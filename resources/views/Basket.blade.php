@extends('layouts.template')

@section('title', 'Produits')

@section('content')

    <div id="sectionPanier">
        <h1>Votre panier</h1>
        <br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Commande N°{{$order->id}}</th>
                <th scope="col">Produit</th>
                <th scope="col">prix</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
                <tr>
                    <th scope="row">#</th>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                </tr>
            @endforeach
            <tr>
                <th scope="row">prix total</th>
                <td></td>
                <td>{{$order->total_price}}</td>
            </tr>
            </tbody>
        </table>
        <tr>
            <td>
                <form action="/commande/validation" method="POST">
                    {{ csrf_field() }}
                    <input name="_method" value="PUT" type="hidden">
                    <button class="btn btn-danger" type="submit">Valider ma Commande</button>
                </form>
            </td>
        </tr>
        </table>
    </div>
@endsection