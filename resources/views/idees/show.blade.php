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

        <div id="eventComm">
            <hr/>
            <h1>Commentaires :</h1>
            @foreach($idee->comments as $comm)
                <div class="comments">
                    <div class="commUser">{{$comm->users->firstname." ".$comm->users->name}} a dit :</div>
                    <div class="commDate">{{$comm->created_at}}</div>
                    <div class="commContent">{{$comm->content}}</div>
                    @if(Auth::check())
                        <div class="commDelete">
                            <form action="{{url('comment', [$comm->id])}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
            <hr/>
            @if (Auth::check())
                <div id="leaveAcomment">
                    <h4>Lachez un commentaire !</h4>
                    <form method="post" action="/comment" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <?php
                        $currentUrl = url()->current();
                        $urlExplode = explode("/", $currentUrl);
                        $urlType = $urlExplode[3];
                        $urlId = $urlExplode[4];
                        ?>
                        <input type="hidden" name="urlId" value="{{$urlId}}"/>
                        <input type="hidden" name="urlType" value="{{$urlType}}"/>
                        <div class="row">
                            <div class="col">
                                <textarea id="newCommContent"
                                          name="newCommContent"
                                          class="form-control"
                                          style="color: black !important;"
                                          maxlength="5000"
                                          required></textarea>

                            </div>
                        </div>
                        <br/>
                        <input type="submit"
                               value="Poster"
                               class="btn btn-sm btn-secondary"/>
                    </form>
                </div>
            @else
                <div class="alert alert-danger" style="text-align: center;">
                    <p style="margin: 0px;">Vous devez être connecté pour répondre !</p>
                </div>
            @endif
        </div>
    </div>
@endsection