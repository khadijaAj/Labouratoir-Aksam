<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equation1 extends Model
{
    protected $table = 'equations1';

       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'equation'
    ];
}
