@extends('layouts.admin')
@section('content')

<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Liste des produits</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">GESPROCOM</a></li>
            <li class="breadcrumb-item">Produits</a></li>
            <li class="breadcrumb-item active">Liste</li>
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

    <div class="card card-secondary card-outline ">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div style="margin-bottom: 25px">
                <a href="{{route('addProduit')}}" class="btn btn-primary">Ajouter un produit</a>
                <button class="btn btn-secondary"><i class="fa fa-print"></i> Imprimer</button>
            </div>
            <div class="col-12 table-responsive">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th style="text-align: center">#</th>
                    <th>Image</th>
                    <th>Reference</th>
                    <th>Nom</th>
                    <th>Prix (Fcfa)</th>
                    <th>Type</th>
                    <th>Modif.</th>
                    <th>Supp.</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($Produit as $prod)
                <tr>
                        <td style="width: 50px; text-align: center">{{$i=$i+1 }}</td>
                        <td align="center"><img src="storage/image_produit/{{$prod->image }}" style="width: 50px; height: 50px;"></td>
                        <td>{{$prod->reference }}</td>
                        <td>{{$prod->designation }}</td>
                        <td>{{$prod->prix}}</td>
                        <td>{{$prod->nomTypeProduit }}</td>
                        <td style="width: 100px" align="center">
                            <a data-toggle="modal" data-target="#editModal{{ $prod->id }}" class="btn btn-warning" ><i class="nav-icon fa fa-edit"></i></a>
                        </td>
                        <td style="width: 100px" align="center">
                            <a data-toggle="modal" data-target="#deleteModal{{ $prod->id }}" class="btn btn-danger" ><i class="nav-icon fa fa-trash"></i></a>
                        </td>
                </tr>
                 <!-- Modal de modification-->
                    <div class="modal fade" id="editModal{{ $prod->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Modifier un produit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                            <form role="form" method="POST" action="{{ route('updateProduit', [$prod->id]) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <label >Reference</label>
                                            <input type="text" name="refProduit" class="form-control" value="{{ $prod->reference }}">
                                        </div>
                                        <div class="col-6" >
                                            <label >Nom</label>
                                            <input type="text" name="nomProduit" class="form-control" value="{{ $prod->designation }}">
                                        </div>
                                        <div class="col-6" style="margin-top: 25px">
                                            <label >Prix</label>
                                            <input type="text" name="prixProduit" class="form-control" value="{{ $prod->prix }}">
                                        </div>
                                        <div class="col-6" style="margin-top: 25px">
                                            <label >Type</label>
                                            <select class="form-control select2" name="typeProduit" style="width: 100%;">
                                                <option value="" disabled selected value>Choisir le type</option>
                                                @foreach ($typeProduit as $typeProd)
                                                    <option value="{{$typeProd->id}}"
                                                        @if ($typeProd->id == $prod->idTypeProduit)
                                                            selected
                                                        @endif>
                                                        {{$typeProd->nomTypeProduit}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6" style="margin-top: 25px">
                                            <label >Image</label>
                                            <input type="file" name="imageProduit" class="form-control">
                                        </div>
                                        <div class="col-6" style="margin-top: 25px">
                                            <label >Description</label>
                                            <textarea rows="3" type="text" name="descriptionProduit" class="form-control" >{{ $prod->designation }}</textarea>
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

                    <!-- Modal de modification -->
                    <div id="deleteModal{{ $prod->id }}" class="modal fade">
                        <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="icon-box">

                                    </div>
                                    <h4 class="modal-title" style="font-family: Open Sans;"><strong>Confirmation</strong> </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p style="font-family: Open Sans;">Êtes-vous sûr de vouloir supprimer ce produit?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <a href="{{ route('deleteProduit', [$prod->id]) }}" class="btn btn-danger" >Supprimer</a>
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
