@extends('layouts.template')

@section('title', "Liste des évenements")

@section('content')

<div table-responsive-md>
    <table class="table table-striped">
        <thead class="thead-light">
        <th scope="col">ID</th>
        <th scope="col">Titre</th>
        <th scope="col">Description</th>
        <th scope="col">Prix</th>
        <th scope="col">Action</th>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <th>{{ $event->event_id }}</th>
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->price }}</td>
                <td>
                    <a href="{{ URL::to('evenement/' . $event->id . '/edit') }}">
                        <button class="btn btn-info" type="submit">Modifier</button>
                    </a>
                    <form action="{{url('evenement', [$event->id])}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection