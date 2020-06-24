@extends('layouts.client')
@section('content')

<div class="content">

    <div class="container">
        <div class="thickline"></div>
    </div>

    <nav class="breadcrumb container">
    <a class="breadcrumb-item" href="#">Accueil</a>
    <span class="breadcrumb-item active">Panier </span>
    </nav>

    <div class="container">

    @if(count(\Cart::getContent()) > 0)
        <div class="row">
                <div class="col-12">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-bordered" data-cart>
                        <thead>
                            <tr>
                                <td class="text-center">Image</td>
                                <td class="text-left">Produit</td>
                                <td class="text-left">Quantité</td>
                                <td class="text-right">Prix</td>
                                <td class="text-right">Total</td>
                                <td class="text-right">Supp.</td>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($cartCollection as $item)

                            <tr>
                                <td class="text-center">
                                    <a href="{{ route('showProduit', [$item->id]) }}"><img src="storage/image_produit/{{ $item->attributes->image }}" style="width: 50px; height: 50px;"></a>
                                </td>
                                <td class="text-left"><a href="{{ route('showProduit', [$item->id]) }}">{{ $item->name }}</a>
                                    <span class="text-danger">*****</span>
                                    <br>
                                </td>
                                <td class="text-left">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="input-group btn-block" style="max-width: 200px;">
                                        <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                        <input type="number" name="quantity" id="quantity" value="{{ $item->quantity }}" size="1" class="form-control">
                                        <span class="input-group-btn">
                                    <button class="btn btn-primary"><i class="la la-refresh"></i></button>
                                    </div>
                                </form>
                                </td>
                                <td class="text-right">{{ $item->price}} Fcfa</td>
                                <td class="text-right">{{ $item->quantity * $item->price}} Fcfa</td>
                                <td class="" style="width: 50px">
                                    <form action="{{ route('cart.remove') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="input-group btn-block" style="max-width: 200px;">
                                            <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                        <button class="btn btn-danger"><i class="la la-times"></i></button>
                                        {{--  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="cart.remove('YToxOntzOjEwOiJwcm9kdWN0X2lkIjtpOjQzO30=');" data-original-title="Remove"><i class="la la-times-circle"></i></button></span>  --}}
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
            <table>
            <div class="btngroup">
                <td>
                    <li class="list-group-item"><b>Total: </b>{{ \Cart::getTotal() }} Fcfa</li>
                </td>
                <td>
                <form action="{{ route('cart.clear') }}" method="POST">
                    {{ csrf_field() }}
                    <button  class="btn btn-sm btn-secondary">
                        <i class="la la-trash"></i> Vider le panier
                    </button>
                </form>
            </td>
            <td>
                <form action="#">
                    <a  class="btn btn-sm btn-primary" href="{{ route('checkout') }}">
                        <i class="la la-share"></i> Check-out
                    </button>
                </form>
            </td>
            </div>
            </table>
                </div>
        </div>
    @else
        <p class="text-center">Votre panier est vide!</p>
    @endif

</div>

</div>

@endsection
