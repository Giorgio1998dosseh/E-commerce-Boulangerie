@extends('layouts.client')
@section('content')

<div class="content">
    <div class="container">
        <div class="thickline"></div>
    </div>
    <nav class="breadcrumb container">
        <a class="breadcrumb-item" href="/index">Accueil</a>
        <span class="breadcrumb-item active">Check-out</span>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12">

<div class="container nicocheckout">

<div>
<div>

    <div class="error"></div>

            <div class="row">
        <div class="col-md-12">
            <h3>Check-out</h3>
        </div>
    </div>

    <div class="row box checkout_form">
        <div class="col-md-6 register_block">

        <form action="{{ route('storeCommande') }}" method="POST">
            {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-md-12">
            <br/>
            <strong class="clearfix">Vos informations personnelles</strong>
            </div>
            <input name="ref" value="{{ $ref_cmd }}" type="hidden">
            <div class="form-group required col-md-6">
                <label class="form-control-label" for="input-payment-firstname">Nom</label>
                <input name="Nom" placeholder="Nom" id="input-payment-firstname" class="form-control" type="text" required>
            </div>
            <div class="form-group required col-md-6">
                <label class="form-control-label" for="input-payment-lastname">Prénom</label>
                <input name="Prenom" placeholder="Prenom" id="input-payment-lastname" class="form-control" type="text" required>
            </div>
            <div class="form-group required col-md-12">
                <label class="form-control-label" for="input-payment-email">Email</label>
                <input name="Email" placeholder="Email" id="input-payment-email" class="form-control" type="text" required>
            </div>
            <div class="form-group required  col-md-6">
                <label class="form-control-label" for="input-payment-telephone">Telephone</label>
                <input name="Telephone" placeholder="Telephone" id="input-payment-telephone" class="form-control" type="text" required>
            </div>
            <div class="form-group col-md-12">
                <br/>
                <strong class="clearfix">Votre adresse</strong>
            </div>
            <div class="form-group required col-md-12">
                <label class="form-control-label" for="input-payment-address-1">Addresse</label>
                <input name="Adresse" placeholder="Adresse" id="input-payment-address-1" class="form-control" type="text" required>
            </div>
            <div class="form-group required col-md-6">
                <label class="form-control-label" for="input-payment-city">Ville</label>
                <input name="Ville" placeholder="Ville" id="input-payment-city" class="form-control" type="text" required>
            </div>
            <div class="form-group required col-md-6">
                <label class="form-control-label" for="input-payment-postcode">Quartier</label>
                <input name="Quartier" placeholder="Quartier" id="input-payment-postcode" class="form-control" type="text" required>
            </div>
            <input type="hidden"  name="dateCommande" value="{{ date("Y-m-d") }}">
            </div>
    </div>
    <div class="col-md-6">
            <br><strong>Détails de livraison</strong><br><br>
        <div class="row">
            <div class="form-group required col-md-6">
                <label class="form-control-label" for="input-payment-firstname">Ville</label>
                <input name="ville" placeholder="Ville" id="input-payment-firstname" class="form-control" type="text" required>
            </div>
            <div class="form-group required col-md-6">
                <label class="form-control-label" for="input-payment-firstname">Quartier</label>
                <input name="quartier" placeholder="Quartier" id="input-payment-firstname" class="form-control" type="text" required>
            </div>
            <div class="form-group required col-md-6">
                <label class="form-control-label" for="input-payment-firstname">Adresse</label>
                <input name="adresse" placeholder="Adresse" id="input-payment-firstname" class="form-control" type="text" required>
            </div>
            <div class="form-group required col-md-6">
                <label class="form-control-label" for="input-payment-firstname">Date</label>
                <input name="date" value="{{ date("Y-m-d") }}" placeholder="Date de livraison" id="input-payment-firstname" class="form-control" type="date" required>
            </div>
        </div>
            <div class="your_order">
                <br><strong>Votre commande</strong><br><br>
                    <table id="cart_table" class="table table-hover table-bordered" data-cart>
                        <thead>
                        <tr>
                            <th class="text-xs-left">Produit</th>
                            <th class="text-xs-right hidden-xs">Quantite</th>
                            <th class="text-xs-right hidden-xs">Prix</th>
                            <th class="text-xs-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartCollection as $item)
                        <tr data-product>
                            <td class="text-xs-left"><a href="{{ route('showProduit', [$item->id]) }}" data-url><span data-name></span>{{ $item->name }}</a>
                            </td>
                            <td class="text-xs-right hidden-xs">{{ $item->quantity }}</td>
                            <td class="text-xs-right hidden-xs">{{ $item->price }} Fcfa</td>
                            <td class="text-xs-right">{{ $item->price * $item->quantity }} Fcfa</td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2" class="text-xs-right hidden-xs-down"><strong>Total:</strong></td>
                            <td colspan="1" class="text-xs-right hidden-sm-up"><strong>Total:</strong></td>
                            <td class="text-xs-right">{{ \Cart::getTotal() }} Fcfa</td>
                        </tr>
                        </tfoot>
                    </table><br>
            </div>
                <div class="payment float-xs-right clearfix">
                    <button  class="btn btn-sm btn-primary">
                        <i class="la la-share"></i> Valider
                    </button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


</div>

</div>

@endsection
