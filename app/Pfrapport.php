<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Pfrapport extends Model
{
    use Loggable;
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
