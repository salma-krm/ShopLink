<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\SousCategorie;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    public function get(){
        $produits = Produit::get();
        return view('dashboard', compact('produits'));
    }
    public function show(){
        $produits = Produit::get();
        $souscategories = SousCategorie::get();
        return view('produitsdasbord', compact('produits', 'souscategories'));
    }
    public function All(){
        $produits = Produit::get();
        $souscategories = SousCategorie::get();
        return view('welcome', compact('produits', 'souscategories'));
    }

    public function detail(Request $request, $id) {
        $produit = Produit::find($id);

        return view('detailProduit', compact('produit'));
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
public function edit(request $request){
    $produit = Produit::find($request['id']);
    $produit->update($request->all());
        return redirect('/produits/show');
}
public function delete(Request $request)
{
//    dd( $request);
    $salle = Produit::find($request['id']);
    Produit::where('id', $request['id'])->delete();
    return redirect('/produits/show');
}

public function AjouterPanier(Request $request)
{
    
$id=$request['id'];
    $produit = Produit::find($id);
    
    if ($produit) {
       
        $cart = session()->get('cart', []);

 
        if (isset($cart[$id])) {
         
            $cart[$id]['quantity']+=$request->get('quantity');
        } else {
           
            $cart[$id] = [
                'title' => $produit->title,
                'prix_unite' => $produit->prix_unite,
                'souscategorie_id' => $produit->souscategorie_id,
                'description' => $produit->description,
                'photo' => $produit->photo,
                'quantity' => $produit['quantity'] ?? 1 
            ];
        }

        
        session()->put('cart', $cart);

        
        return back();
    }
}

public function afficherPanier()
{
    
    $panier = session()->get('cart', []);
  

    return view('panier', compact('panier'));
}
public function deletPanier($id)
{
    
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
       
        unset($cart[$id]);

        
        session()->put('cart', $cart);

        return redirect('/Panier')->with('success', 'Le produit a été supprimé du panier');
    }


    
}




}
