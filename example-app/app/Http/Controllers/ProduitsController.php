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
        $souscategories = SousCategorie::get();
        return view('produitsdasbord', compact('produits', 'souscategories'));
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
public function AjouterPanier($id)
{

    $produit = Produit::find($id);
    
    if ($produit) {
       
        $cart = session()->get('cart', []);

 
        if (isset($cart[$id])) {
         
            $cart[$id]['quantity']++;
        } else {
           
            $cart[$id] = [
                'title' => $produit->title,
                'prix_unite' => $produit->prix_unite,
                'souscategorie_id' => $produit->souscategorie_id,
                'description' => $produit->description,
                'photo' => $produit->photo,
                'quantity' => 1, 
            ];
        }

        
        session()->put('cart', $cart);

        
        return redirect('/produits');
    }
}

public function afficherPanier()
{
    
    $panier = session()->get('cart', []);
  

    return view('panier', compact('panier'));
}



}
