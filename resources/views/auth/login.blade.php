@extends('layouts.client')
@section('content')


<div class="content">

    <div class="container">
        <div class="thickline"></div>
    </div>

    <nav class="breadcrumb container">
    <a class="breadcrumb-item" href="#">Accueil</a>
    <span class="breadcrumb-item active">Se connecter</span>
    </nav>
<div class="container">
    <div class="row">
            <div class="col-12">
            <h3>S&apos;identifier</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Entrer votre email" required>
                </div>
                </div>
                <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
                <div class="col-sm-6">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Entrer votre mot de passe" required>
                </div>
                </div>

                <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </div>
                </div>
            </form>
            </div>
    </div>


</div>

</div>


@endsection
