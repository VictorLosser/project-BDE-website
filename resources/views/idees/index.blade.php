@extends('layouts.template')

@section('title', "Gestion des idées")

@section('custom_head')
    <script src="{{ asset('/js/ideas-index.js') }}"></script>
@endsection

@section('content')

    <div table-responsive-md>
        <table class="table table-striped">
            <thead class="thead-light">
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </thead>
            <tbody>

            {{-- UNCOMMENT FOLLOWING CODE FOR A CLASSIC PHP WAY (because currently it's run with AJAX --}}

            {{--
                    @foreach($idees as $idee)
                        <tr>
                            <th>{{ $idee->id }}</th>
                            <td>{{ $idee->title }}</td>
                            <td>{{ $idee->description }}</td>
                            <td>
                                <div style="max-width: 150px;">
                                    <a href="{{ URL::to('idee/' . $idee->id . '/edit') }}">
                                        <button class="btn btn-info" type="submit" style="width: 100%;">Modifier</button>
                                    </a>
                                    <form action="{{url('idee', [$idee->id])}}" method="post">
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