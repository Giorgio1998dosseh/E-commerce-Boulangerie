@extends('layouts.client')
@section('content')


<div class="content">

    <div class="container">
        <div class="thickline"></div>
    </div>

    <nav class="breadcrumb container">
    <a class="breadcrumb-item" href="#">Accueil</a>
    <span class="breadcrumb-item active">S&apos;enregistrer</span>
    </nav>
<div class="container">
    <div class="row">
            <div class="col-12 ">
            <h3>Nouveau compte</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nom">
                </div>
                </div>
                <div class="form-group row">
                <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
                <div class="col-sm-6">
                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prenom">
                </div>
                </div>
                <div class="form-group row">
                <label for="telephone" class="col-sm-2 col-form-label">Telephone</label>
                <div class="col-sm-6">
                    <input type="text" name="telephone" class="form-control" id="Telephone" placeholder="Telephone">
                </div>
                </div>
                <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" name="email" class="form-control" id="inputEmail2" placeholder="Email">
                </div>
                </div>
                <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
                <div class="col-sm-6">
                    <input type="password"  name="password"  class="form-control" id="password" placeholder="Mot de passe">
                </div>
                </div>
                <div class="form-group row">
                <label for="password-confirm" class="col-sm-2 col-form-label">Confirmation mot de passe</label>
                <div class="col-sm-6">
                    <input type="password"  name="password_confirmation" class="form-control" id="password-confirm" placeholder="Mot de passe">
                </div>
                </div>

                <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Creer un compte</button>
                </div>
                </div>
            </form>
            </div>
    </div>


</div>

</div>


@endsection
