@extends('layouts.template')

@section('title', 'Evenements')

@section('content')

    <nav id="sousNav">
        <div id="addEvent">
            <h5><a href="/evenement/create">Ajouter un evenement</a></h5>
        </div>
        <div id="updateEvent">
            <h5><a href="/evenement">Modifier ou supprimer un evenement</a></h5>
        </div>
    </nav>

    @if (session('status'))
        <div class="alert alert-success" style="margin: 0px;">
            {{ session('status') }}
        </div>
    @endif

        <div class="container">
        <div class="row" style="justify-content: space-around;">
            @foreach ($events as $event)
                <div class="col-md-3 product-item">
                    <div class="event-header">
                        <h1><a href="/evenement/{{$event->event_id}}">{{$event->title}}</a></h1>
                    </div>
                    <div class="event-description">
                        <p>{{$event->description}}</p>
                    </div>
                    <div class="event-date pannelRightAlign">
                        <p>{{$event->date_event}}</p>
                    </div>
                    <div class="event-recurrence pannelRightAlign">
                        <p>{{$event->recurrence}}</p>
                    </div>
                    <div class="event-price pannelRightAlign">
                        <p id="price">{{$event->price}}€</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection