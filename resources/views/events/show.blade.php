@extends('layouts.tempWthComments')

@section('title', $event->title)

@section('onContent')

    <?php
    use App\CommentsBDE;
    use App\ImageBDE;
    use App\EventsBDE;
    use Illuminate\Routing\UrlGenerator;
    ?>

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
                         alt="{{$event->images[0]->alt}}"
                         id="imgShowing"/>
                </a>
            </div>
            <div class="showDesc">
                <div><h1>{{ $event->title }}</h1></div>
                <div>
                    <p><strong>Description : </strong>{{ $event->description }}</p>
                    <p><strong>Récurrence : </strong> Tous les {{$event->repeat_interval}} jour(s)</p>
                    <p><strong>Prix : </strong><span style="color: red">{{ $event->price }}€</span></p>
                    <p><strong>Date de l'évènement : </strong>{{$event->date_event}}</p>
                    <p><strong>Votes : </strong>{{$event->likes()->count()}}</p>
                    @if($event->users->id != 0)
                        <p class="sign">Publié par {{$event->users->firstname." ".$event->users->name}}
                            le {{$event->created_at}}</p>
                    @else
                        <p class="sign">Publié par un visiteur le {{$event->created_at}}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="imgList">
            @foreach($event->images as $image)
                <img src="{{asset('/storage/events/'.$image->image_link)}}"
                     alt="{{$image->alt}}"
                     title="{{$image->alt}}"
                     class="imgListing"/>
            @endforeach
        </div>

        @if(Auth::check())
            @if((Auth::user()->status_id) == 2)
                <div class="rightEditBtn">

                    <button id="btnAddImg" class="btn btn-primary">Ajouter</button>
                    {{ csrf_field() }}

                    <div id="divImgUpload" style="display: none; text-align: left;">
                        <form id="addImgForm" method="post" action="{{ url('image') }}" enctype="multipart/form-data">

                            <input id="eventImgType" name="eventImgType" value="event" type="hidden"/>
                            <input id="eventId" name="eventId" value="{{$event->id}}" type="hidden"/>
                            <div class="row">
                                <div class="col">
                                    <input id="eventImg" type="file" accept="image/*" name="eventImg">
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
                    $('#imgShowing').attr("src", $(this).attr('src'));
                    $('.showImg a').attr("href", $(this).attr('src'));
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

                /*SUBMIT FORMULAIRE*/
                $('#addImgForm').submit(function () {
                    eventImgType = $(this).find('#eventImgType').val();
                    eventId = $(this).find('#eventId').val();
                    eventImg = $(this).find('#eventImg').val();
                    eventImgAlt = $(this).find('#eventImgAlt').val();

                    /*alert(eventImgType + "\n" + eventId + "\n" + eventImgAlt);
                    $.post('/image', {
                                            eventImgType: eventImgType,
                                            eventId: eventId,
                                            eventImg: eventImg,
                                            eventImgAlt: eventImgAlt,
                                        });*/

                    $("#addImgFormMsg").fadeIn();
                    $("#addImgFormMsg").css({color:'green'});
                    $("#addImgFormMsg").text('Loading ...');
                    var form_data = $('#addImgForm').serialize();
                    console.log(form_data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    $.ajax({
                        dataType: 'json',
                        type:"POST",
                        url:"/image",
                        data : {eventId:eventId, eventImgType:eventImgType, eventImgAlt:eventImgAlt},
                        success: function(data) {
                            $("#addImgFormMsg").text('C goood').delay(5000).fadeOut();
                        },
                        error: function (data) {
                            $("#addImgFormMsg").css({color:'red'});
                            $("#addImgFormMsg").text('Echec, go voir console log :(').delay(5000).fadeOut();
                            console.log("Errors: ", data);
                        }
                    });

                        return false;
                    /*annule le chargement de la page php, car nous allons passer par une requete post direct en js vers le fichier .php*/
                });

            </script>
@endsection