<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Nutriment extends Model
{
    use Loggable;
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
