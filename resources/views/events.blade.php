@extends('layouts.template')

@section('title', 'Evenements')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" style="margin: 0px;">
            {{ session('status') }}
        </div>
    @endif

    <div class="row" style="justify-content: space-around;">
        @foreach ($events as $event)
            <div class="col-md-3 product-item">
                <div class="event-header">
                    <h1><a href="/evenement/{{$event->id}}"><h2>{{$event->title}}</h2></a></h1>
                </div>
                <div class="event-description">
                    <p>{{$event->description}}</p>
                </div>
                <div>
                    <img src="{{asset('storage/events/'.$event->images[0]->image_link)}}"
                         alt="{{$event->images[0]->alt}}" style="height: 200px; max-width: 100%;"/>
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

@endsection