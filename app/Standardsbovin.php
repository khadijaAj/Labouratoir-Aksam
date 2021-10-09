<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Standardsbovin extends Model
{
    //
    use Loggable;
    /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'libelle', 'valeur','bovin_id'
 ];



 public function bovin()
 {
    return $this->belongsTo(Bovin::class);
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
