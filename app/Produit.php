<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'Reference','categorie_id'
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
}
