<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Vvveb">
    <!-- base href="template_users/app/public/themes/default/" -->
    <base href="">
    <link rel="icon" href="../../favicon.ico">

    <title>Boulangerie</title>

    <!-- Bootstrap core CSS -->
    <link href="template_users/css/style.css" rel="stylesheet">
    <!-- link href="template_users/css/bootstrap.css" rel="stylesheet"-->
    <!-- link href="template_users/css/stylesheet.css" rel="stylesheet"-->
</head>

<body>
<div class="page-container">

    <div id="top-nav" class="bg-light smaller-font-size text-muted">
        <nav class="navbar-expand-md container px-3">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{--  <div class="collapse navbar-collapse" id="navbarsExampleDefault">

            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-muted" href="#"><i class="la la-heart"></i> <span class="hidden-xs hidden-sm hidden-md">Wish List (0)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted" href="#"><i class="la la-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Shopping Cart</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted" href="#"><i class="la la-share"></i> <span class="hidden-xs hidden-sm hidden-md">Checkout</span></a>
            </li>
            </ul>

            <ul class="navbar-nav float-right" data-component-currency>
            <li class="nav-item dropdown float-right">
                <a class="nav-link dropdown-toggle text-muted" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-dollar"></i>&ensp;USD</a>

                <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>

            </li>

            <li class="nav-item dropdown float-right" data-component-language>
                <a class="nav-link dropdown-toggle text-muted" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-flag"></i>&ensp;EN</a>

                <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            </ul>
        </div>  --}}

        </nav>
    </div>

    <header class="container mt-5">

    <div class="row">

        <div class="col-md-3">
            <a href="/" class="logo">
                <!-- img src="img/logo.png"-->
                <h1 class="text-dark"><i class="text-secondary la la-home"></i><span>Boulangeri<span class="text-secondary">e.</span></span></h1>
                <small class="text-dark">Boulangerie & Patisserie</small>

            </a>
        </div>

        <div class="col-md-5">

        <form class="">

                <div class="input-group input-group-lg mb-3" id="search-box" data-component-category>
                <input type="text" class="form-control default-font-size" placeholder="Rechercher un produit" aria-label="Rechercher un produit">

                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="la la-search"></i></button>
                </div>
                </div>
        </form>

    </div>

        <div class="col-md-4">

            <div class="dropdown float-right" id="mini-cart" data-component-cart>
            <a class="btn btn-link dropdown-toggle bg-faded p-0 chevron-big" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="la la-shopping-cart d-inline-block" style="font-size:42px"><span class="cart-items" data-total_items>{{ \Cart::getTotalQuantity()}}</span></i>&ensp; <div class="d-inline-block text-dark"><span class="small d-block text-left">Panier</span><span class="font-weight-bold" data-total>{{ \Cart::getTotal() }} Fcfa</span></div>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">

                    @include('partials.cart-drop')

            </div>
            </div>

        @guest
        <div class="dropdown float-right" id="mini-user" data-component-user>
            <a class="btn btn-link dropdown-toggle bg-faded p-0 chevron-big" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="la la-user d-inline-block" style="font-size:42px"></i>&ensp;

                <div class="d-inline-block text-dark" data-if="login">
                    <span class="small d-block text-left">Mon Compte</span>
                    <span class="font-weight-bold">Connexion</span>
                </div>

            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ route('loginForm') }}">Connexion</a>
                <a class="dropdown-item" href="{{ route('registerForm') }}">S&apos;enregistrer</a>
            </div>
        </div>
        @else
        <div class="dropdown float-right" id="mini-user" data-component-user>
            <a class="btn btn-link dropdown-toggle bg-faded p-0 chevron-big" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="la la-user d-inline-block" style="font-size:42px"></i>&ensp;

                <div class="d-inline-block text-dark" data-if="login">
                    <span class="small d-block text-left">Connecté <b style="color: green"><i class="la la-dot-circle-o"></i></b></span>
                    <span class="font-weight-bold">{{ Auth::user()->name }} {{ Auth::user()->prenom }}</span>
                </div>

            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Deconnexion</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        @endguest

        </div>

    </div>


    <nav class="navbar navbar-light bg-white  rounded navbar-expand-md mt-4">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="containerNavbar">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown categories-dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-bars"></i>&ensp;Categories <i class="la la-angle-down float-right"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
               @foreach ($typeProduit as $typeProd)
                    <a class="dropdown-item" href="{{ route('catégorieProduit', [$typeProd->id]) }}">{{ $typeProd->nomTypeProduit }}</a>
               @endforeach
            </div>
            </li>



            <li class="nav-item active">
            <a class="nav-link" href="/">Acceuil <span class="sr-only">(current)</span></a>
            </li>


            <li class="nav-item dropdown dropdown--canvas dropdown--canvas--left dropdown--canvas--sm">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Emplacement du magazin
                </a>
                <div class="dropdown-menu">
                    Hello!
                </div>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="#">Service de livraison</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="#">Nous Contacter</a>
            </li>
        </ul>
        </div>
    </nav>
    </header>

    <div class="content">

        @yield('content')

    </div>

    <footer class="bg-faded text-muted py-5 mt-5">
    <div class="container">
    <div>&#x00A9; Copyright 2020 by Georges Dosseh</div>
    </div>
    </footer>
</div>



    <div class="alert alert-light alert-dismissible fade alert-top" role="alert">
    <div class="container">

        <div class="message">
            Product was added to cart.
        </div>


        <button type="button" class="close"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script -->
    <script src="template_users/js/jquery.min.js"></script>
    <!-- script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script -->
    <script src="template_users/js/popper.min.js"></script>
    <script src="template_users/js/main.js"></script>
    <script src="template_users/js/bootstrap.min.js"></script>
    <script src="template_users/js/owl.carousel.min.js"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            navRewind:true,
            margin:10,
            nav:true,
            dots:false,
            navText: ['<i class="la la-angle-left"></i>','<i class="la la-angle-right"></i> '],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
</body>
</html>



