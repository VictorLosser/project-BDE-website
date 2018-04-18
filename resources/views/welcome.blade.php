@extends('layouts.template')

@section('title', "Accueil")

@section('content')

    <h2 class="welcome-title"><i class="fab fa-hotjar"></i> LES 3 ARTICLES LES PLUS POPULAIRES <i class="fab fa-hotjar"></i></h2>
    <section id="carouselid">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
                @foreach ($pop as $product)
                    <div class="carousel-item
                            @if ($loop->first)
                            active
@endif
                            ">
                        <a href="/produit/{{ $product->product_id }}" style="text-decoration: none; color:rgb(240, 0, 0)">
                            <h2><i class="fas fa-hashtag"></i> {{ $loop->index+1 }}</h2>
                            <img class="d-block" src="{{asset('storage/'.$product->image_link)}}"
                                 alt="{{ $product->alt }}">
                            <h5>{{ $product->title }}</h5>
                            <p>{{ $product->description }}</p>
                        </a>
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

@endsection