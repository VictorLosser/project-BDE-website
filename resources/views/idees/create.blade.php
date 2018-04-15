@extends('layouts.template')

@section('title', "Ajouter un événement")

@section('content')

    <?php
    use Illuminate\Support\Facades\Auth;

    ?>

    <form method="post" action="/idee" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div>
                <input id="eventName" name="eventName" type="text" class="form-control" placeholder="Nom de l'évenement"
                       value="" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                    <textarea id="eventDescription" name="eventDescription" class="form-control" rows="3"
                              placeholder="description"
                              required></textarea>
            </div>
        </div>

        <br/>
        <input type="submit"
               value="ENVOYER"
               class="btn btn-sm btn-secondary"/>
    </form>

    <br>

    <!--OLD EVENT -->

    <div class="container">
        <div class="row" style="justify-content: center;">

            <!-- CURRENTLY MODIFIED EVENT -->
            <h3>Apparence : </h3>
            <div class="col-md-3 product-item">
                <div class="event-header">
                    <h1 class="rt-title"><i>Titre</i></h1>
                </div>
                <div class="event-description">
                    <p class="rt-description"><i>Description</i></p>
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

        $('#eventDescription').on('input', function () {
            $('.rt-description').text($('#eventDescription').val());
        });

    </script>
@endsection