<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
class Analysetype extends Model
{
    public $table = "reports";
    use Loggable; 

    public function standard()
    {
        return $this->hasOne(Standardtype::class);
    }
}
