@extends('layouts.template')

@section('title', 'Produits')

@section('content')
<h1>Votre Panier</h1>
<table>
   <tr>
       <td> Commande N°{{$order[0]->id}}</td>
   </tr>
   <tr>
       <td>produit avec l'id N°{{$products[0]->product_id}}</td>

   </tr>
    <tr>
        <td>prix totale de la comande : {{$order[0]->total_price}}</td>
    </tr>
</table>
@endsection