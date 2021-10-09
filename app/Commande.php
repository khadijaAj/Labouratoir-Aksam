<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Commande extends Model
{
    
    
    use Loggable;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference','date','due_date','client_id','conditonReglement','subtotal','grandtotal'
    ];
   
    protected $guarded = [
        'number', 'sub_total', 'total'
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function commercial()
    {
        return $this->belongsTo(Commercial::class);
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function detailscommande()
    {
        return $this->hasMany(Detailscommande::class); 
    }
    
    
}
