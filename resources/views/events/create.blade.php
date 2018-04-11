@extends('layouts.template')

@section('title', "Ajouter un produit")

@section('content')

    <div id="formProduit">
        <form method="post" action="/evenement">
            {{ csrf_field() }}
            <div class="row">
                <div>
                    <input name="eventName" type="text" class="form-control" placeholder="Nom de l'évenement"
                       required>
                </div>
                <div class="col">
                    <textarea name="eventDescription" class="form-control" rows="3" placeholder="description"
                              required></textarea>
                </div>
                <div class="col">
                    <input name="eventDate" type="date" class="form-control" placeholder="date"
                           required>
                </div>
                <div class="col">
                    <input name="eventRecurrence" type="text" class="form-control" placeholder="récurrence"
                           required>
                </div>
                <div class="col">
                    <input name="eventPrice" type="number" class="form-control" placeholder="prix" step="0.01"
                           required>
                </div>
                <div class="col">
                    <input name="eventIdUser" type="number" class="form-control" placeholder="user id" step="1"
                           required>
                </div>
            </div>
            <br>
            <input type="submit"
                   value="ENVOYER"
                   class="btn btn-sm btn-secondary"/>
        </form>
    </div>

    <br>
    <br>

@endsection