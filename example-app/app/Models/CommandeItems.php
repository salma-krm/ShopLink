<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeItems extends Model
{
    use HasFactory;
    protected $fillable =['produit_id','commande_id','prix','quantite'];
    public function product(){
        return $this->hasMany(Produit::class);
    }
    public function commande(){
        return $this->hasMany(Commande::class);
    }
}
