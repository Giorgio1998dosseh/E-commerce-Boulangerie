<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TypeProduit;


class TypeProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeProduit = TypeProduit::All();
        $i = 0;

        return view('boulangerie.type_produit.add_type_produit', compact('typeProduit','i'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $TypeProduit = new TypeProduit();
        if($request->isMethod('post')){
            $TypeProduit->nomTypeProduit = $request->input('nomTypeProduit');
        }
        $TypeProduit->save();

        return redirect()->route('addTypeProduit')->with('success_message', 'Enrégistrement éffectuer avec succes');
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
        $typeProduit = TypeProduit::findOrFail($id);
        $typeProduit = DB::table('type_produits')->where('id', $id)->update(array(
            'nomTypeProduit' => $request->input('nomTypeProduit')));

        return back()->with('success_message', 'Le type de produit a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeProduit = TypeProduit::findOrFail($id);
        $typeProduit->delete();

        return back()->with('success_message', 'Le type de produit a été supprimer!');
    }
}
