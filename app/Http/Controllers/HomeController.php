<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TypeProduit;
use App\Produit;
use App\User;

use function PHPSTORM_META\type;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $typeProduit = TypeProduit::All(['id','nomTypeProduit']);
        return view('home', compact('typeProduit'));
    }
    public function users()
    {
        $i=0;
        $Users = User::All();
        return view('boulangerie.users.listUser', compact('Users', 'i'));
    }

    public function home()
    {
        $typeProduit = TypeProduit::All(['id','nomTypeProduit']);
        $Produit = DB::table('produits')
            ->orderBy('designation')
            ->paginate(8);
        $Produits = DB::table('produits')
            ->orderByDesc('designation')
            ->get();
        return view('boulangerie.index',compact('typeProduit', 'Produit', 'Produits'));
    }

    public function showLoginForm()
    {
        $typeProduit = TypeProduit::All(['id','nomTypeProduit']);

        return view('auth.login', compact('typeProduit'));
    }

    public function showRegisterForm()
    {
        $typeProduit = TypeProduit::All(['id','nomTypeProduit']);

        return view('auth.register', compact('typeProduit'));
    }
}
