<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    @yield('custom_css')
    <title>@yield('title') - eboutique BDE eXia</title>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" id="the-navbar">
        <a class="navbar-brand" href="home"><img src="{{ asset('img/exia-logo.png') }}" height="50px"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav m-auto">
                <li class="nav-item font-weight-bold" id="nav_home">
                    <a class="nav-link" href="/">ACCUEIL<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item font-weight-bold" id="nav_produits">
                    <a class="nav-link" href="/produits">PRODUITS</a>
                </li>
                <li class="nav-item font-weight-bold" id="nav_evenements">
                    <a class="nav-link" href="/evenements">EVENEMENTS</a>
                </li>
                <?php use App\User;?>
                @if (Auth::check()&& Auth::user()->isauthorized() == 'Bde')
                <li class="nav-item dropdown font-weight-bold" id="nav_gest_produits">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" style="color:#bee5eb">
                        GESTION PRODUITS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/produit/create">Ajouter un produit</a>
                        <a class="dropdown-item" href="/produit">Modifier ou supprimer un produit</a>
                    <li class="nav-item font-weight-bold" id="nav_evenements">
                        <a class="nav-link" href="/idée">Boite à idée</a>
                    </li>
                    </div>
                </li>
                 @else
                    <a class="nav-link" href="/idée">Boite à idée</a>
                 @endif

            </ul>
        </div>

        @if (Auth::check())
                <li class="nav-item dropdown font-weight-bold" id="nav_gest_produits">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" style="color:#bee5eb">
                        {{ Auth::user()->firstname}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/produit/create">Profil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a class="dropdown-item" href="{{ route('logout') }}">Panier</a>
                <li class="nav-item font-weight-bold" id="nav_evenements">
                </li>
                </div>
                </li>
        @else
            <a href="{{ url('/register') }}">
                <button class="btn-member btn btn-outline-success my-2 my-sm-0">Inscription</button>
            </a>
            <a href="{{ url('/login') }}">
                <button class="btn member btn btn-outline-success my-2 my-sm-0">Connexion</button>
            </a>
        @endif
    </nav>
</header>

<div style="margin: 0px;">
    @yield('content')
</div>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@yield('scripts')

</body>
