<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Standardtype extends Model
{
    use Loggable;
    public $table = "analyse_standards";

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nutriment_id'
    ];

    public function analyse()
    {
        return $this->belongsTo('App\Analysetype');
    }

    public function nutriments()
    {
        return $this->belongsToMany(Nutriment::class);
    }
    public function mesures()
    {
        return $this->hasMany(Mesure::class);
    }
}
