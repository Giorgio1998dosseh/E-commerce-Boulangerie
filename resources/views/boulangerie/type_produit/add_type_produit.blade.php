@extends('layouts.admin')
@section('content')

<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Ajouter un type de produit</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">E-BOULANGERIE</a></li>
            <li class="breadcrumb-item">Type de Produit</a></li>
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
    <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('storeTypeProduit') }}">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <label >Nom</label>
                    <input type="text" name="nomTypeProduit" class="form-control" placeholder="Entrer le nom du type de produit" required>
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

    <div class="card card-secondary card-outline ">
    <div class="card-header">
    </div>
    <div class="card-body">
        <div class="col-12 table-responsive">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="text-align: center">#</th>
                <th>Nom </th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($typeProduit as $typeProd )
            <tr>
                    <td style="width: 50px; text-align: center">{{  $i= $i+1 }}</td>
                    <td>{{ $typeProd->nomTypeProduit }}</td>
                    <td style="width: 100px" align="center">
                        <a data-toggle="modal" data-target="#editTypeModal{{ $typeProd->id }}" class="btn btn-warning" ><i class="nav-icon fa fa-edit"></i></a>
                    </td>
                    <td style="width: 100px" align="center">
                        <a data-toggle="modal" data-target="#deleteTypeModal{{ $typeProd->id }}" class="btn btn-danger" ><i class="nav-icon fa fa-trash"></i></a>
                    </td>
            </tr>

            <!-- Modal de modification -->
                <div class="modal fade" id="editTypeModal{{ $typeProd->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modifier un type de produit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                        <form role="form" method="POST" action="{{ route('updateTypeProduit', [$typeProd->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col-12">
                                        <label >Nom</label>
                                        <input type="text" name="nomTypeProduit" value="{{ $typeProd->nomTypeProduit }}" class="form-control" placeholder="Entrer le nom du type de produit" required>
                                    </div>
                                </div>
                            </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                        <button class="btn btn-primary">Enregistrer</button>
                    </div>
                        </form>

                    </div>
                </div>
                </div>

                <!-- Modal de suppression -->
                <div id="deleteTypeModal{{ $typeProd->id }}" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="icon-box">

                                </div>
                                <h4 class="modal-title" style="font-family: Open Sans;"><strong>Confirmation</strong> </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p style="font-family: Open Sans;">Êtes-vous sûr de vouloir supprimer ce type de produit?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <a href="{{ route('deleteTypeProduit', [$typeProd->id]) }}" class="btn btn-danger" >Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </tbody>
        </table>
        </div>

    </div>

</div>

@endsection
