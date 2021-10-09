<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailscommande extends Model
{
    //
  
    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'quantity','commande_id','produit_id','unite','total'
  ];

  
  public function commande()
  {
      return $this->belongsTo(Commande::class);
  }
  public function produit()
  {
      return $this->belongsTo(Produit::class);
  }
}
