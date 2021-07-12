<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origine extends Model
{
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
