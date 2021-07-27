<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Commercial extends Model
{   
    
    use Loggable;
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
    public function Enrapports()
    {
        return $this->hasMany(Enrapport::class);
    }
}
