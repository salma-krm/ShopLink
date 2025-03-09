<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable =['prix_totale','status','client_id'];
   
    
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function commandeItems()
    {
        return $this->hasMany(CommandeItems::class);
    }
}
