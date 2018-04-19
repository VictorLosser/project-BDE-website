@extends('layouts.tempWthComments')

@section('title', $idee->title)

@section('onContent')

    <div class="container" style="text-align: center">
        <!--<button type="" class="trollBtn" style="display: block;margin:auto;"><a href="/idees">< Retour</a>
        </button>-->

        @if(Auth::check())
            @if((Auth::user()->status_id) == 2)
                <div class="rightEditBtn">

                    <button id="btnAddImg" class="btn btn-default">Créer l'événement</button>

                    <div id="divImgUpload" style="display: none; text-align: left;">
                        <form id="addImgForm" method="post" action="/evenement" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input id="eventName" name="eventName" value="{{$idee->title}}" type="hidden"/>
                            <input id="eventDescription" name="eventDescription" value="{{$idee->description}}"
                                   type="hidden"/>
                            <div class="row">
                                <div class="col">
                                    <input id="eventDate" name="eventDate" type="datetime-local" class="form-control"
                                           value="" required>
                                </div>
                                <div class="col">
                                    <input id="eventRecurrence" name="eventRecurrence" type="number"
                                           class="form-control"
                                           placeholder="Récurrence (ex: 7 -> événement hebdo)"
                                           step="1"
                                           value="" required>
                                </div>
                                <div class="col">
                                    <input id="eventPrice" name="eventPrice" type="number" class="form-control"
                                           placeholder="prix"
                                           step="0.01"
                                           value="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <img id="new-image" style="max-height: 150px;"/>
                                    <input id="eventImg" name="eventImg" type="file">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="eventAlt" name="eventAlt" type="text" class="form-control"
                                           placeholder="Description de l'image"/>
                                </div>
                            </div>
                            <input id="envoyerForm" class="btn btn-success" type="submit" value="Envoyer"/>
                            <span id="addImgFormMsg" style="color: green; vertical-align: bottom;"></span>
                        </form>
                    </div>
                </div>
            @endif
        @endif

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
                        class="far fa-thumbs-up" style="background-color: transparent;"
                        title="Afficher noms des likes->users"></i>
            </p>
        </div>

    </div>

@endsection

@section('scripts')
    <script>
        $('#btnAddImg').on('click', function () {
            $('#divImgUpload').slideToggle();
            if ($('#btnAddImg').text() == "Créer l'événement") {
                $('#btnAddImg').text('Annuler');
            }
            else {
                $('#btnAddImg').text("Créer l'événement");
            }
        });

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
                    $('#countIdeeLikes').text(($('#countIdeeLikes').text()) - 1);
                },
                error: function (data) {
                    console.log("Errors for supprimation : ", data);
                    //Meme avec erreurs, la requete marche bien, donc bon !
                    $('#countIdeeLikes').text(parseInt($('#countIdeeLikes').text()) - 1);
                }
            });

            return false;
        }

    </script>
@endsection