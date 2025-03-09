<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function show(){
        $categories = Categorie::get();
        return view('categorie', compact('categories'));
    }
    public function create(Request $request){
        
        $produit = $request->validate(
            
           [
              'name' =>'required',
              'description' =>'required',
           ]
           );
           Categorie::create($produit);
          return redirect('/categorie/show');
    }
    public function edit(request $request){
        $categorie = Categorie::find($request['id']);
        $categorie->update($request->all());
            return redirect('/categorie/show');
    }
    public function delete(Request $request)
{
//    dd( $request);
    $salle = Categorie::find($request['id']);
    Categorie::where('id', $request['id'])->delete();
    return redirect('/categorie/show');
}
}
