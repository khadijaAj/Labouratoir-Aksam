<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'Reference'
    ];

    public function produits()
    {
        return $this->hasMany('App\Produit');
    }
}
