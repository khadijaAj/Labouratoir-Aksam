<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class Produit extends Model
{
    use Loggable;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'Reference','prixu','categorie_id','taxe'
    ];

    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }

    public function crapport()
    {
        return $this->hasOne(Rpclient::class);
    }
    public function pfrapport()
    {
        return $this->hasOne(Pfrapport::class);
    }
    public function mprapport()
    {
        return $this->hasOne(Mprapport::class);
    }
    public function Enrapports()
    {
        return $this->hasOne(Enrapport::class);
    }
    public function commande()
    {
        return $this->belongsToMany(Commande::class);
    }
    public function detailscommande()
    {
        return $this->hasMany(Detailscommande::class); 
    }
}
