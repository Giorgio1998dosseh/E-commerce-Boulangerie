<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TypeProduit;
use App\Produit;
use App\Commande;


class PanierController extends Controller
{

    public function shop()
    {
        $typeProduit = TypeProduit::All(['id','nomTypeProduit']);
        $Produit = Produit::all();
        //dd($products);
        return view('boulangerie.index', compact('typeProduit', 'Produit'));
    }

    public function cart()
    {
        $typeProduit = TypeProduit::All(['id','nomTypeProduit']);
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('boulangerie.panier.cart', compact('typeProduit','cartCollection'));
    }

    public function add(Request$request){

        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'slug' => "errrrr"
            )
        ));
        return redirect()->route('index')->with('success_msg', 'Item is Added to Cart!');
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function update(Request $request)
    {
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

    public function checkout()
    {
        $typeProduit = TypeProduit::All(['id','nomTypeProduit']);
        $cartCollection = \Cart::getContent();
        $ref_cmd = Commande::count();

       return view('boulangerie.commande.checkout', compact('typeProduit', 'cartCollection', 'ref_cmd'));
    }


}
