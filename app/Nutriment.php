<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutriment extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'Reference','cible','incertitude','cout'
    ];



    public function standards()
    {
        return $this->belongsToMany(Standardtype::class);
    }

    public function mesures()
    {
        return $this->hasMany(Mesure::class);
    }
}
