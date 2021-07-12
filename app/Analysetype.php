<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analysetype extends Model
{
    public $table = "reports";
    

    public function standard()
    {
        return $this->hasOne(Standardtype::class);
    }
}
