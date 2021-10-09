<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class Prospecteur extends Model
{
    use Loggable;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','civility', 'type', 'code','email', 'adresse', 'ville',  'pays','familleCl','tele','modeReglement','salleTraite','modelivraison','province','client_id'
    ];
    

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
     
}

