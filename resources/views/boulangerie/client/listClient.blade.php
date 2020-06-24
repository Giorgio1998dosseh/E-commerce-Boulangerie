@extends('layouts.admin')
@section('content')

<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Liste des clients</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">GESPROCOM</a></li>
            <li class="breadcrumb-item">Clients</a></li>
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
                <button class="btn btn-secondary"><i class="fa fa-print"></i> Imprimer</button>
            </div>
            <div class="col-12 table-responsive">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th style="text-align: center">#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Ville</th>
                    <th>Quartier</th>
                    <th>Adresse</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($Client as $clients)
                <tr>
                        <td style="width: 50px; text-align: center">{{$i=$i+1 }}</td>
                        <td>{{ $clients->nom }}</td>
                        <td>{{ $clients->prenom }}</td>
                        <td>{{ $clients->telephone }}</td>
                        <td>{{ $clients->email }}</td>
                        <td>{{ $clients->ville }}</td>
                        <td>{{ $clients->quartier }}</td>
                        <td>{{ $clients->adresse }}</td>
                </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        </div>

</div>

@endsection
