<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Standardsovin extends Model
{
    use Loggable;
    /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'libelle', 'valeur','ovin_id'
 ];



 public function ovin()
 {
    return $this->belongsToMany(Ovin::class);
 }
 public function vrapport()
 {
     return $this->belongsToMany(Vrapport::class);
 }
 public function elevages()
 {
     return $this->HasMany(Elevages::class);
 }



}
