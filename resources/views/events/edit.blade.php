@extends('layouts.template')

@section('title', "Modifier un événement")

@section('content')

    <form method="post" action="{{url('evenement', [$event->id])}}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="PUT">

        <div class="row">
            <div>
                <input id="eventName" name="eventName" type="text" class="form-control" placeholder="Nom de l'évenement"
                       value="{{$event->title}}" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                    <textarea id="eventDescription" name="eventDescription" class="form-control" rows="3"
                              placeholder="description"
                              required>{{$event->description}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input id="eventDate" name="eventDate" type="datetime-local" class="form-control" placeholder="date"
                       value="{{$event->date_event}}" required>
            </div>
            <div class="col">
                <input id="eventRecurrence" name="eventRecurrence" type="number" class="form-control"
                       placeholder="Récurrence (ex: 7 -> événement hebdo)"
                       step="1"
                       value="{{$event->repeat_interval}}" required>
            </div>
            <div class="col">
                <input id="eventPrice" name="eventPrice" type="number" class="form-control" placeholder="prix"
                       step="0.01"
                       value="{{$event->price}}" required>
            </div>
        </div>
        <br/>
        <br/>
        <label><input id="changeImg" type="checkbox" name="changeImg" value="">Changer d'image ?</label>
        <div id="divImgUpload" style="display: none;">
            <div class="row">
                <div class="col">
                    <input id="eventImg" type="file" name="eventImg">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input name="eventAlt" type="text" class="form-control" placeholder="Description de l'image">
                </div>
            </div>
        </div>
        <br>
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
                    <h1>{{$event->title}}</h1>
                </div>
                <div>
                    <img src="{{asset('storage/'.$event->images[0]->image_link)}}"
                         alt="{{$event->images[0]->alt}}"
                         style="height: 200px; max-width: 100%;"/>
                </div>
                <div class="event-description">
                    <p>{{$event->description}}</p>
                </div>
                <div class="event-date pannelRightAlign">
                    <p>{{$event->date_event}}</p>
                </div>
                <div class="event-recurrence pannelRightAlign">
                    <p>{{$event->repeat_interval}}</p>
                </div>
                <div class="event-price pannelRightAlign">
                    <p id="price">{{$event->price}}€</p>
                </div>
            </div>

            <!-- CURRENTLY MODIFIED EVENT -->
            <?php $imgMorphLink = $event->images[0]->image_link; ?>
            <h3>Nouveau : </h3>
            <div class="col-md-3 product-item">
                <div class="event-header">
                    <h1 class="rt-title">{{$event->title}}</h1>
                </div>
                <div>
                    <img id="rt-image" src="{{asset('storage/'.$imgMorphLink)}}"
                         alt="{{$event->images[0]->alt}}" style="height: 200px; max-width: 100%;"/>
                </div>
                <div class="event-description">
                    <p class="rt-description">{{$event->description}}</p>
                </div>
                <div class="event-date pannelRightAlign">
                    <p class="rt-date">{{$event->date_event}}</p>
                </div>
                <div class="event-recurrence pannelRightAlign">
                    <p class="rt-recurrence">{{$event->repeat_interval}}</p>
                </div>
                <div class="event-price pannelRightAlign">
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

        $('#eventDate').on('change keyup keydown', function () {
            $('.rt-date').text($('#eventDate').val());
        });

        $('#eventRecurrence').on('input', function () {
            $('.rt-recurrence').text($('#eventRecurrence').val());
        });

        $('#eventPrice').on('change keyup keydown', function () {
            $('.rt-price').text($('#eventPrice').val() + "€");
        });

        $('#changeImg').on('change', function () {
            if (this.checked) {
                $('#divImgUpload').slideDown();
            }
            else {
                $('#divImgUpload').slideUp();
            }
        });

        $('#eventImg').on('change', function (event) {
            var output = document.getElementById('rt-image');
            output.src = URL.createObjectURL(event.target.files[0]);
        });

    </script>
@endsection