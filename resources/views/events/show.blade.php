@extends('layouts.template')

@section('title', "Supprimer un événement")

@section('content')
    <style>
        .trollBtn a {
            color: black;
        }

        .trollBtn a:hover {
            text-decoration: none;
        }

        .trollBtn {
            position: absolute;
            left: 95px;
            transition: 0.1s;
        }

        .trollBtn:hover {
            transform: translate3d(100px, 50px, 0px);
        }

        img {
            max-height: 400px;
        }

        .showFlex {
            margin: 25px;
            display: flex;
            flex-wrap: nowrap;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .showDesc {
            margin-left: 50px;
            text-align: left;
        }

        .showDesc h1 {
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        .sign {
            text-align: left;
            font-style: italic;
            color: grey;
            font-size: small;
        }

    </style>


    <div class="container" style="text-align: center">
        <button type="" class="trollBtn" style="display: block;margin:auto;"><a href="/evenements">< Retour</a>
        </button>
        <div class="showFlex">
            <div class="showImg">
                <a href="{{asset('storage/events/'.$event->images[0]->image_link)}}">
                    <img src="{{asset('storage/events/'.$event->images[0]->image_link)}}"
                         alt="{{$event->images[0]->alt}}"/>
                </a>
            </div>
            <div class="showDesc">
                <div><h1>{{ $event->title }}</h1></div>
                <div>
                    <p><strong>Description : </strong>{{ $event->description }}</p>
                    <p><strong>Récurrence : </strong>{{$event->recurrence}}</p>
                    <p><strong>Prix : </strong><span style="color: red">{{ $event->price }}€</span></p>
                    <p><strong>Date de l'évènement : </strong>{{$event->date_event}}</p>
                    @if($event->users->id != 0)
                        <p class="sign">Publié par {{$event->users->firstname." ".$event->users->name}}
                            le {{$event->created_at}}</p>
                    @else
                        <p class="sign">Publié par un visiteur le {{$event->created_at}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection