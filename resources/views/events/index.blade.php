@extends('layouts.template')

@section('title', "Liste des événements")

@section('custom_head')
    <script src="{{ asset('js/events-ajax.js') }}"></script>
@endsection

@section('content')

    <div table-responsive-md>
        <table class="table table-striped">
            <thead class="thead-light">
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
            <th scope="col">Récurrence</th>
            <th scope="col">Prix</th>
            <th scope="col">Action</th>
            </thead>
            <tbody>

            {{-- UNCOMMENT FOLLOWING CODE FOR A CLASSIC PHP WAY (because currently it's run with AJAX --}}

            {{--
            @foreach($events as $event)
                        <tr>
                            <th>{{ $event->id }}</th>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->date_event }}</td>
                            <td>{{ $event->recurrence }}</td>
                            <td><img src="{{asset('storage/events/'.$event->images[0]->image_link)}}" alt="{{$event->images[0]->alt}}" style="max-height: 100px;" /></td>
                            <td>{{ $event->price }}</td>
                            <td>
                                <div style="max-width: 150px;">
                                    <a href="{{ URL::to('evenement/' . $event->id . '/edit') }}">
                                        <button class="btn btn-info" type="submit" style="width: 100%;">Modifier</button>
                                    </a>
                                    <form action="{{url('evenement', [$event->id])}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger" type="submit" style="width: 100%;">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    --}}
            </tbody>
        </table>
    </div>

@endsection