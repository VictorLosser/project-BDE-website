@extends('layouts.template')

@section('title', "Participants à " . $eventID)

@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>
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
            <button type="button" class="btn btn-outline-danger">
                <i class="fas fa-file-pdf"></i>
                Télécharger la liste (pdf)
            </button>
        </a>
        <a href="{{action('CsvController@downloadCSV', $eventID)}}">
            <button type="button" class="btn btn-outline-danger">
                <i class="fas fa-file-excel"></i>
                Télécharger la liste (csv)
            </button>
        </a>

    </div>


@endsection