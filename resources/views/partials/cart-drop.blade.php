@if(count(\Cart::getContent()) > 0)
@foreach(\Cart::getContent() as $item)

<table class="table table-sm table-striped" style="width: 400px">
    <tbody>
        <tr>
            <td class="text-center"> <a href="{{ route('showProduit', [$item->id]) }}"><img src="storage/image_produit/{{ $item->attributes->image }}" style="width: 50px; height: 50px;"></a> </td>
            <td style="width: 150px" class="text-left"><a href="{{ route('showProduit', [$item->id]) }}">{{$item->name}}</a>
            </td>
            <td style="width: 50px" class="text-right">X {{$item->quantity}}</td>
            <td style="width: 100px" class="text-right">{{$item->price * $item->quantity}} Fcfa</td>
        </tr>
    </tbody>
</table>

@endforeach

<div>
<table class="table table-sm table-bordered">
    <tbody>
        <tr>
            <td class="text-right"><strong>Total</strong></td>
            <td class="text-right">{{ \Cart::getTotal() }} Fcfa</td>
        </tr>
    </tbody>
</table>
<p class="text-right">
    <a href="{{ route('cart.index') }}"><strong><i class="la la-shopping-cart"></i> Panier</strong></a>
    &nbsp;&nbsp;
    <a href="{{ route('checkout') }}"><strong><i class="la la-share"></i> check-out</strong></a></p>
</div>

@else
    <li class="">Votre panier est vide</li>
@endif
