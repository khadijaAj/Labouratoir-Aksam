<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Origine extends Model
{
    use Loggable;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'Reference'
    ];

    public function Mprapports()
    {
        return $this->hasMany(Mprapport::class);
    }
}
