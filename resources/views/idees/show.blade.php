@extends('layouts.tempWthComments')

@section('title', $idee->title)

@section('onContent')
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

        <div class="showDesc" style="position: relative; margin-bottom: 2em;">
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
            <p class="ideeLikes" onclick="addLikeIdeeImg({{$idee->id}})">
                <span id="countIdeeLikes">{{$idee->likes()->count()}} </span><i
                        class="far fa-thumbs-up" style="background-color: transparent;" title="Afficher noms des likes->users"></i>
            </p>
        </div>

        <!--
        </div>
        Les commentaires seront affichés ici
        -->

@endsection

        @section('scripts')
            <script>
                function addLikeIdeeImg($id) {
                    ideeId = $id;
                    likeType = 'idea';

                    /*alert('Go add ton like sur une ' + likeType + ', imgID = ' + imgId);*/

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        dataType: 'json',
                        type: "POST",
                        url: "/like",
                        data: {
                            imgId: ideeId,
                            likeType: likeType
                        },
                        success: function (data) {
                            console.log(data);
                            if (!data.likeExists) {
                                $('#countIdeeLikes').text(data.likeCount);
                            } else {
                                removeLikeEventImg(data.likeId);
                            }
                        },
                        error: function (data) {
                            console.log("Errors for ajoutation : ", data);
                        }
                    });

                    return false;
                }

                function removeLikeEventImg($likeId) {

                    /*alert('Go supprimer ton like, likeID = ' + $id);*/
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        dataType: 'json',
                        type: "DELETE",
                        url: "/like/" + $likeId,
                        success: function (data) {
                            console.log(data);
                            $('#countIdeeLikes').text(($('#countIdeeLikes').text())-1);
                        },
                        error: function (data) {
                            console.log("Errors for supprimation : ", data);
                            //Meme avec erreurs, la requete marche bien, donc bon !
                            $('#countIdeeLikes').text(parseInt($('#countIdeeLikes').text())-1);
                        }
                    });

                    return false;
                }

            </script>
@endsection