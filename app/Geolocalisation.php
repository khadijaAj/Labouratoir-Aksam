<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Geolocalisation extends Model
{
    //
    use Loggable;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'client_id','lat','long','description' ,'adresse'
    ];

    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
}
