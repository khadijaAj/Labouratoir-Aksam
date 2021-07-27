<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Enrapport extends Model
{
    use Loggable;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Reference', 'client_id','commercial_id','produit_id','Identifiant','date_reception','date_impression','type','Interpretation'
    ];
    
    public function commercial()
    {
        return $this->belongsTo(Commercial::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function value()
    {
        return $this->hasOne(Value::class);
    }
    public function xml()
    {
        return $this->hasOne(Xml::class);
    }
}
