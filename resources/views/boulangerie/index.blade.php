@extends('layouts.client')
@section('content')

<div id="slider" class="carousel slide slider">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
        <img src="template_users/img/4.jpg" class="first-slide bg-light">
        <div class="">
            <div class="carousel-caption d-none d-md-block text-left container">
            <div class="caption-text float-left col-md-4">
                <h1 class="font-weight-bold">Cookie.</h1>
                <p class="font-weight-normal pb-4">Cookie moelleux aux pépites de <br/> chocolat.</p>
                <p><a class="btn btn-md btn-outline-primary font-weight-bold px-5 py-2" href="#" role="button">Acheter maintenant<i class="la la-arrow-right"></i></a></p>
            </div>
            <img src="template_users/img/cookie.png" class="float-right col-md-8">
            </div>
        </div>
        </div>

        <div class="carousel-item">
        <img class="second-slide bg-light" alt="Second slide">
        <div class="">
            <div class="carousel-caption d-none d-md-block container">
            <h1>Another example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
        </div>
        </div>

        <div class="carousel-item">
        <img class="third-slide bg-light" alt="Third slide">
        <div class="">
            <div class="carousel-caption d-none d-md-block text-right container">
            <h1>One more for good measure.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
        </div>
        </div>

    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>

    {{--  <div class="container mb-5">
        <div class="row">
            <div class="col-md-4 banner p">
                <a href="">
                    <img class="img-fluid" src="template_users/img/cookie.png" alt="">
                </a>
            </div>
            <div class="col-md-4 banner">
                <a href="">
                    <img class="img-fluid" src="template_users/img/cookie.png" alt="">
                </a>
            </div>
            <div class="col-md-4 banner">
                <a href="">
                    <img class="img-fluid" src="template_users/img/cookie.png" alt="">
                </a>
            </div>
        </div>
    </div>  --}}


<div class="container products-tab-carousel">

    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Nos products</a>
        {{--  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Produit populaire</a>  --}}
    </div>

    </nav>
    <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


    <section class="container products clearfix" data-component-products="limit:4 page:0 id:1679,807,786,1597" data-products='{"1": "Mac pro", "2":"Ipod"}'>

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




{{--  <section id="parallax_1" class="module parallax white mb-3">
<div>
<div class="container">
<h3>Croissant au chocolat</h3> <p>Kale chips wolf banh mi, Tumblr polaroid Truffaut semiotics Echo Park<br> listicle sustainable meditation cold-pressed deep v twee keytar</p> <a href="/index.php?route=product/category&amp;path=20" class="btn btn-default">Acheter maintenant!</a> </div>
</div>
</section>  --}}


<div class="container products-tab-carousel">

    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"></a>
    </div>

    </nav>
    <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


    <section class="container products clearfix" data-component-products="limit:4 page:0 id:1679,807,786,1597">

        <div class="owl-carousel owl-theme">

            @foreach ($Produits as $Prod)

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
                            <button  class="btn btn-sm btn-secondary" title="Add to Cart" {{--  data-product-cart-url data-vvveb-action="addCart"  --}} >
                                <i class="la la-shopping-cart"></i> Ajouter au panier
                            </button>
                        </div>
                        </form>

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

@endsection
