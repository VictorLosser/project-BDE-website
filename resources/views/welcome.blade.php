@extends('layouts.template')

@section('title', "Accueil")

@section('content')

    <section id="carouselid">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="3000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block" src="{{ asset('paysages/chateau.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="{{ asset('paysages/thai.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="{{ asset('paysages/urban.jpg') }}" alt="Third slide">
                </div>
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

@endsection