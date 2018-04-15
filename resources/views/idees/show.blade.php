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

        .showDesc {
            text-align: center;
        }

        .showDesc h1 {
            text-transform: uppercase;
            margin-bottom: 25px;
        }
        #texte {
            margin-left: 20%;
            text-align: left;
        }
        .sign {
            text-align: right;
            font-style: italic;
            color: grey;
            font-size: small;
        }

    </style>


    <div class="container" style="text-align: center">
        <button type="" class="trollBtn" style="display: block;margin:auto;"><a href="/idees">< Retour</a>
        </button>

        <div class="showDesc">
            <div><h1>{{ $idee->title }}</h1></div>
            <div id="texte">
                <h3>Principe de l'événement proposé : </h3>
                <div>
                    <p>{{ $idee->description }}</p>
                    @if($idee->users->id != 0)
                        <p class="sign">Publié par {{$idee->users->firstname." ".$idee->users->name}}
                            le {{$idee->created_at}}</p>
                    @else
                        <p class="sign">Publié par un visiteur le {{$idee->created_at}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection