@extends('layouts.template')

@section('title', "Modifier un produit")

@section('content')

    <form method="post" action="{{url('evenement', [$event->event_id])}}">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="PUT">

        <div class="row">
            <div>
                <input id="eventName" name="eventName" type="text" class="form-control" placeholder="Nom de l'évenement"
                       required>
            </div>
            <div class="col">
                    <textarea id="eventDescription" name="eventDescription" class="form-control" rows="3" placeholder="description"
                              required></textarea>
            </div>
            <div class="col">
                <input id="eventDate" name="eventDate" type="date" class="form-control" placeholder="date"
                       required>
            </div>
            <div class="col">
                <input id="eventRecurrence" name="eventRecurrence" type="text" class="form-control" placeholder="récurrence"
                       required>
            </div>
            <div class="col">
                <input id="eventPrice" name="eventPrice" type="number" class="form-control" placeholder="prix" step="0.01"
                       required>
            </div>
            <div class="col">
                <input id="eventIdUser" name="eventIdUser" type="number" class="form-control" placeholder="user id" step="1"
                       required>
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
                <div class="product-header">
                    <h1>{{$event->title}}</h1>
                </div>
                <div class="product-description">
                    <p>{{$event->description}}</p>
                </div>
                <div class="product-price">
                    <p id="price">{{$event->price}}€</p>
                </div>
            </div>

        <!-- CURRENTLY MODIFIED EVENT -->
            <h3>Nouveau : </h3>
            <div class="col-md-3 product-item">
                <div class="product-header">
                    <h1 class="rt-title">{{$event->title}}</h1>
                </div>
                <div class="product-description rt-description">
                    <p>{{$event->description}}</p>
                </div>
                <div class="product-price">
                    <p id="price" class="rt-price">{{$event->price}}€</p>
                </div>
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

        $('#eventPrice').on('keyup keydown change', function () {
            $('.rt-price').text($('#eventPrice').val());
        });
    </script>
@endsection