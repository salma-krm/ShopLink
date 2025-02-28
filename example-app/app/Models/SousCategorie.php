<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    use HasFactory;

    protected $fillable=['title','description','categorie_id'];


    public function produits()
    {
        return $this->hasMany(Produit::class);
    }


    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}



