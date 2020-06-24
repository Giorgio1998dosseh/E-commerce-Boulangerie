@extends('layouts.client')
@section('content')

<div class="content">

    <div class="container">
        <div class="thickline"></div>
    </div>


    <nav class="breadcrumb container">
    <a class="breadcrumb-item" href="#">Catégories</a>
    <span class="breadcrumb-item active">{{ $type->nomTypeProduit }}</span>
    </nav>

<div class="container">

    <div class="row">

        <aside class="col-3">

        <h4>Filtrer par prix</h4>

        </aside>

        <section class="col-9 products" data-products="limit:4 page:0 id:1679,807,786,1597">
            <h3>{{ $type->nomTypeProduit }}</h3>

            <div class="row">
                @foreach ($Produit as $Prod)
                <div class="item" data-product>

                    <article class="product">

                        <a href="{{ route('showProduit', [$Prod->id]) }}" data-url>
                            <img src="storage/image_produit/{{$Prod->image }}" class="img-fluid" data-img>
                        </a>

                        <h3>
                            <a href="{{ route('showProduit', [$Prod->id]) }}" data-product-url data-name data-url>{{$Prod->designation }}</a>
                        </h3>

                        <span class="description" data-product-description>
                            {{$Prod->description }}
                        </span>

                        <div class="price-group">
                            {{--  <div class="old-price">
                                <span class="currency" data-product-currency>$</span> <span data-product-price>385</span>
                            </div>  --}}

                            <div class="price">
                                <span data-product-price>{{$Prod->prix }}</span> <span class="currency" data-product-currency>Fcfa</span>
                            </div>
                        </div>

                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $Prod->id }}" name="id" id="id">
                            <input type="hidden" value="{{ $Prod->designation }}" name="name" id="name">
                            <input type="hidden" value="{{ $Prod->prix }}" name="price" id="price">
                            <input type="hidden" value="{{ $Prod->image }}" name="image" id="image">
                            <input type="hidden" value="1" name="quantity" id="quantity">

                        <div class="btngroup">
                            <button  class="btn btn-sm btn-secondary">
                                <i class="la la-shopping-cart"></i> Ajouter au panier
                            </button>
                        </div>
                        </form>

                    </article><!-- product -->

                </div> <!-- col-md -->
                @endforeach
            </div><!-- row -->


            <ul class="pagination float-right mt-3">
                <li class="page-item">{{$Produit->links() }}</li>
            </ul>

        </section> <!-- products -->



    </div>
</div>

</div>

@endsection
