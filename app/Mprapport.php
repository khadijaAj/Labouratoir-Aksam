<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mprapport extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'num','num_bon', 'produit_id','fournisseur_id','origine_id','navire_id','date_reception','commentaire','path','conformite','PS'
    ];


    public function value()
    {
        return $this->hasOne(Value::class);
    }
    public function origine()
    {
        return $this->belongsTo(Origine::class);
    }
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
    public function navire()
    {
        return $this->belongsTo(Navire::class);
    }
    public function produit()
    {
        return $this->belongsTo(Navire::class);
    }
}
