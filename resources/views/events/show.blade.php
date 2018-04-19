@extends('layouts.tempWthComments')

@section('title', $event->title)

@section('onContent')

    <?php
    use App\CommentsBDE;
    use App\ImageBDE;
    use App\EventsBDE;
    use Illuminate\Routing\UrlGenerator;
    ?>

    @if (session('status'))
        <div class="alert alert-success" style="margin: 0px;">
            {{ session('status') }}
        </div>
    @endif

    <div class="container" style="text-align: center">
        <!--<button type="" class="trollBtn" style="display: block;margin:auto;"><a href="/evenements">< Retour</a>
        </button>-->
        <div id="showFlex">
            <div id="showImg">
                <a id="showImgLink" href="{{asset('storage/'.$event->images[0]->image_link)}}">
                    <img src="{{asset('storage/'.$event->images[0]->image_link)}}"
                         alt="{{$event->images[0]->alt}}"
                         title="{{$event->images[0]->alt}}"
                         id="imgShowing"/>
                </a>
                <div id="divImgLike" onclick="addLikeEventImg({{$event->images[0]->id}})">
                    <p class="eventImgLikes">
                        <span id="countEventImgLikes">{{$event->images[0]->likes()->count()}} </span><i
                                class="far fa-thumbs-up" style="background-color: transparent;"
                                title="Afficher noms des likes->users"></i>
                    </p>
                </div>
            </div>
            <div id="showDesc">
                <div><h1>{{ $event->title }}</h1></div>
                <div>
                    <p><strong>Description : </strong>{{ $event->description }}</p>
                    <p><strong>Récurrence : </strong> Tous les {{$event->repeat_interval}} jour(s)</p>
                    <p><strong>Prix : </strong><span style="color: red">{{ $event->price }}€</span></p>
                    <p><strong><i class="fas fa-calendar-alt"></i> Date de l'évènement : </strong>{{$event->date_event}}
                    </p>
                    @if($event->users->id != 0)
                        <p class="sign">Publié par {{$event->users->firstname." ".$event->users->name}}
                            le {{$event->created_at}}</p>
                    @else
                        <p class="sign">Publié par un visiteur le {{$event->created_at}}</p>
                    @endif
                </div>
                <form action="/participate" method="post" class="btnInline">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_event" value="{{$event->id}}"/>
                    <button class="btn btn-info"
                            type="submit"
                            value="{{ $event->id }}">
                        <i class="fas fa-plus"></i> Je participe
                    </button>
                </form>
                <a href="/participate/{{ $event->id }}" class="btnInline">
                    <button class="btn btn-info">
                        <i class="fas fa-users"></i> Voir les participants
                    </button>
                </a>
            </div>

        </div>
        <div id="imgList">
            @foreach($event->images as $image)
                <div class="divImgListing">
                    <img class="imgListing" src="{{asset('/storage/'.$image->image_link)}}" alt="{{$image->alt}}"
                         title="{{$image->alt}}" imgId="{{$image->id}}" likes="{{$image->likes()->count()}}"/>
                    <form action="{{ route('image.destroy', ['id' => $image->id]) }}" method="post" class="btnDelEventImg">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="x" />
                    </form>
                </div>

            @endforeach
        </div>

        @if(Auth::check())
            @if((Auth::user()->status_id) == 2)
                <div class="rightEditBtn">

                    <button id="btnAddImg" class="btn btn-primary">Ajouter</button>

                    <div id="divImgUpload" style="display: none; text-align: left;">
                        <form id="addImgForm" method="post" action="/image" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input id="eventImgType" name="eventImgType" value="event" type="hidden"/>
                            <input id="eventId" name="eventId" value="{{$event->id}}" type="hidden"/>
                            <div class="row">
                                <div class="col">
                                    <img id="new-image" style="max-height: 150px;"/>
                                    <input id="eventImg" name="eventImg" type="file">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="eventImgAlt" name="eventImgAlt" type="text" class="form-control"
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

    <!--
    </div>
    Les commentaires seront affichés ici
    -->

        @endsection

        @section('scripts')
            <script>
                $('.imgListing').on('click', function () {
                    $('#showImgLink').attr('href', $(this).attr('src'));

                    $('#imgShowing').attr({
                        'src': $(this).attr('src'),
                        'alt': $(this).attr('alt'),
                        'title': $(this).attr('title')
                    });
                    $('#divImgLike').attr('onclick', "addLikeEventImg(" + $(this).attr('imgId') + ")");
                    $('#countEventImgLikes').text($(this).attr('likes'));
                });

                $('#btnAddImg').on('click', function () {
                    $('#divImgUpload').slideToggle();
                    if ($('#btnAddImg').text() == 'Ajouter') {
                        $('#btnAddImg').text('Annuler');
                    }
                    else {
                        $('#btnAddImg').text('Ajouter');
                    }
                });

                $('#eventImg').on('change', function (event) {
                    var output = document.getElementById('new-image');
                    output.src = URL.createObjectURL(event.target.files[0]);
                });

                /*SUBMIT FORMULAIRE*/
                /*$('#addImgForm').submit(function () {
                    /*event.preventDefault();*/

                /*var form_data = $('#addImgForm').serialize();
                console.log(form_data);

                alert(eventImgType + "\n" + eventId + "\n" + eventImgAlt);
                $.post('/image', {
                                        eventImgType: eventImgType,
                                        eventId: eventId,
                                        eventImg: eventImg,
                                        eventImgAlt: eventImgAlt,
                                    });*/

                /*$("#addImgFormMsg").fadeIn();
                $("#addImgFormMsg").css({color: 'green'}).text('Loading ...');

                eventImgType = $(this).find('#eventImgType').val();
                eventId = $(this).find('#eventId').val();
                file = $(this).find('#eventImg').files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.readAsText(file);
                    reader.onload = function(e) {
                        // browser completed reading file - display it
                        alert(e.target.result);
                    };
                }
                eventImgAlt = $(this).find('#eventImgAlt').val();

                alert(eventId+"\n"+eventImgType+"\n"+eventImgAlt+"\n"+eventImg);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: "/image",
                    data: {
                        eventImg: eventImg,
                        eventId: eventId,
                        eventImgType: eventImgType,
                        eventImgAlt: eventImgAlt
                    },
                    success: function (data) {
                        $("#addImgFormMsg").text('C goood').delay(5000).fadeOut();
                    },
                    error: function (data) {
                        $("#addImgFormMsg").css({color: 'red'});
                        $("#addImgFormMsg").text('Echec, go voir console log :(').delay(5000).fadeOut();
                        console.log("Errors: ", data);
                    }
                });

                return false;
                //annule le chargement de la page php, car nous allons passer par une requete post direct en js vers le fichier .php
            });*/


                function addLikeEventImg($id) {
                    imgId = $id;
                    likeType = 'image';

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
                            imgId: imgId,
                            likeType: likeType
                        },
                        success: function (data) {
                            console.log(data);
                            if (!data.likeExists) {
                                $('#countEventImgLikes').text(data.likeCount);
                                $('.imgListing').each(function () {
                                    if ($(this).attr("imgid") == imgId) {
                                        $(this).attr("likes", parseInt($(this).attr("likes")) + 1)
                                    }
                                })
                            } else {
                                removeLikeEventImg(data.likeId, imgId);
                            }
                        },
                        error: function (data) {
                            console.log("Errors for ajoutation : ", data);
                        }
                    });

                    return false;
                }

                function removeLikeEventImg($likeId, $imgId) {
                    imgId = $imgId;

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
                            $('#countEventImgLikes').text(($('#countEventImgLikes').text()) - 1);
                        },
                        error: function (data) {
                            console.log("Errors for supprimation : ", data);
                            $('#countEventImgLikes').text(parseInt($('#countEventImgLikes').text()) - 1);
                            $('.imgListing').each(function () {
                                if ($(this).attr("imgid") == imgId) {
                                    $(this).attr("likes", parseInt($(this).attr("likes")) - 1)
                                }
                            })
                        }
                    });

                    return false;
                }

            </script>
@endsection