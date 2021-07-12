<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pfrapport extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'num', 'produit_id','identification','date_fabrication','conformite','commentaire','path','MSR','ACE'
    ];
    public function value()
    {
        return $this->hasOne(Value::class);
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    

}
