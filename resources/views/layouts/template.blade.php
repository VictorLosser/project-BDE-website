<?php
use App\User;
use Illuminate\Support\Facades\Auth;
?>

        <!DOCTYPE html>
<html lang="fr">
<head>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{ asset('img/exia-logo.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{asset('css/formLogin.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap-social.css')}}"/>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/formLogin.js')}}"></script>
    <!-- Font-Awesome (CDN) -->
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    @yield('custom_head')
    <title>@yield('title') - eboutique BDE eXia</title>
</head>

<body>

<!--POPUP-->
<div id="popupAll" style="display: none;">
    <div id="popupBackground" style="display: none;"></div>
    <div class="popupFenetre" id="connexionPopup" style="display: none;">
        <div class="croixIcon croixIconPopup"><i class="fas fa-times"></i></div>
        <div id="formulaireInterne">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}" autocomplete="on">
                {{ csrf_field() }}
                <div><p id="popupFenetreTitre">Connexion</p></div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label"><i class="fas fa-at"></i> Adresse e-mail</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                           autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label"><i class="fas fa-key"></i> Mot de passe</label>

                    <div class="">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group" id="divCheckBox">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">
                        Se connecter
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="popupFenetre" id="inscriptionPopup" style="display: none;">
        <div class="croixIcon croixIconPopup"><i class="fas fa-times"></i></div>
        <div id="formulaireInterne">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}" autocomplete="on">
                {{ csrf_field() }}
                <div><p id="popupFenetreTitre">Inscription</p></div>
                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                    <label for="firstname" class="control-label"><i class="far fa-id-card"></i> Prénom</label>

                    <input id="firstname" type="text" class="form-control" name="firstname"
                           value="{{ old('firstname') }}" required autofocus>

                    @if ($errors->has('firstname'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label"><i class="far fa-id-card"></i> Nom</label>

                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                           autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label"><i class="fas fa-at"></i> Adresse e-mail</label>

                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                           required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label"><i class="fas fa-key"></i> Mot de passe</label>

                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="control-label"><i class="fas fa-key"></i> Confirmer votre mot de passe</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-danger">
                        Je m'inscris
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="popupMenuBackground" style="display: none;"></div>
<!--POPUP END-->

<header>
    <nav class="navbar navbar-expand-md" id="the-navbar">
        <a class="navbar-brand" href="./"><img src="{{ asset('img/exia-logo.png') }}"
                                               alt="Accueil - CESI.eXia BDE Strasbourg"
                                               title="Accueil - CESI.eXia BDE Strasbourg"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if (Auth::check())
            @if((Auth::user()->status_id) == 2)
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <div class="navItems">
                            <li class="font-weight-bold" id="nav_home">
                                <a class="nav-link" href="/">
                                    <i class="fas fa-home"></i>
                                    ACCUEIL<span class="sr-only">(current)</span></a>
                            </li>
                        </div>
                        <div class="navItems">
                            <li class="dropdown font-weight-bold" id="nav_gest_produits">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" style="color:#bee5eb">
                                    GESTION EVENEMENTS
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/evenements">Accueil</a>
                                    <a class="dropdown-item" href="/evenement/create">
                                        <i class="fas fa-plus"></i>
                                        Ajouter un événement</a>
                                    <a class="dropdown-item" href="/evenement">
                                        <i class="fas fa-sliders-h"></i>
                                        Modifier ou supprimer un événement</a>
                                </div>
                            </li>
                        </div>
                        <div class="navItems">
                            <li class="dropdown font-weight-bold" id="nav_gest_produits">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" style="color:#bee5eb">
                                    GESTION PRODUITS
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/produits">Accueil</a>
                                    <a class="dropdown-item" href="/produit/create">
                                        <i class="fas fa-plus"></i>
                                        Ajouter un produit</a>
                                    <a class="dropdown-item" href="/produit">
                                        <i class="fas fa-sliders-h"></i>
                                        Modifier ou supprimer un produit</a>
                                </div>
                            </li>
                        </div>
                        <div class="navItems">
                            <li class="dropdown font-weight-bold" id="nav_gest_produits">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" style="color:#bee5eb">
                                    GESTION BOITE A IDEES
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/idees">Accueil</a>
                                    <a class="dropdown-item" href="/idee/create">
                                        <i class="fas fa-plus"></i>
                                        Ajouter une idée</a>
                                    <a class="dropdown-item" href="/idee">
                                        <i class="fas fa-sliders-h"></i>
                                        Modifier ou supprimer une idée</a>
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
            @elseif((Auth::user()))
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <div class="navItems">
                            <li class="font-weight-bold" id="nav_home">
                                <a class="nav-link" href="/">
                                    <i class="fas fa-home"></i>
                                    ACCUEIL<span class="sr-only">(current)</span></a>
                            </li>
                        </div>
                        <div class="navItems">
                            <li class="font-weight-bold" id="nav_produits">
                                <a class="nav-link" href="/produits">PRODUITS</a>
                            </li>
                        </div>
                        <div class="navItems">
                            <li class="dropdown font-weight-bold" id="nav_gest_produits">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" style="color:#bee5eb">
                                    EVENEMENTS
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/evenements">Nos événements</a>
                                    <a class="dropdown-item" href="/idees">Propositions d'événements</a>
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
            @endif
        @else
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <div class="navItems">
                        <li class="font-weight-bold" id="nav_home">
                            <a class="nav-link" href="/">
                                <i class="fas fa-home"></i>
                                ACCUEIL<span class="sr-only">(current)</span></a>
                        </li>
                    </div>
                    <div class="navItems">
                        <li class="font-weight-bold" id="nav_produits">
                            <a class="nav-link" href="/produits">PRODUITS</a>
                        </li>
                    </div>
                    <div class="navItems">
                        <li class="dropdown font-weight-bold" id="nav_gest_produits">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" style="color:#bee5eb">
                                EVENEMENTS
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/evenements">Nos événements</a>
                                <a class="dropdown-item" href="/idees">Propositions d'événements</a>
                            </div>
                        </li>
                    </div>
                </ul>
            </div>
        @endif

        <?php
        $userId = Auth::id();
        $users = User::where('id', '=', $userId)->get();
        ?>

        @if (Auth::check())
            <div id="divBtnProfil" class="dropdown font-weight-bold">

                <a id="btnProfil" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false" style="color:#bee5eb">
                    <i class="fas fa-user-circle"></i>
                    {{ Auth::user()->firstname}} </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/home"><i class="fas fa-id-card"></i> Profil</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="fas fa-sign-out-alt"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <a class="dropdown-item" href="/commande/panier/">
                        <i class="fas fa-shopping-cart"></i>
                        Panier</a>
                </div>
            </div>
        @else
            <div id="btnInsCo">
                <a> <!--href="double-crochets/* url('/register') */double-crochets"-->
                    <button id="btnInscription" class="btn-member btn btn-outline-danger my-2 my-sm-0 eventInscription">
                        <i class="fas fa-user-plus"></i> Inscription
                    </button>
                </a>
                <a><!--href="double-crochets/* url('/login') */double-crochets"-->
                    <button id="btnConnexion" class="btn member btn btn-outline-danger my-2 my-sm-0 eventConnexion">
                        <i class="fas fa-sign-in-alt"></i> Connexion
                    </button>
                </a>
            </div>
        @endif
        <div id="headSandwichIcone" style="display: none;">
            <div id="croixBarre1" class="croixBarres"></div>
            <div id="croixBarre2" class="croixBarres"></div>
            <div id="croixBarre3" class="croixBarres"></div>
        </div>
    </nav>
    <div style="position: relative;">

        <div id="headMenu" style="display: none;">
            <ul>
                Menu<br/><br/>
                @if (Auth::check())
                    @if((Auth::user()->status_id) == 2)
                        <li class="font-weight-bold" id="nav_home">
                            <a class="nav-link" href="/">
                                <i class="fas fa-home"></i>
                                ACCUEIL<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="headMenu_title nav-link font-weight-bold">
                            GESTION EVENEMENTS
                            <div>
                                <p><a class="headMenu_subTitle" href="/evenements">Accueil</a></p>
                                <p><a class="headMenu_subTitle" href="/evenement/create">
                                        <i class="fas fa-plus"></i>
                                        Ajouter un événement</a></p>
                                <p><a class="headMenu_subTitle" href="/evenement">
                                        <i class="fas fa-sliders-h"></i>
                                        Modifier ou supprimer un événement</a>
                                </p>
                            </div>
                        </li>
                        <li class="headMenu_title nav-link font-weight-bold">
                            GESTION PRODUITS
                            <div>
                                <p><a class="headMenu_subTitle" href="/produits">Accueil</a></p>
                                <p><a class="headMenu_subTitle" href="/produit/create">
                                        <i class="fas fa-plus"></i>
                                        Ajouter un produit</a></p>
                                <p><a class="headMenu_subTitle" href="/produit">
                                        <i class="fas fa-sliders-h"></i>
                                        Modifier ou supprimer un produit</a></p>
                            </div>
                        </li>
                        <li class="headMenu_title nav-link font-weight-bold">
                            GESTION BOITE A IDEES
                            <div>
                                <p><a class="headMenu_subTitle" href="/idees">Accueil</a></p>
                                <p><a class="headMenu_subTitle" href="/idee/create">
                                        <i class="fas fa-plus"></i>
                                        Ajouter une idée</a></p>
                                <p><a class="headMenu_subTitle" href="/idee">
                                        <i class="fas fa-sliders-h"></i>
                                        Modifier ou supprimer une idée</a></p>
                            </div>
                        </li>
                    @elseif((Auth::user()))

                        <li class="font-weight-bold" id="nav_home">
                            <a class="headMenu_subTitle" href="/">ACCUEIL<span class="sr-only">(current)</span></a>
                        </li>
                        <li class=" nav-link font-weight-bold">
                            <a class="headMenu_subTitle" href="/produits">PRODUITS</a>
                        </li>
                        <li class=" nav-link font-weight-bold">
                            <a class="headMenu_subTitle" href="/evenements">EVENEMENTS</a>
                        </li>
                        <li class=" nav-link font-weight-bold">
                            <a class="headMenu_subTitle" href="/idees">BOITE A IDEES</a>
                        </li>
                    @endif
                @else
                    <li class="font-weight-bold" id="nav_home">
                        <a class="headMenu_subTitle" href="/">ACCUEIL<span class="sr-only">(current)</span></a>
                    </li>
                    <li class=" nav-link font-weight-bold">
                        <a class="headMenu_subTitle" href="/produits">PRODUITS</a>
                    </li>
                    <li class=" nav-link font-weight-bold">
                        <a class="headMenu_subTitle" href="/evenements">EVENEMENTS</a>
                    </li>
                    <li class=" nav-link font-weight-bold">
                        <a class="headMenu_subTitle" href="/idees">BOITE A IDEES</a>
                    </li>
                    <div id="responsiveBtnInsCo">
                        <a> <!--href="double-crochets/* url('/register') */double-crochets"-->
                            <button id="btnInscription"
                                    class="btn-member btn btn-outline-danger my-2 my-sm-0 eventInscription">
                                Inscription
                            </button>
                        </a>
                        <a><!--href="double-crochets/* url('/login') */double-crochets"-->
                            <button id="btnConnexion"
                                    class="btn member btn btn-outline-danger my-2 my-sm-0 eventConnexion">
                                Connexion
                            </button>
                        </a>
                    </div>
                @endif
            </ul>

</header>

<div id="templateContainer" class="container">
    @yield('content')
</div>


<head>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/hamburgerMenu.css')}}"/>
    <script type="text/javascript" src="{{asset('js/hamburgerMenu.js')}}"></script>
</head>

<footer>
    <a href="https://www.facebook.com/BdeExiaStrasbourg/">
        <i class="fab fa-facebook-square fa-3x"></i>
    </a>
    <a href="https://twitter.com/BdeExiaStrg">
        <i class="fab fa-twitter-square fa-3x"></i>
    </a>
    <a href="https://pbs.twimg.com/media/CupgL0cVIAEujP7.jpg">
        <i class="fab fa-snapchat-square fa-3x"></i>
    </a>
    <a href="https://www.youtube.com/user/BdeExiaStrasbourg">
        <i class="fab fa-youtube-square fa-3x"></i>
    </a>
    <p>BDE CESI.eXia Strasbourg <i class="far fa-copyright"></i> 2018</p>
    <p><a href="/mentions-legales"><i class="fas fa-gavel"></i> MENTIONS LÉGALES</a></p>
</footer>

@yield('scripts')

</body>
</html>

