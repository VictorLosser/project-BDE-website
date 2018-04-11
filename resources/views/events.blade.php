@extends('layouts.template')

@section('title', 'Evenements')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <nav id="sousNav">
        <div id="addProduct">
            <h5><a href="/evenement/create">Ajouter un evenement</a></h5>
        </div>
        <div id="updateProduct">
            <h5><a href="/evenement">Modifier ou supprimer un evenement</a></h5>
        </div>
    </nav>

    <div class="container">
        <div class="row" style="justify-content: space-around;">
            @foreach ($events as $event)
                <div class="col-md-3 product-item">
                    <div class="product-header">
                        <h1><a href="/evenement/{{$event->event_id}}">{{$event->title}}</a></h1>
                    </div>
                    <div class="product-description">
                        <p>{{$event->description}}</p>
                    </div>
                    <div class="product-price">
                        <p id="price">{{$event->price}}€</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection