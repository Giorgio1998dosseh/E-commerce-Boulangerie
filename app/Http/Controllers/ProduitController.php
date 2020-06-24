<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TypeProduit;
use App\Produit;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeProduit = TypeProduit::All(['id','nomTypeProduit']);
        $i=0;
        $Produit = DB::table('produits')
        ->join('type_produits', 'produits.idTypeProduit', '=', 'type_produits.id')
        ->select('produits.id', 'produits.reference', 'produits.idTypeProduit', 'produits.designation', 'produits.description', 'produits.prix', 'produits.image', 'type_produits.nomTypeProduit')
        ->get();


        return view('boulangerie.produit.listProduit', compact('Produit', 'i', 'typeProduit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeProduit = TypeProduit::All(['id','nomTypeProduit']);

        return view('boulangerie.produit.addProduit', compact('typeProduit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Produit = new Produit();

        if($request->isMethod('post')){
            $Produit->reference = $request->input('refProduit');
            $Produit->designation = $request->input('nomProduit');
            $Produit->description = $request->input('descriptionProduit');
            $Produit->prix = $request->input('prixProduit');
            $Produit->idTypeProduit = $request->input('typeProduit');

            if($request->hasFile('imageProduit')){

                $filenameWithExt = $request->file('imageProduit')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('imageProduit')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('imageProduit')->storeAs('public/image_produit', $fileNameToStore);
            }
            else{

                $fileNameToStore = 'noimage.jpg';
                }

        $Produit->image = $fileNameToStore;
        $Produit->save();
    }

        return redirect()->route('addProduit')->with('success_message', 'Enrégistrement éffectuer avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $typeProduit = TypeProduit::All(['id','nomTypeProduit']);
        $Produit = DB::table('produits')
        ->join('type_produits', 'produits.idTypeProduit', '=', 'type_produits.id')
        ->select('produits.id', 'produits.reference', 'produits.idTypeProduit', 'produits.designation', 'produits.description', 'produits.prix', 'produits.image', 'type_produits.nomTypeProduit')
        ->get();

        $Prod = DB::table('produits')
        ->join('type_produits', 'produits.idTypeProduit', '=', 'type_produits.id')
        ->where('produits.id', '=', $id)
        ->select('produits.id', 'produits.reference', 'produits.idTypeProduit', 'produits.designation', 'produits.description', 'produits.prix', 'produits.image', 'type_produits.nomTypeProduit')
        ->first();


        return view('boulangerie.produit.showProduit', compact('Produit', 'Prod', 'typeProduit'));
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
        $Produits = Produit::findOrFail($id);
        $Produit = DB::table('produits')->where('id', $id)->update(array(
            'reference' => $request->input('refProduit'),
            'designation' => $request->input('nomProduit'),
            'prix' => $request->input('prixProduit'),
            'idTypeProduit' => $request->input('typeProduit'),
            'description' => $request->input('descriptionProduit')));

        if($request->hasfile('imageProduit')){

            $filenameWithExt = $request->file('imageProduit')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imageProduit')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('imageProduit')->storeAs('public/image_produit', $fileNameToStore);
            $Produits->image = $fileNameToStore;
            $Produits->save();
        }

        return back()->with('success_message', 'Le produit a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Produit = Produit::findOrFail($id);
        $Produit->delete();

        return back()->with('success_message', 'Le produit a été supprimer!');
    }

    public function categorie($id)
    {
        $typeProduit = TypeProduit::All(['id','nomTypeProduit']);
        $Produit = DB::table('produits')
        ->where('idTypeProduit', '=', $id)
        ->orderBy('produits.prix')
        ->paginate(4);
        $type = TypeProduit::find($id);
        return view('boulangerie.produit.categorieProduit', compact('typeProduit', 'Produit', 'type'));
    }
}

