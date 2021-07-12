<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'Reference','adresse','tele','Region','commercial_id'
    ];

    public function commercial()
    {
        return $this->belongsTo(Commercial::class);
    }
    public function Crapports()
    {
        return $this->hasMany(Rpclient::class);
    }
}
