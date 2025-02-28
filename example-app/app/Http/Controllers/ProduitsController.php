<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\SousCategorie;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    public function get(){
        $produits = Produit::get();
        return view('produits', compact('produits'));
    }
    public function show(){
        $produits = Produit::get();
        return view('produitsdasbord', compact('produits'));
    }
    public function getCategorie(){
        $souscategories = SousCategorie::get();
        return view('createproduit', compact('souscategories'));
}
public function create(Request $request){
        
    $produit = $request->validate(
        
       [
          'title' =>'required',
          'photo' =>'required',
          'prix_unite' =>'required',
          'stock'=>'required',
          'souscategorie_id' =>'required',
          'description' =>'required',
       ]
       );
       Produit::create($produit);
      return redirect('/produits/show');
}
public function update (){
    
}
}
