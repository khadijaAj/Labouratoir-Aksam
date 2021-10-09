<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elevages extends Model
{
    //
    protected $guarded = [];
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value_cr','standardsbv_id','standardsov_id','standardsvl_id', 'ovin_id','bovin_id','vl_id'

    ];
    public function vrapport()
    {
        return $this->belongsTo(Vrapport::class);
    }
    public function standardsov()
    {
        return $this->belongsTo(standardsovin::class);
    }
    public function standardsbv()
    {
        return $this->belongsTo(standardsbovin::class);
    }


}
