<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'Reference','adresse','tele'
    ];
    public function Mprapports()
    {
        return $this->hasMany(Mprapport::class);
    }
}
