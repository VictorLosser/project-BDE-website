@extends('layouts.template')

@section('content')

    @yield('onContent')

    <?php
    if(isset($event))
        $OBJ = $event;
    elseif(isset($idee))
        $OBJ = $idee;
    elseif(isset($image))
        $OBJ = $image;
    ?>

    <div id="eventComm">
        <hr/>
        <h1><i class="fas fa-comments"></i> Commentaires :</h1>
        @foreach($OBJ->comments as $comm)
            <div class="comments">
                <div class="commUser">{{$comm->users->firstname." ".$comm->users->name}} a dit :</div>
                <div class="commDate">{{$comm->created_at}}</div>
                <div class="commContent">{{$comm->content}}</div>
                @if(Auth::check())
                    <div class="rightEditBtn">
                        <form action="{{url('comment', [$comm->id])}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i> Supprimer</button>
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

@endsection
