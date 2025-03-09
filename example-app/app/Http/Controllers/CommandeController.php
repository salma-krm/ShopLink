<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function commande()
    {
        $pannier = session()->get('cart', []);
        return view('commande', compact('pannier'));
    }

    public function create(Request $request)
    {
    
        $address = Address::where('address', $request->address)->first();
        if (!$address) {
            $addressData = $request->validate([
                'pays' => 'required',
                'address' => 'required',
                'ville' => 'required',
                'codepostal' => 'required',
            ]);
            
            $address = Address::create($addressData);
        }
        
       
        $panier = session()->get('cart', []);
        if (empty($panier)) {
            return back();
        }
        
       
        $total = array_sum(array_map(function ($item) {
            return $item["prix_unite"] * $item['quantity'];
        }, $panier));
        
        
        $user = auth()->id();
        
    
        $idcommandes = DB::table('commandes')->insertGetId([
            'prix_totale' => $total,
            'status' => 'pending',
            'client_id' => $user,
            'address_id' => $address->id, 
        ]);
        

        foreach ($panier as $id => $value) {
            DB::table('commande_items')->insertGetId([   
                'produit_id' => $id,
                'commande_id' => $idcommandes,
                'prix' => $value["prix_unite"], 
                'quantite' => $value["quantity"]
            ]);
        }
        

        session()->forget('cart');
        
        return redirect('/checkout');
    }
}
