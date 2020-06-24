@extends('layouts.admin')
@section('content')

<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Liste des commandes</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">GESPROCOM</a></li>
            <li class="breadcrumb-item">Commandes</a></li>
            <li class="breadcrumb-item active">En attente</li>
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
                <button class="btn btn-secondary"><i class="fa fa-print"></i> Imprimer</button>
            </div>
            <div class="col-12 table-responsive">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th style="text-align: center">#</th>
                    <th>Reference</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Etat</th>
                    <th>Client</th>
                    <th>Détails</th>
                    <th>Livr.</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($Commande as $commandes)
                <tr>
                        <td style="width: 50px; text-align: center">{{$i=$i+1 }}</td>
                        <td>{{$commandes->referenceCommande }}</td>
                        <td>{{$commandes->montantCommande }} Fcfa</td>
                        <td>{{\Carbon\Carbon::parse($commandes->dateCommande)->format('d/m/Y') }}</td>
                        <td>
                            @if ($commandes->etatCommande ==1)
                                Payer
                            @else
                                Non payer
                            @endif

                        </td>
                        <td><a data-toggle="modal" href="" data-target="#clientModal{{ $commandes->id }}">{{$commandes->nom }} {{$commandes->prenom }}</a></td>

                        <td style="width: 100px" align="center">
                            <a href="{{ route('detailsCommande',[$commandes->id]) }}" class="btn btn-info" ><i class="nav-icon fa fa-info-circle"></i></a>
                        </td>
                        <td style="width: 100px" align="center">
                            <a data-toggle="modal" href="" data-target="#livraisonModal{{ $commandes->id }}" class="btn btn-success" ><i class="nav-icon fa fa-truck"></i></a>
                        </td>
                </tr>

                <!-- Modal de modification -->
                <div class="modal fade" id="clientModal{{ $commandes->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Informations du client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <b>Nom:</b>  {{$commandes->nom }}<br><br>
                            <b>Prenom:</b>  {{$commandes->prenom }}<br><br>
                            <b>Telephone:</b>  {{$commandes->telephone }}<br><br>
                            <b>Email:</b>  {{$commandes->email }}<br><br>
                            <b>Ville:</b>  {{$commandes->ville }}<br><br>
                            <b>Quartier:</b>  {{$commandes->quartier }}<br><br>
                            <b>Adresse:</b>  {{$commandes->adresse }}<br>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Modal de modification -->
                <div class="modal fade" id="livraisonModal{{ $commandes->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Détails livraison</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <b>Date:</b> {{\Carbon\Carbon::parse($commandes->dateLivraison)->format('d/m/Y') }}<br><br>
                        <b>Ville:</b>  {{$commandes->villeLivraison }}<br><br>
                        <b>Quartier:</b>  {{$commandes->quartierLivraison }}<br><br>
                        <b>Adresse:</b>  {{$commandes->lieuxLivraison }}<br>
                    </div>
                    <div class="card-footer">
                        <form role="form" method="POST" action="{{ route('livrerCommande', [$commandes->id]) }}">
                            {{ csrf_field() }}
                            <button class="btn btn-primary" >Livrer</button>
                        </form>
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
