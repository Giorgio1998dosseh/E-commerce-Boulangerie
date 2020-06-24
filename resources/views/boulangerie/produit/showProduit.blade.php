@extends('layouts.client')
@section('content')

<div class="content">

    <div class="container">
        <div class="thickline"></div>
    </div>


    <nav class="breadcrumb container">
    <a class="breadcrumb-item" href="/index">Acceuil</a>
    <span class="breadcrumb-item active">Produit</span>
    </nav>



    <article class="product-details container" data-component-product>

        <div class="row">

            <!-- gallery and tabs column -->

            <div class="col-md-8">

                <div class="zoom-gallery row">

                <div class="col-md-10">
                    <a href="#"><img src="storage/image_produit/{{$Prod->image }}" class="img-fluid" data-image></a>
                </div>

                </div>


            </div>

            <!-- product name and add to cart -->

            <div class="col-md-4">
                <h1 class="product-heading" data-name>{{$Prod->designation }}</h1>

                <!-- product attributes -->
                <ul class="list-unstyled text-muted">
                <li>Type de produit: <span>{{$Prod->nomTypeProduit }}</span></li>
                <li>Stock: <span>Disponible</span></li>
                </ul>

                <div class="price h3">
                    <span data-price>{{$Prod->prix }}</span> <span class="currency" data-currency>Fcfa</span>
                </div>

                <hr>
                <form action="{{ route('cart.store') }}" method="POST">
                    {{ csrf_field() }}
                <div class="form-group row">
                    <label for="productQuantity" class="col-form-label col-3">Quantité</label>
                    <input id="quantity" class="col-5 form-control" type="number" name="quantity" min="1" max="5">
                </div>
                    <input type="hidden" value="{{ $Prod->id }}" name="id" id="id">
                    <input type="hidden" value="{{ $Prod->designation }}" name="name" id="name">
                    <input type="hidden" value="{{ $Prod->prix }}" name="price" id="price">
                    <input type="hidden" value="{{ $Prod->image }}" name="image" id="image">

                    <button class="btn btn-primary btn-block btn-icon">
                        <i class="la la-cart-plus"></i> Ajouter au panier
                    </button><br>
                </form>

                <button type="button" class="btn btn-outline-secondary btn-block  btn-icon">
                    <i class="la la-shopping-cart"></i> Acheter maintenant
                </button>

            </div>

        </div>


        <div class="product-tabs clearfix" role="tabpanel">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Description</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div role="tabpanel" class="tab-pane fade active show" id="home" aria-labelledby="home-tab" aria-expanded="true" data-description>
                <p>{{$Prod->description }}</p>
                </div>
            </div>
        </div>


    </article><!-- product-details -->



<div class="container products-tab-carousel">

    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Produits similaire</a>
    </div>

    </nav>
    <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


    <section class="container products clearfix" data-component-products="limit:4 page:0 id:1679,807,786,1597">

        <div class="owl-carousel owl-theme">

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


                        <div class="btngroup">

                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $Prod->id }}" name="id" id="id">
                                <input type="hidden" value="{{ $Prod->designation }}" name="name" id="name">
                                <input type="hidden" value="{{ $Prod->prix }}" name="price" id="price">
                                <input type="hidden" value="{{ $Prod->image }}" name="image" id="image">
                                <input type="hidden" value="1" name="quantity" id="quantity">

                            <div class="btngroup">
                                <button  class="btn btn-sm btn-secondary" title="Add to Cart">
                                    <i class="la la-shopping-cart"></i> Ajouter au panier
                                </button>
                            </div>
                            </form>

                        </div>

                    </article><!-- product -->

                </div> <!-- col-md -->

            @endforeach

        </div><!-- row -->
    </section> <!-- products -->


    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

    </div>

    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

    </div>
    </div>

</div>


</div>

@endsection
