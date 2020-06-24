@extends('layouts.admin')
@section('content')

<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Ajouter un de produit</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">E-BOULANGERIE</a></li>
            <li class="breadcrumb-item">Produits</a></li>
            <li class="breadcrumb-item active">Ajouter</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    @if (session()->has('success_message'))
            <div class="col-md-10">
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>{{ session()->get('success_message') }}</h4>
            </div>
            </div>
    @endif

    <div class="card card-success card-outline">
        <div class="card-header">
        </div>
    <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('storeProduit') }}">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <label >Reference</label>
                    <input type="text" name="refProduit" class="form-control" placeholder="Entrer la référence du produit" required>
                </div>
                <div class="col-4">
                    <label >Nom</label>
                    <input type="text" name="nomProduit" class="form-control" placeholder="Entrer le nom du produit" required>
                </div>
                <div class="col-4">
                    <label >Prix</label>
                    <input type="text" name="prixProduit" class="form-control" placeholder="Entrer le prix du produit" required>
                </div>
                <div class="col-4" style="margin-top: 25px">
                    <label >Type</label>
                    <select class="form-control select2" name="typeProduit" style="width: 100%;">
                        <option value="" disabled selected value>Choisir le type</option>
                        @foreach ($typeProduit as $typeProd)
                            <option value="{{$typeProd->id}}">{{$typeProd->nomTypeProduit}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4" style="margin-top: 25px">
                    <label >Image</label>
                    <input type="file" name="imageProduit" class="form-control" required>
                </div>
                <div class="col-4" style="margin-top: 25px">
                    <label >Description</label>
                    <textarea rows="3" name="descriptionProduit" class="form-control" required></textarea>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href=""  class="btn btn-danger">Annuler</a>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
    </div>
        <!-- /.card -->

</div>

@endsection
