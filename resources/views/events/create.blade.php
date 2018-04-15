@extends('layouts.template')

@section('title', "Ajouter un événement")

@section('content')

    <?php
        use App\EventsBDE;
        use App\ImageBDE;
    ?>

    <form method="post" action="/evenement" enctype="multipart/form-data">
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
        <div class="row">
            <div class="col">
                <input id="eventDate" name="eventDate" type="date" class="form-control" placeholder="date"
                       value="" required>
            </div>
            <div class="col">
                <input id="eventRecurrence" name="eventRecurrence" type="text" class="form-control"
                       placeholder="récurrence"
                       value="" required>
            </div>
            <div class="col">
                <input id="eventPrice" name="eventPrice" type="number" class="form-control" placeholder="prix"
                       step="0.01"
                       value="" required>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col">
                <input id="eventImg" type="file" accept="image/*" name="eventImg">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input name="eventAlt" type="text" class="form-control" placeholder="Description de l'image" required>
            </div>
        </div>
        <br>
        <br>
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
                <div>
                    <img id="rt-image" src=""
                         style="height: 200px; max-width: 100%;"/>
                </div>
                <div class="event-description">
                    <p class="rt-description"><i>Description</i></p>
                </div>
                <div class="event-date pannelRightAlign">
                    <p class="rt-date"><i>Date</i></p>
                </div>
                <div class="event-recurrence pannelRightAlign">
                    <p class="rt-recurrence"><i>Récurrence</i></p>
                </div>
                <div class="event-price pannelRightAlign">
                    <p id="price" class="rt-price"><i>Prix</i></p>
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

        $('#eventDate').on('change', function () {
            $('.rt-date').text($('#eventDate').val());
        });

        $('#eventRecurrence').on('input', function () {
            $('.rt-recurrence').text($('#eventRecurrence').val());
        });

        $('#eventPrice').on('change keyup keydown', function () {
            $('.rt-price').text($('#eventPrice').val()+"€");
        });

        $('#eventImg').on('change', function (event) {
            var output = document.getElementById('rt-image');
            output.src = URL.createObjectURL(event.target.files[0]);
        });

    </script>
@endsection