@extends('layouts.template')

@section('title', "Modifier un événement")

@section('content')

    <form method="post" action="{{url('idee', [$idee->id])}}">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="PUT">

        <div class="row">
            <div>
                <input id="eventName" name="eventName" type="text" class="form-control" placeholder="Nom de l'évenement"
                       value="{{ $idee->title }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                    <textarea id="eventDescription" name="eventDescription" class="form-control" rows="3"
                              placeholder="description"
                              required>{{ $idee->description }}</textarea>
            </div>
        </div>

        <br>
        <input type="submit"
               value="CONFIRMER LES MODIFICATIONS"
               class="btn btn-sm btn-secondary"/>
    </form>

    <br>

    <!--OLD EVENT -->
    <div class="container">
        <div class="row" style="justify-content: space-around;">
            <h3>Ancien : </h3>
            <div class="col-md-3 product-item">
                <div class="event-header">
                    <h1>{{$idee->title}}</h1>
                </div>
                <div class="event-description">
                    <p>{{$idee->description}}</p>
                </div>
                @if(Auth::user())
                    <div class="event-user">
                        <p class="sign">Publié par {{Auth::user()->firstname." ".Auth::user()->name}}</p></p>
                    </div>
                @else
                    <div>
                        <p class="sign">Publié par un visiteur.</p>
                    </div>
                @endif
            </div>

            <!-- CURRENTLY MODIFIED EVENT -->
            <h3>Nouveau : </h3>
            <div class="col-md-3 product-item">
                <div class="event-header">
                    <h1 class="rt-title">{{$idee->title}}</h1>
                </div>
                <div class="event-description">
                    <p class="rt-description">{{$idee->description}}</p>
                </div>
                @if(Auth::user())
                    <div class="event-user">
                        <p class="sign">Publié par {{Auth::user()->firstname." ".Auth::user()->name}}</p></p>
                    </div>
                @else
                    <div>
                        <p class="sign">Publié par un visiteur.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $('#eventName').on('input', function () {
            $('.rt-title').text($('#eventName').val());
        });


        $('#eventDescription').on('input change', function () {
            $('.rt-description').text($('#eventDescription').val());
        });

    </script>
@endsection