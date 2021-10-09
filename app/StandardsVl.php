<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class StandardsVl extends Model
{
    use Loggable;
    /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'libelle', 'valeur','vl_id'
 ];



 public function vl()
 {
    return $this->belongsTo(Vachelaitiere::class);
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
