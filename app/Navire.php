<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navire extends Model
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
