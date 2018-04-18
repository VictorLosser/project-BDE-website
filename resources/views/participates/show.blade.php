@extends('layouts.template')

@section('title', "Participants à " . $eventID)

@section('content')

    <table class="table table-striped">
        <thead>
        <th>Prénom</th>
        <th>Nom</th>
        </thead>
        <tbody>
        @foreach ($participantsData as $participant)
            <tr>
                <td>{{ $participant->firstname }}</td>
                <td>{{ $participant->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        <a href="{{action('ParticipateController@downloadPDF', $eventID)}}">
            <button type="button" class="btn btn-outline-danger">Télécharger la liste</button>
        </a>
    </div>


@endsection