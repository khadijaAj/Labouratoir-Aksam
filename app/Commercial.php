<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commercial extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'Reference','adresse','tele'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    public function Crapports()
    {
        return $this->hasMany(Rpclient::class);
    }
}
