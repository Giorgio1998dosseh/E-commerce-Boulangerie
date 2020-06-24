<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TypeProduit;
use App\Produit;
use App\Client;
use App\Commande;
use App\LigneCommande;
use App\Livraison;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=0;
        $Commande= DB::table('commandes')
        ->join('clients', 'commandes.idClient', '=', 'clients.id')
        ->join('livraisons', 'commandes.id', '=', 'livraisons.idCommande')
        ->where('livraisons.etatLivraison', '=', 0)
        ->select('commandes.id', 'commandes.referenceCommande','commandes.dateCommande','commandes.montantCommande',
                'commandes.etatCommande','clients.nom','clients.prenom','clients.telephone','clients.ville',
                'clients.quartier', 'clients.adresse','clients.email', 'livraisons.lieuxLivraison', 'livraisons.dateLivraison',
                'livraisons.villeLivraison', 'livraisons.quartierLivraison')
        ->get();

        return view('boulangerie.commande.listCommande', compact('Commande', 'i'));
    }

    public function commandeLiv()
    {
        $i=0;
        $Commande= DB::table('commandes')
        ->join('clients', 'commandes.idClient', '=', 'clients.id')
        ->join('livraisons', 'commandes.id', '=', 'livraisons.idCommande')
        ->where('livraisons.etatLivraison', '=', 1)
        ->select('commandes.id', 'commandes.referenceCommande','commandes.dateCommande','commandes.montantCommande',
                'commandes.etatCommande','clients.nom','clients.prenom','clients.telephone','clients.ville',
                'clients.quartier', 'clients.adresse','clients.email', 'livraisons.lieuxLivraison', 'livraisons.dateLivraison',
                'livraisons.villeLivraison', 'livraisons.quartierLivraison')
        ->get();

        return view('boulangerie.commande.listCommandeLiv', compact('Commande', 'i'));
    }

    public function details($id)
    {
        $i=0;
        $LigneCommande = DB::table('ligne_commandes')
        ->join('produits', 'ligne_commandes.idProduit', '=', 'produits.id')
        ->where('idCommande', '=', $id)
        ->select('ligne_commandes.id', 'ligne_commandes.quantite', 'produits.designation', 'produits.prix')
        ->get();

        return view('boulangerie.commande.detailsCommande', compact('LigneCommande', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Client = new Client();
        $Commande = new Commande();
        $cartCollection = \Cart::getContent();
        if($request->isMethod('post')){
            $Client->nom = $request->input('Nom');
            $Client->prenom = $request->input('Prenom');
            $Client->email = $request->input('Email');
            $Client->telephone = $request->input('Telephone');
            $Client->quartier = $request->input('Quartier');
            $Client->ville = $request->input('Ville');
            $Client->adresse = $request->input('Adresse');
        }
        $Client->save();

        $Commande->referenceCommande = $request->input('ref');
        $Commande->montantCommande = \Cart::getTotal();
        $Commande->dateCommande = $request->input('dateCommande');
        $Commande->etatCommande = 1;
        $Commande->idClient = $Client->id;
        $Commande->save();

        $Livraison = new Livraison();
        $Livraison->montantLivraison = 1000;
        $Livraison->dateLivraison = $request->input('date');
        $Livraison->villeLivraison = $request->input('ville');
        $Livraison->quartierLivraison = $request->input('quartier');
        $Livraison->lieuxLivraison = $request->input('adresse');
        $Livraison->idCommande = $Commande->id;
        $Livraison->save();

        foreach ($cartCollection as $item) {

            $LigneCommande = new LigneCommande();
            $LigneCommande->quantite = $item->quantity;
            $LigneCommande->idProduit = $item->id;
            $LigneCommande->idCommande = $Commande->id;
            $LigneCommande->save();
        }
        \Cart::clear();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$Commande = Commande::findOrFail($id);
        $Livraison= DB::table('livraisons')
            ->where('livraisons.idCommande', '=', $id)
            ->update(array('etatLivraison' => 1));

        return redirect()->route('listCommande');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
