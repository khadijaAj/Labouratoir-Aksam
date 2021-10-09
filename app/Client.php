<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Client extends Model
{
    use Loggable;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','civility','code','email','adresse','ville','pays','familleCl','tele','modeReglement','salleTraite','modelivraison',
        'typeElevage','province','statut', 'commercial_id'
    ];

    public function commercial()
    {
        return $this->belongsTo(Commercial::class);
    }
    public function formule()
    {
        return $this->hasMany(Formule::class);
    }
    public function prospecteur()
    {
        return $this->hasMany(Prospecteur::class);
    }
    public function commande()
    {
        return $this->hasMany(Commande::class);
    }
    public function vrapport()
    {
        return $this->hasMany(vrapport::class);
    }
    public function Crapports()
    {
        return $this->hasMany(Crapport::class);
    }
    public function Enrapports()
    {
        return $this->hasMany(Enrapport::class);
    }
    public function geolocalisation()
    {
        return $this->hasMany(Geolocalisation::class);
    }

}
