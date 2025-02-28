<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['photo','title','description','prix_unite','stock','souscategorie_id'];


    public function souscategorie()
    {
        return $this->belongsTo(SousCategorie::class);
    }
}
