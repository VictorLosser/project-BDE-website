@extends('layouts.template')

@section('title', "Supprimer un produit")

@section('content')

    @if (isset($_POST['choixProduit']))
        echo "<p>Félicitations !!! La BDD s'est vu retiré l'entrée " . $_POST['choixProduit'];
    @else

        <form method="post" action="supprimer-un-produit">
            <div class="alert alert-info" role="alert">
                Vous êtes sur une page réservée aux administrateurs. (vous en avez de la chance)
            </div>
            <select name="choixProduit" id="inputState" class="form-control" required>
                <option value="" selected>Choissiez un produit</option>
                @foreach($products as $product)

                    <option value="{{ $product->title }}">{{ $product->title }}</option>

                @endforeach
            </select>

            <br>
            <input type="submit" value="SUPPRIMER LE PRODUIT SELECTIONNE" class="btn btn-sm btn-secondary"/>
        </form>

    @endif

@endsection