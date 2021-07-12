<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesure extends Model
{
    
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'methode', 'equation','unite'
    ];

    public function nutriment()
    {
        return $this->belongsTo(Nutriment::class);
    }
    public function standard()
    {
        return $this->belongsTo(Standardtype::class);
    }
}
