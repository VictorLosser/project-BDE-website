@extends('layouts.template')

@section('title', "Accueil")

@section('content')

    <div class="container">
        <h1>LES 3 ARTICLES LES PLUS POPULAIRES</h1>
        <section id="carouselid">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="3000">
                <div class="carousel-inner">
                    @foreach ($pop as $key => $value)
                        <div class="carousel-item
                            @if ($loop->first)
                                active
                            @endif
                                ">
                            <h2>#{{ $loop->index+1 }} </h2>
                            <img class="d-block" src="{{asset('storage/'.$products[$key]->images[0]->image_link)}}"
                                 alt="{{ $products[$key]->images[0]->alt }}">
                            <h5>{{ $products[$key]->title }}</h5>
                            <p>{{ $products[$key]->description }}</p>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
    </div>

@endsection