<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Crapport extends Model
{
    use Loggable;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'num', 'client_id','commercial_id','produit_id','Cout','date_analyse','date_reception','commentaire'
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
}
