@extends('layouts.template')

@section('title', "Supprimer un produit")

@section('content')

    <div class="alert alert-info" role="alert">
        Vous êtes sur une page réservée aux administrateurs. (vous en avez de la chance)
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div table-responsive-md>
        <table class="table table-striped">
            <thead class="thead-light">
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Prix</th>
            <th scope="col">Action</th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th>{{ $product->id }}</th>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td><img src="storage/products/{{ $product->images[0]->image_link }}" style="max-height: 100px;"></td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ URL::to('produit/' . $product->id . '/edit') }}">
                            <button class="btn btn-info" type="submit">Modifier</button>
                        </a>
                        <form action="{{url('produit', [$product->id])}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection