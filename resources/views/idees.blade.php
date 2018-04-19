@extends('layouts.template')

@section('title', 'Idees')


@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <style>


    </style>

    <div style="margin: 1% 0% 3% 0%;"><button type="button" class="btn btn-danger btn-lg btn-block"><a class="nav-link" href="/idee/create" style="color: white;"><h2><i class="fas fa-plus"></i> Ajouter une idée</h2></a></button></div>

    <!-- IDEES DISPLAY -->
    <div class="row" style="justify-content: space-around;">
        @foreach ($idees as $idee)
            <div class="col-md-3 product-item">
                <div class="event-header">
                    <a href="/idee/{{$idee->id}}"><h2><i class="fas fa-lightbulb"></i> {{$idee->title}}</h2></a>
                </div>
                <div class="event-description">
                    <p>{{$idee->description}}</p>
                </div>
                @if($idee->users->id != 0)
                    <p class="sign">Publié par {{$idee->users->firstname." ".$idee->users->name}}
                        le {{$idee->created_at}}</p>
                @else
                    <p class="sign">Publié par un visiteur le {{$idee->created_at}}</p>
                @endif
            </div>
        @endforeach
    </div>

@endsection
