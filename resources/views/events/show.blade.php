@extends('layouts.template')

@section('title', "Supprimer un évenement")

@section('content')
    <style>
        .trollBtn a{
            color: black;
        }
        .trollBtn a:hover {
            text-decoration: none;
        }
        .trollBtn{
            position: absolute;
            transition: 0.1s;
        }
        .trollBtn:hover {
            transform: translate3d(100px, 50px, 0px);
        }

    </style>


    <div class="container" style="text-align: center">
        <button type="" class="trollBtn" style="display: block;margin:auto;"><a href="/evenements">< Retour</a></button>
        <h1>{{ $event->title }}</h1>
        <p><strong>Description : </strong>{{ $event->description }}</p>
        <p><strong>Récurrence : </strong>{{$event->recurrence}}</p>
        <p><strong>Prix : </strong><span style="color: red">{{ $event->price }}€</span></p>
        <p><strong>Date de l'évènement : </strong>{{$event->date_event}}</p>
        <p>By ...</p>
    </div>
@endsection