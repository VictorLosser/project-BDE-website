<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ ltrim(elixir('css/bootstrap.min.css'), '/') }}"/>
    <title></title>
</head>
<body>
<h1 style="text-align: center;">Liste des participants à l'évènement : <br> {{ $eventData->title }}</h1>
<br>
<table class="table table-bordered">
    <tr style="font-weight: bold;">
        <td>Prénom</td>
        <td>Nom</td>
    </tr>
    @foreach ($participantsData as $participant)
        <tr>
            <td>{{ $participant->firstname }}</td>
            <td>{{ $participant->name }}</td>
        </tr>
    @endforeach
</table>
</body>