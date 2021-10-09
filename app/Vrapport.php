<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Vrapport extends Model
{

    use Loggable;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_debut', 'date_fin','observation','typevisite','client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function bovin(){
        return $this->belongsTo(Bovin::class);
    }
    public function ovin(){
        return $this->belongsTo(Ovin::class);
    }
    public function VL(){
        return $this->belongsTo(Vachelaitiere::class);
    }
    public function standardsbv(){
        return $this->belongsTo(Standardsbovin::class);
    }
    public function standardsov(){
        return $this->belongsTo(Standardsovin::class);
    }
    public function standardsvl(){
        return $this->belongsTo(StandardsVl::class);
    }
    public function commercial(){
        return $this->belongsTo(Commercial::class);
    }

    public function elevages()
    {
        return $this->hasMany(Elevages::class);
    }

}
