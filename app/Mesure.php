<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Mesure extends Model
{
    use Loggable;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'methode', 'equation','unite','equation1','xml_equivalent'
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
